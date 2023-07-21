<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class PlayerStoreRequest extends FormRequest
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
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:64',
            'second_name' => 'required|string|max:64',
            'league_id' => 'required|integer|exists:leagues,id'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Name is required',
            'second_name.required' => 'Second name is required',
            'league_id.exists' => 'Passed league is invalid'
        ];
    }
}
