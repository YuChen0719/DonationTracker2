<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class UpdateDonationRequest extends FormRequest
{
    public function rules()
    {
        return [
            'Donator' => [
                'integer',
                'required',
            ],
            'Target' => [
                'integer',
                'required',
            ],
            'Value' => [
                'integer',
                'required',
            ],

        ];
    }

    // public function authorize()
    // {
    //     return Gate::allows('donation_access');
    // }
}
