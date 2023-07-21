<?php

namespace App\Http\Requests\Task;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
     * @return array
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string',
            'description' => 'nullable|string'
        ];
    }

    /**
     * Custom messages for request validation.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'title.required' => 'this field is required',
            'title.string' => 'this field must be string',
            'description.string' => 'this field must be string',
        ];
    }
}
