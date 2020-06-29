<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Userdemand extends FormRequest
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
            'plate_no' => 'required|min:3',
            'tally_no' => 'required|min:3',
            'status' => 'required|min:3',
            ];
    }
    public function message()
    {
        return [
            
            'plate_no.required' => 'You are missing the plate number',
            'tally_no.required' => 'You are missing the tally number',
            'status' => 'Please choose either a Check in or a checkout',
           
            
        ];
    }
}
