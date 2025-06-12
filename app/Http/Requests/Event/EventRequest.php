<?php

namespace App\Http\Requests\Event;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
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
            'title' => ['required', 'string', 'max:255'],
            'banner' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'description' => ['nullable', 'string'],
            'location' => ['required', 'nullable', 'string', 'max:255'],
            'date' => ['required', 'date', 'after_or_equal:today'],
            'time' => ['required', 'date_format:H:i'],
            'duration' => ['required', 'integer', 'min:1'],
            'duration_unit' => ['required', 'in:hours,days'],
            'gender' => ['required', 'nullable', 'in:male,female,both'],
            'members_count' => ['required', 'nullable', 'integer', 'min:0'],

        ];
    }
}
