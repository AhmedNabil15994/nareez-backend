<?php

namespace Modules\Service\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        switch ($this->getMethod()) {
            // handle creates
            case 'post':
            case 'POST':

                return [
                  'title.*'         => 'required',
                ];

            //handle updates
            case 'put':
            case 'PUT':
                return [
                    'title.*'        => 'required',
                ];
        }
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
            $v["title.".$key.".required"]  =
          __('service::dashboard.services.validation.title.required').' - '.$value['native'].'';


            $v["description.".$key.".required"]  =
          __('service::dashboard.services.validation.description.required').' - '.$value['native'].'';
        }

        return $v;
    }
}
