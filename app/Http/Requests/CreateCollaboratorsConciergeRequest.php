<?php

namespace App\Http\Requests;

use App\Rules\CurDate;
use App\Rules\CurTime;
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
            'date' => ['required', 'dateformat:d/m/Y', new CurDate],
            'time' => ['required', 'dateformat:H:i', new CurTime],
        ];
    }

}
