<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CollectRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'website' => ['required', 'uuid'],
            'event' => ['required', 'string'],
            'hostname' => ['required', 'string'],
            'referrer' => ['nullable', 'url'],
            'language' => ['nullable', 'string'],
            'screen' => ['required', 'string'],
            'url' => ['required', 'string'],
        ];
    }
}