<?php

namespace App\Http\Requests;

use App\Rules\FullNameRule;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRegistersUsersRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', new FullNameRule],
            'email' => ['required', 'email'],
            'identity' => ['required', 'numeric'],
            'patent' => 'required',
            'nickname' => 'required',
            'address' => 'required',
            'district' => 'required',
            'city' => 'required',
            'state' => ['required', 'size:2'],
            'phone' => ['required', 'min:14'],
            'password' => ['required', 'min:8'],
        ];
    }

}
