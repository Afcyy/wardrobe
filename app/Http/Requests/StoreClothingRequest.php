<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\ValidationException;

class StoreClothingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'category' => 'required|exists:categories,id',
            'season' => 'required|exists:seasons,id',
            'tags' => 'required|string',
            'image' => 'required_without:image_url|mimes:jpg,jpeg,png',
            'image_url' => 'nullable|url'
        ];
    }

    /**
     * Handle a failed validation attempt.
     *
     * @param Validator $validator
     * @return RedirectResponse
     *
     * @throws ValidationException
     */
    protected function failedValidation(Validator $validator): RedirectResponse
    {
        session()->put('error', $validator->errors()->getMessages());

        throw (new ValidationException($validator))
            ->errorBag($this->errorBag)
            ->redirectTo($this->getRedirectUrl());
    }
}
