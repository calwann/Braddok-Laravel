<?php

namespace App\Http\Requests;

use App\Rules\FullNameRule;
use Illuminate\Foundation\Http\FormRequest;

class CreateCollaboratorsConciergeRequest extends FormRequest
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
            'registerType' => 'required',
            'usersId' => 'required',
            'date' => ['required', 'dateformat:d/m/Y'],
            'time' => ['required', 'dateformat:H:i'],
        ];
    }

    public function messages()
    {
        return [
            'registerType.required' => 'O campo Lançamento é obrigatório.',
            'usersId.required' => 'O campo Militares é obrigatório.',
            'date.required' => 'O campo Data é obrigatório.',
            'date.dateformat' => 'O campo Data está incorreto.',
            'time.required' => 'O campo Hora é obrigatório.',
            'time.dateformat' => 'O campo Hora está incorreto.',
        ];
    }
}
