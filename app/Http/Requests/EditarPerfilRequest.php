<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditarPerfilRequest extends FormRequest
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
            'name'            => 'required|max:255|regex:/^[a-zA-ZÑñ\s]+$/',
            'url'            => 'required|max:255|regex:/^[a-zA-ZÑñ\s]+$/',
            'biografia'            => [
                'required',
                'max:255',
                'regex:/^<([a-z]+)([^<]+)*(?:>(.*)<\/\1>|\s+\/>)$/',
            ],
            'imagen'            => 'required|image'

        ];
    }

    public function messages(){
       return [
            'name.required'          => 'El campo nombre es obligatorio.',
            'name.max'               => 'La cantidad minima de carácteres es de 6.',
            'name.regex'             => 'Los carácteres deben ser solo letras.',

            'biografia.required'          => 'El campo preparacion es obligatorio.',
            'biografia.max'               => 'La cantidad mónima de carácteres es de 6.',
            'biografia.regex'             => 'Los carácteres deben ser solo letras.',

            'url.required'          => 'El campo preparacion es obligatorio.',
            'url.max'               => 'La cantidad mónima de carácteres es de 6.',
            'url.regex'             => 'Los carácteres deben ser solo letras.',

            'imagen.required'          => 'La imagen es obligatoria.'

        ];
    }
}
