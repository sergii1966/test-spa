<?php

namespace App\Http\Requests\Backend\Product\Image;

use Illuminate\Foundation\Http\FormRequest;

class AddImageProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    protected function getRedirectUrl()
    {
        return parent::getRedirectUrl() . '#edit-images-product';
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'image' => ['required', 'mimes:jpeg,jpg,png,gif','max:10000'], // max 10000kb
            'product_id' => ['required']
        ];
    }

    public function messages(): array
    {
        return [
                'image.required' => __('Виберіть зображення'),
                'image.mimes' => __('Невірний формат'),
        ];
    }
}
