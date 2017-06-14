<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArtistAddRequest extends FormRequest
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
            'nazwa' => 'required|max:60|unique:artysta,nazwa',
        ];
    }

    public function messages()
    {
        return [
            'nazwa.required' => 'Pole nazwa jest wymagane',
            'nazwa.max' => 'Nazwa nie może przekraczać 60 znaków',
            'nazwa:unique' => 'Artysta o tej nazwie już istnieje w systemie',
        ];
    }
}
