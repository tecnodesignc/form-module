<?php

namespace Modules\Form\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Form\Entities\Field;
use Modules\Form\Entities\Form;
use Modules\Form\Entities\Type;
use Modules\Form\Http\Requests\CreateFieldRequest;
use Modules\Form\Http\Requests\UpdateFieldRequest;
use Modules\Form\Repositories\FieldRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class FieldController extends AdminBaseController
{
    /**
     * @var FieldRepository
     */
    private FieldRepository $field;

    /**
     * @var Type
     */
    private Type $type;

    public function __construct(FieldRepository $field, Type $type)
    {
        parent::__construct();

        $this->field = $field;
        $this->type=$type;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $fields = $this->field->all();

        return view('form::admin.fields.index', compact(''));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Form $form)
    {
        $types=$this->type->lists();

        return view('form::admin.fields.create',compact('form','types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateFieldRequest $request
     * @return Response
     */
    public function store(CreateFieldRequest $request)
    {
        $form=$request->input('form_id');
        $this->field->create($request->all());
        return redirect()->route('admin.form.form.edit',$form)
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('form::fields.title.fields')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Field $field
     * @return Response
     */
    public function edit(Form $form, Field $field)
    {
        $types=$this->type->lists();
        return view('form::admin.fields.edit', compact('form','field','types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Field $field
     * @param  UpdateFieldRequest $request
     * @return Response
     */
    public function update(Form $form, Field $field, UpdateFieldRequest $request)
    {
        $this->field->update($field, $request->all());

        return redirect()->route('admin.form.form.edit',$form)
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('form::fields.title.fields')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Field $field
     * @return Response
     */
    public function destroy(Form $form, Field $field)
    {
        $this->field->destroy($field);

        return redirect()->route('admin.form.form.edit',$form)
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('form::fields.title.fields')]));
    }
}
