<?php

namespace App\Http\Requests;

use App\Rules\FullNameRule;
use Illuminate\Foundation\Http\FormRequest;

class CreateVisitorConciergeRequest extends FormRequest
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
            'birth' => ['required', 'dateformat:d/m/Y'],
            'phone' => 'required',
            'identity' => ['required', 'numeric'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'O campo Nome completo é obrigatório.',
            'birth.required' => 'O campo Data de Nascimento é obrigatório.',
            'phone.required' => 'O campo Telefone é obrigatório.',
            'identity.required' => 'O campo Identidade é obrigatório.',
        ];
    }
}
