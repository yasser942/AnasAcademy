<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCardRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'word' => 'required|string',
            'word_translation' => 'required|string',
            'sentence' => 'required|string',
            'sentence_translation' => 'required|string',
            'word_category_id' => 'required|exists:word_categories,id',
        ];
    }
}
