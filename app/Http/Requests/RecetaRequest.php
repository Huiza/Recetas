<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RecetaRequest extends FormRequest
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
            'titulo'            => 'required|max:255|regex:/^[a-zA-ZÑñ\s]+$/',
            'categoria_id'          => 'required',
            'preparacion'            => [
                'required',
                'max:255',
                'regex:/^<([a-z]+)([^<]+)*(?:>(.*)<\/\1>|\s+\/>)$/',
            ],
            'ingredientes'            => [
                'required',
                'max:255',
                'regex:/^<([a-z]+)([^<]+)*(?:>(.*)<\/\1>|\s+\/>)$/',
            ],
            'imagen'            => 'required|image'

        ];

    }

        public function messages()
    {
        return [
            'titulo.required'          => 'El campo nombres es obligatorio.',
            'titulo.max'               => 'La cantidad minima de carácteres es de 6.',
            'titulo.regex'             => 'Los carácteres deben ser solo letras.',

            'categoria_id.required'          => 'Debe seleccionar una categoria.',

            'preparacion.required'          => 'El campo preparacion es obligatorio.',
            'preparacion.max'               => 'La cantidad mónima de carácteres es de 6.',
            'preparacion.regex'             => 'Los carácteres deben ser solo letras.',

            'ingredientes.required'          => 'El campo ingredientes es obligatorio.',
            'ingrediemtes.max'               => 'La cantidad mínima de carácteres es 6.',
            'ingredientes.regex'             => 'Los carácteres deben ser solo letras.',

            'imagen.required'          => 'La imagen es obligatoria.'

        ];
    }
}
