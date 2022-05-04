<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmailRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'requred | email:filter'
        ];
    }

    public function messages(){
        return [
            'email.required' => 'メールを入力してください',
            'email.email' => '正しいメールアドレスの形式で入力してください',
        ];
    }
}
