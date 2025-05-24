<?php

namespace Modules\User\Http\Requests\Frontend;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'mobile' => 'required|unique:users,mobile,' . auth()->id() . '||phone:AUTO',
            'email'   => 'required|email|unique:users,email,'.auth()->id(),
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

    // public function messages()
    // {

    //     $v = [
    //         'name.required'       =>   __('user::frontend.validation.name.required'),
    //         'mobile.required'     =>   __('user::frontend.validation.mobile.required'),
    //         'mobile.unique'       =>   __('user::frontend.validation.mobile.unique'),
    //         'mobile.numeric'      =>   __('user::frontend.validation.mobile.numeric'),
    //         'email.required'      =>   __('user::frontend.validation.email.required'),
    //         'email.unique'        =>   __('user::frontend.validation.email.unique'),
    //         'email.email'         =>   __('user::frontend.validation.email.email'),
    //     ];

    //     return $v;
    // }
}
