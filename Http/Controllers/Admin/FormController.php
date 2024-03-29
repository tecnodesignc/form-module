<?php

namespace Modules\Form\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Form\Entities\Form;
use Modules\Form\Http\Requests\CreateFormRequest;
use Modules\Form\Http\Requests\UpdateFormRequest;
use Modules\Form\Repositories\FormRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;
use Modules\User\Repositories\UserRepository;

class FormController extends AdminBaseController
{
    /**
     * @var FormRepository
     */
    private $form;

    /**
     * @var UserRepository
     */
    private $user;

    public function __construct(FormRepository $form, UserRepository $user)
    {
        parent::__construct();

        $this->form = $form;
        $this->user = $user;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $forms = $this->form->all();

        return view('form::admin.forms.index', compact('forms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $users = $this->user->all();
        return view('form::admin.forms.create',compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateFormRequest $request
     * @return Response
     */
    public function store(CreateFormRequest $request)
    {
        $this->form->create($request->all());

        return redirect()->route('admin.form.form.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('form::forms.title.forms')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Form $form
     * @return Response
     */
    public function edit(Form $form)
    {
        $users = $this->user->all();
        return view('form::admin.forms.edit', compact('form','users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Form $form
     * @param  UpdateFormRequest $request
     * @return Response
     */
    public function update(Form $form, UpdateFormRequest $request)
    {
        $this->form->update($form, $request->all());

        return redirect()->route('admin.form.form.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('form::forms.title.forms')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Form $form
     * @return Response
     */
    public function destroy(Form $form)
    {
        $this->form->destroy($form);

        return redirect()->route('admin.form.form.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('form::forms.title.forms')]));
    }
}
