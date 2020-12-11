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
            'state' => 'required',
            'phone' => 'required',
            'password' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'O campo Nome completo é obrigatório.',
            'email.required' => 'O campo Email é obrigatório.',
            'identity.required' => 'O campo Identidade é obrigatório.',
            'patent.required' => 'O campo Posto/ Graduação é obrigatório.',
            'nickname.required' => 'O campo Nome de Guerra é obrigatório.',
            'address.required' => 'O campo Endereço é obrigatório.',
            'district.required' => 'O campo Bairro é obrigatório.',
            'city.required' => 'O campo Cidade é obrigatório.',
            'state.required' => 'O campo Estado é obrigatório.',
            'phone.required' => 'O campo Telefone celular é obrigatório.',
            'password.required' => 'O campo Senha é obrigatório.',
        ];
    }
}
