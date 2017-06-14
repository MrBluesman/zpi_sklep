<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PracEditRequest extends FormRequest
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
        $osobaId = $this->input('id');

        //dd($osobaId);

        return [
            'email' => 'required|email|unique:osoba,email,'. $osobaId .',osoba_id',
            'imie' => 'required|max:40|regex:/^[a-zA-Z]+$/u',
            'nazwisko' => 'required|max:60|regex:/^[a-zA-Z]+$/u',
            'pesel' => 'required|digits_between:11,11|numeric',
            'nr_telefonu' => 'required|digits_between:9,12|numeric',
        ];
    }

    public function messages()
    {
        return [
//            'tytul.required' => 'Pole tytul jest wymagane!',
//            'tytul.max' => 'Pole tytul nie moze miec wiecej jak 60 znakow',
//            'tresc.required' => 'Pole tresc jest wymagane!'
            'email.unique' => 'Ten adres e-mail jest już zarejestrowany w systemie',
            'email.required' => 'Pole adres e-mail jest wymagane',
            'imie.required' => 'Pole imię jest wymagane',
            'imie.max' => 'Imię nie może być dłuższe niż 40 znaków',
            'imie.regex' => 'Imię nie może zawierać cyfr',
            'nazwisko.required' => 'Pole nazwisko jest wymagane',
            'nazwisko.max' => 'Nazwisko nie może być dłuższe niż 40 znaków',
            'nazwisko.regex' => 'Nazwisko nie może zawierać cyfr',
            'pesel.required' => 'Pole pesel jest wymagane',
            'pesel.digits_between' => 'Pesel musi mieć dokładnie 11 znaków',
            'pesel.numeric' => 'Numer pesel nie może zawierać liter',
            'nr_telefonu.required' => 'Pole numer telefonu jest wymagane',
            'nr_telefonu.digits_between' => 'Numer telefonu musi mieć między 9 a 12 cyfr',
            'nr_telefonu.numeric' => 'Numer numer telefonu nie może zawierać liter',
        ];
    }
}
