<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddSeniorRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'user_id' => 'required|exists:users,id',
            'senior_email' => 'required|string|max:255'
        ];
    }
}
