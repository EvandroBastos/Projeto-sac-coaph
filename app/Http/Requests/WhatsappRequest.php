<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WhatsappRequest extends FormRequest
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

            'recebidos' =>['required'],
            'enviados' =>['required'],
        ];
    }
    public function messages()
    {
        return [
            'recebidos.required'=>"O campo do E-mail recebidos deverá ser preenchido",
            'enviados.required'=>"O campo do E-mail enviados deverá ser preenchido"
        ];
    }
}
