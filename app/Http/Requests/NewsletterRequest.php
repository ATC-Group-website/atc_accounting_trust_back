<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class NewsletterRequest extends FormRequest
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
        $rules = [
            'email' => ['required', 'email'],
        ];

        if ($this->routeIs('newsletter.subscribe')) {
            $rules['email'][] = Rule::unique('news_letters', 'email');
        }

        if ($this->routeIs('newsletter.unsubscribe')) {
            $rules['email'][] = Rule::exists('news_letters', 'email');
        }

        return $rules;
    }
}
