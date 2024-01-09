<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class AddHealthDataRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'user_id' => 'required|exists:users,id',
            'data' => 'required|numeric',
            'type' => 'required|string|max:255'
        ];
    }
}
{

}
