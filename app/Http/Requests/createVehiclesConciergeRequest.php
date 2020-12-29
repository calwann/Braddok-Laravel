<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class createVehiclesConciergeRequest extends FormRequest
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
            'vehiclesInId' => 'required_without:vehiclesOutId',
            'vehiclesOutId' => 'required_without:vehiclesInId',
            'usersId_boss' => 'required',
            'usersId_driver' => 'required',
            'odometer' => 'required',
            'date' => ['required', 'dateformat:d/m/Y'],
            'time' => ['required', 'dateformat:H:i'],
        ];
    }
}
