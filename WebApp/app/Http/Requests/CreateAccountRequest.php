<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateAccountRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'account_id' => ['required', 'unique:AMT_MASTER,ACCOUNTID'],
            'email_address' => ['required', 'email:rfc,dns,filter', 'unique:AMT_MASTER,EMAIL'],
            'password' => ['required', 'confirmed', 'min:8', 'max:32']
        ];
    }
}
