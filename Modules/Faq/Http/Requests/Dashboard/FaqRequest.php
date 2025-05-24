<?php

namespace Modules\Faq\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class FaqRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title.*'=>'required',
            'desc.*'=>'sometimes',
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function messages()
    {
        foreach (config('laravellocalization.supportedLocales') as $key => $value) {
            $v["title.".$key.".required"]  = __('faq::dashboard.faqs.validation.title.required').' - '.$value['native'].'';

            $v["title.".$key.".unique"]    = __('faq::dashboard.faqs.validation.title.unique').' - '.$value['native'].'';
        }

        return $v;
    }
}
