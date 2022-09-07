<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
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
            'name'=>'required|max:40',
            'surname'=>'required|max:40',
            'email'=>'required|email|max:40',
            'phone'=>'required|max:30|regex:/^\+380\d{9}$/',
            'city'=>'required|max:40',
        ];
    }
}
