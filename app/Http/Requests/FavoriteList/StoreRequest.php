<?php

namespace App\Http\Requests\FavoriteList;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'name' => 'nullable|string|min:3|max:255',
            'description' => 'nullable|string|min:3|max:2500',
            'user_id' => 'required|integer|exists:App\Models\User,id',
            'beverage_id' => 'required|integer|exists:App\Models\Beverage,id',
        ];
    }
}
