<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MenuRequest extends FormRequest
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
            'name' => 'required | max:10',
            'item' => 'required | max:300',
            'howtomake' => 'required | max:300',
            'price' => 'required | integer ',
            'file_name' => 'required',
            'user_id' => 'required',
            'genre_id' => 'required  |max:10000',
        ];
    }
}
