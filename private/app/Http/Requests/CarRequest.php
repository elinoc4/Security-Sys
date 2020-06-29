<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarRequest extends FormRequest
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
            'tally_no'=>'required|min:2',
            'plate_no'=>'required|min:3',
            'status'=>'required',
            'date'=>'required',
        ];
       
    }
    
    public function message(){
        return[
            'tally_no.required'=>'Tally Empty',
            'plate_no.required'=>'Plate Empty',
            ];
    }
   
}
