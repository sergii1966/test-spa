<?php

namespace App\Http\Requests\Backend\Product;

use Closure;
use Illuminate\Foundation\Http\FormRequest;

class AddPricesProductRequest extends FormRequest
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
        return parent::getRedirectUrl() . '#add-prices-product';
    }

        /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'id' => [],
            'product_id' => ['required'],
            'price_old' => [
                'required',
                'integer',
                'min:1',
            ],
            "price_new" => [
                function (string $attribute, mixed $value, Closure $fail) {
                    if ($this->request->get('price_old') && $value && $this->request->get('price_old') <= $value) {
                        $fail(__('Акційна ціна має бути менше ціни товара'));
                    }
                },
            ],
        ];
    }
}
