<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class updateTeamRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "fullName" => "sometimes|max:200",
            "image" => "mimes:jpg,jpeg,png|image",
            "caption" => "sometimes",
            "facebook" => "sometimes",
            "instagram" => "sometimes",
            "twitter" => "sometimes"
        ];
    }
}
