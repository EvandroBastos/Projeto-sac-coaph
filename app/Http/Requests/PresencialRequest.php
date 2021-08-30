<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PresencialRequest extends FormRequest
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

            'quantidade' =>['required']

        ];
    }
    public function messages()
    {
        return [
            'quantidade.required'=>"O campo da Quantidade de atendimento deverá ser preenchido"
        ];
    }
}
