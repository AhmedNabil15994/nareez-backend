<?php

namespace Modules\User\Http\Requests\Frontend;

use Illuminate\Foundation\Http\FormRequest;
use Hash;

class UpdatePasswordRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'current_password'   => 'required',
            'password'           => 'required|confirmed|min:6',
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
    //         'password.required'               =>   __('user::frontend.validation.password.required'),
    //         'password.min'                    =>   __('user::frontend.validation.password.min'),
    //         'password.confirmed'              =>   __('user::frontend.validation.password.confirmed'),
    //         'password.required_with'          =>   __('user::frontend.validation.password.required_with'),
    //         'current_password.required_with'  => __('user::frontend.profile.index.validation.current_password.required_with'),
    //     ];

    //     return $v;
    // }


    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            if ($this->current_password != null) {
                if (!Hash::check($this->current_password, $this->user()->password)) {
                    $validator->errors()->add(
                        'current_password',
                        __('Wrong Current Password')
                    );
                }
            }
        });

        return;
    }
}
