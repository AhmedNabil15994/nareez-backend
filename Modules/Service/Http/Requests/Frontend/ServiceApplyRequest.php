<?php

namespace Modules\Service\Http\Requests\Frontend;

use Illuminate\Foundation\Http\FormRequest;

class ServiceApplyRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
                  'name'            => 'required',
                  'email'           => 'required',
                  'service_id'      => 'required|exists:services,id',
                  'file'            => 'required|file|max:4096',
                  'desc'            => 'nullable',
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
}
