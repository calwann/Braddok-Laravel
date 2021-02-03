<?php

namespace App\Http\Requests;

use App\Rules\CurDate;
use App\Rules\CurTime;
use Illuminate\Foundation\Http\FormRequest;

class ReadReportsConciergeRequest extends FormRequest
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
            'reportType' => 'required',
            'date' => ['required', 'dateformat:d/m/Y', new CurDate],
            'timeStart' => ['required', 'dateformat:H:i', new CurTime],
            'timeEnd' => ['required', 'dateformat:H:i', new CurTime],
        ];
    }
}
