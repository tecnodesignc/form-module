<?php

namespace Modules\Form\Http\Requests;

use Modules\Core\Internationalisation\BaseFormRequest;

class CreateLeadRequest extends BaseFormRequest
{
    public function rules()
    {
        return [
            //'g-recaptcha-response' => 'required|captcha'
        ];
    }

    public function translationRules()
    {
        return [];
    }

    public function authorize()
    {
        return true;
    }

    public function messages()
    {
        return [
            //'g-recaptcha-response.required' => trans('form::common.captcha_required'),
            //'g-recaptcha-response.captcha'=> trans('form::common.captcha_required'),
        ];
    }

    public function translationMessages()
    {
        return [];
    }
}
