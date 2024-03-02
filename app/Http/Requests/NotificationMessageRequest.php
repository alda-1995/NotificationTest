<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NotificationMessageRequest extends FormRequest
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
            'message' => 'required|string|max:800',
            'categorie_name' => 'required|string|max:500',
        ];
    }

    /**
     * Get custom validation messages.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'message.required' => 'El mensaje es requerido.',
            'message.string' => 'El campo no es válido.',
            'message.max' => 'El mensaje no puede tener más de :max caracteres.',
            'categorie_name.required' => 'La categoría es requerida',
            'categorie_name.string' => 'La categoría no es válida',
            'categorie_name.max' => 'La categoría no puede tener más de :max caracteres.',
        ];
    }
}
