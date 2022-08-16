<?php

namespace Modules\Form\Repositories\Eloquent;

use Modules\Form\Events\LeadWasCreated;
use Modules\Form\Repositories\LeadRepository;
use Modules\Core\Repositories\Eloquent\EloquentBaseRepository;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

class EloquentLeadRepository extends EloquentBaseRepository implements LeadRepository
{
    /**
     * Get resources by an array of attributes
     * @param bool|object $params
     * @return LengthAwarePaginator|Collection
     */
    public function getItemsBy(bool|object $params = false): Collection|LengthAwarePaginator
    {
        $query = $this->model->query();

        if (in_array('*', $params->include)) {
            $query->with([]);
        } else {
            $includeDefault = [];
            if (isset($params->include))
                $includeDefault = array_merge($includeDefault, $params->include);
            $query->with($includeDefault);
        }
        if ($params->filter) {
            $filter = $params->filter;
            if (isset($filter->search)) {
                $query->where(function ($query) use ($filter) {
                    $query->whereHas('translations', function ($query) use ($filter) {
                        $query->where('locale', $filter->locale)
                            ->where('title', 'like', '%' . $filter->search . '%');
                    })->orWhere('id', 'like', '%' . $filter->search . '%')
                        ->orWhere('updated_at', 'like', '%' . $filter->search . '%')
                        ->orWhere('created_at', 'like', '%' . $filter->search . '%');
                });
            }
            if (isset($filter->date)) {
                $date = $filter->date;
                $date->field = $date->field ?? 'created_at';
                if (isset($date->from))
                    $query->whereDate($date->field, '>=', $date->from);
                if (isset($date->to))
                    $query->whereDate($date->field, '<=', $date->to);
            }
            //Order by
            if (isset($filter->order)) {
                $orderByField = $filter->order->field ?? 'created_at';
                $orderWay = $filter->order->way ?? 'desc';
                $query->orderBy($orderByField, $orderWay);
            }
            if (isset($filter->parentId)) {
                $query->where("parent_id", $filter->parentId);
            }
            if (isset($filter->formId)) {
                $query->where("form_id", $filter->formId);
            }

        }
        if (isset($params->fields) && count($params->fields))
            $query->select($params->fields);
        if (isset($params->page) && $params->page) {
            return $query->paginate($params->take);
        } else {
            $params->take ? $query->take($params->take) : false;//Take
            return $query->get();
        }
    }

    /**
     * Get resources by an array of attributes
     * @param string $criteria
     * @param bool|object $params
     * @return Model|Collection|Builder|array|null
     */
    public function getItem(string $criteria, $params = false): Model|Collection|Builder|array|null
    {
        $query = $this->model->query();
        if (in_array('*', $params->include)) {
            $query->with([]);
        } else {
            $includeDefault = [];
            if (isset($params->include))
                $includeDefault = array_merge($includeDefault, $params->include);
            $query->with($includeDefault);
        }
        if (is_array($params->fields) && count($params->fields))
            $query->select($params->fields);
        if (isset($params->filter)) {
            $filter = $params->filter;
            if (isset($filter->field))
                $field = $filter->field;
            $translatedAttributes = $this->model->translatedAttributes;
            if (isset($field) && in_array($field, $translatedAttributes))//Filter by slug
                $query->whereHas('translations', function ($query) use ($criteria, $filter, $field) {
                    $query->where('locale', $filter->locale)
                        ->where($field, $criteria);
                });
            else
                $query->where($field ?? 'id', $criteria);
        }
        return $query->first();
    }

    public function create($data): Model|Collection|Builder|array|null
    {
        $lead = $this->model->create($data);
        event(new  LeadWasCreated($lead, $data));
        return $lead;
    }
}
