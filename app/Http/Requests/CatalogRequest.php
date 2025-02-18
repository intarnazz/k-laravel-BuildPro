<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CatalogRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $id = $this->route('catalog');
        return [
            'name' => [
                'required',
                Rule::unique('catalogs')->ignore($id),
            ],
            'type' => ['required', Rule::in(['plant'])],
            "price" => "required|numeric",
            "image_id" => "required|numeric",
            "description" => "required",
        ];
    }
}
