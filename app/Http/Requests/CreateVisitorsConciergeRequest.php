<?php

namespace App\Http\Requests;

use App\Rules\CurDate;
use App\Rules\CurTime;
use Illuminate\Foundation\Http\FormRequest;

class CreateVisitorsConciergeRequest extends FormRequest
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
            'visitorsInId' => 'required_without:visitorsOutId',
            'visitorsOutId' => 'required_without:visitorsInId',
            'date' => ['required', 'dateformat:d/m/Y', new CurDate],
            'time' => ['required', 'dateformat:H:i', new CurTime],
        ];
    }

}
