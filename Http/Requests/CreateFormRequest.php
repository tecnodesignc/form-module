<?php

namespace Modules\Form\Http\Requests;

use Modules\Core\Internationalisation\BaseFormRequest;

class CreateFormRequest extends BaseFormRequest
{
    public function rules()
    {
        return [
            'system_name' => 'required|min:2',
            'destination_email' => 'required|min:2',
        ];
    }

    public function translationRules()
    {
        return [
            'title' => 'required|min:2',
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
