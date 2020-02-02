<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContentBlockStore extends FormRequest
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
            'description' => 'required',
            'internal_name' => 'required|string|max:200',
            'title' => 'required|string|max:200',
        ];
    }

    /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages()
    {
        return [
            'description.required' => 'De tekst is verplicht!',
            'internal_name.required' => 'De interne referentie is verplicht!',
            'title.required' => 'De titel is verplicht!',
        ];
    }
}
