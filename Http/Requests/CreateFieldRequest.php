<?php

namespace Modules\Form\Http\Requests;

use Modules\Core\Internationalisation\BaseFormRequest;

class CreateFieldRequest extends BaseFormRequest
{
    public function rules()
    {
        return [
            'type' => 'required',
            'name' => 'required|min:2',
            'form_id' => 'required',
            'order' => 'required'
        ];
    }

    public function translationRules()
    {
        return [
            'label' => 'required|min:2',
            'placeholder' => 'required|min:2'
        ];
    }

    public function authorize()
    {
        return true;
    }

    public function messages()
    {
        return [];
    }

    public function translationMessages()
    {
        return [];
    }
}
