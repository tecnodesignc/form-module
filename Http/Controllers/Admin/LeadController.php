<?php

namespace Modules\Form\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Form\Entities\Lead;
use Modules\Form\Http\Requests\CreateLeadRequest;
use Modules\Form\Http\Requests\UpdateLeadRequest;
use Modules\Form\Repositories\LeadRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class LeadController extends AdminBaseController
{
    /**
     * @var LeadRepository
     */
    private $lead;

    public function __construct(LeadRepository $lead)
    {
        parent::__construct();

        $this->lead = $lead;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //$leads = $this->lead->all();

        return view('form::admin.leads.index', compact(''));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('form::admin.leads.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateLeadRequest $request
     * @return Response
     */
    public function store(CreateLeadRequest $request)
    {
        $this->lead->create($request->all());

        return redirect()->route('admin.form.lead.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('form::leads.title.leads')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Lead $lead
     * @return Response
     */
    public function edit(Lead $lead)
    {
        return view('form::admin.leads.edit', compact('lead'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Lead $lead
     * @param  UpdateLeadRequest $request
     * @return Response
     */
    public function update(Lead $lead, UpdateLeadRequest $request)
    {
        $this->lead->update($lead, $request->all());

        return redirect()->route('admin.form.lead.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('form::leads.title.leads')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Lead $lead
     * @return Response
     */
    public function destroy(Lead $lead)
    {
        $this->lead->destroy($lead);

        return redirect()->route('admin.form.lead.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('form::leads.title.leads')]));
    }
}
