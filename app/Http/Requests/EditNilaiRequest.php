<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditNilaiRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nama' => ['sometimes', 'string'],
            'kelas' => ['sometimes', 'string'],
            'ekskul' => ['sometimes', 'string'],
            'nilai' => ['sometimes', 'numeric'],
            'deskripsi' => ['sometimes', 'string'],
        ];
    }
}