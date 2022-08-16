<?php

namespace Modules\Form\Http\Controllers\Api;

// Requests & Response
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Form\Http\Requests\UpdateLeadRequest as UpdateRequest;
use Modules\Form\Repositories\FormRepository;
use Modules\Form\Repositories\LeadRepository;
use Modules\Form\Services\LeadsExportService;
use Modules\Form\Transformers\LeadTransformer;
use Modules\Core\Http\Controllers\Api\BaseApiController;
use Illuminate\Support\Facades\Storage;

class LeadApiController extends BaseApiController
{
    private $lead;
    private $form;

    public function __construct(LeadRepository $lead, FormRepository $form)
    {
        $this->lead = $lead;
        $this->form = $form;
    }

    /**
     * GET ITEMS
     *
     * @return mixed
     */
    public function index(Request $request)
    {
        try {
            //Get Parameters from URL.
            $params = $this->getParamsRequest($request);
            //Request to Repository
            $data = $this->lead->getItemsBy($params);

            if (isset($params->filter->export) && $params->filter->export == true) {
                $LeadsExportService = new LeadsExportService();
                return $LeadsExportService->exportFile($data);
            }

            //Response
            $response = ["data" => LeadTransformer::collection($data)];
            //If request pagination add meta-page
            $params->page ? $response["meta"] = ["page" => $this->pageTransformer($data)] : false;
        } catch (\Exception $e) {
            $status = $this->getStatusError($e->getCode());
            $response = ["errors" => $e->getMessage()];
        }
        //Return response
        return response()->json($response ?? ["data" => "Request successful"], $status ?? 200);
    }

    /**
     * GET A ITEM
     *
     * @param $criteria
     * @return mixed
     */
    public function show($criteria, Request $request)
    {
        try {
            $params = $this->getParamsRequest($request);
            $data = $this->lead->getItem($criteria, $params);
            if (!$data) throw new Exception('Item not found', 204);
            $response = ["data" => new LeadTransformer($data)];
            $params->page ? $response["meta"] = ["page" => $this->pageTransformer($data)] : false;
        } catch (\Exception $e) {
            $status = $this->getStatusError($e->getCode());
            $response = ["errors" => $e->getMessage()];
        }
        return response()->json($response ?? ["data" => "Request successful"], $status ?? 200);
    }

    /**
     * CREATE A ITEM
     *
     * @param Request $request
     * @return mixed
     */
    public function create(Request $request)
    {

        try {
            $data = $request->input('attributes') ?? [];
            $form = $this->form->find($data['form_id']);
            if (empty($form->id)) {
                throw new \Exception(trans('form::common.forms_not_found'));
            }
            $validator = \Validator::make($data, [
                'g-recaptcha-response' => 'required|captcha'
            ]);
            if ($validator->fails()) {
                $response['status']="fail";
                $response['data']["g-recaptcha-response"] = trans('forms::common.captcha_required');
            }
            $attr = array();
            $attr['form'] = $form;
            $attr['form_id'] = $form->id;
            $attr['values'] = array();
            $attr['reply'] = ['to'=>env('MAIL_FROM_ADDRESS'),'toName'=>'Client'];
            $fields = $form->fields;

            foreach ($fields as $field) {
                \Log::info(json_encode($data));
                if ($field->name == 'email') {
                    $attr['reply']['to'] = $data[$field->name] ?? env('MAIL_FROM_ADDRESS');
                }
                if ($field->name == 'name') {
                    $attr['reply']['toName'] = $data[$field->name] ?? 'Client';
                }
                if($field->type=='file'){
                    $path= $data->file()->store('invoices/'.date('u'),'publicmedia');
                    $attr['values'][$field->name] = $path;
                }else{
                    $attr['values'][$field->name] = $data[$field->name];
                }

            }
            $attr['reply']=json_decode(json_encode($attr['reply']));
            $newData = $this->lead->create($attr);
            $response = ["data" => trans('form::leads.messages.message sent successfully')];

        } catch (\Exception $e) {
            \Log::error($e);
            $status = $this->getStatusError($e->getCode());
            $response = ["errors" => $e->getMessage()];
        }

//Return response
        return response()->json($response ?? ["data" => "Request successful"], $status ?? 200);
    }

    /**
     * Update the specified lead in storage.
     * @param  Request $request
     * @return Response
     */
    public
    function update($criteria, Request $request)
    {
        \DB::beginTransaction();
        try {
            $params = $this->getParamsRequest($request);

            $data = $request->input('attributes');
            //Validate Request
            $this->validateRequestApi(new UpdateRequest($data));
           $entity = $this->lead->getItem($criteria, $params);
            //Update data
            $newData = $this->lead->update($entity, $data);
            //Response
            $response = ['data' => $newData];
            \DB::commit(); //Commit to Data Base
        } catch (\Exception $e) {
            \DB::rollback();//Rollback to Data Base
            $status = $this->getStatusError($e->getCode());
            $response = ["errors" => $e->getMessage()];
        }
        return response()->json($response, $status ?? 200);
    }

    /**
     * Remove the specified lead from storage.
     * @return Response
     */
    public
    function delete($criteria, Request $request)
    {
        \DB::beginTransaction();
        try {
            //Get params
            $params = $this->getParamsRequest($request);
            //Delete data
            $entity = $this->lead->getItem($criteria, $params);
            $this->lead->destroy($entity);
            //Response
            $response = ['data' => ''];
            \DB::commit(); //Commit to Data Base
        } catch (\Exception $e) {
            \DB::rollback();//Rollback to Data Base
            $status = $this->getStatusError($e->getCode());
            $response = ["errors" => $e->getMessage()];
        }
        return response()->json($response, $status ?? 200);
    }
}
