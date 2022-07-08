<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'title' => 'required|min:3|max:255',
            'immagine' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'content' => 'required|min:3',
        ];
    }

    public function messages(){
        return [
            'title.required' => 'Il titolo è obbligatorio',
            'title.min' => 'Il titolo deve avere almeno :min caratteri',
            'title.max' => 'Il titolo deve avere massimo :max caratteri',
            'immagine.image' => 'Il file non è stato correttamente caricato',
            'content.min' => 'Il contenuto deve avere almeno :min caratteri'
        ];
    }
}
