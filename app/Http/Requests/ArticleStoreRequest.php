<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleStoreRequest extends FormRequest
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
        if (request()->isMethod('POST')) {
            return [
                'name' => 'required|string',
                'value' => 'required|integer',
                'description' => 'required|string',
                'category' => 'required|string',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ];
        } else {
            return [
                'name' => 'string',
                'value' => 'integer',
                'description' => 'string',
                'category' => 'string',
                'image' => 'string',
            ];
        }
        return [];
    }

    public function messages()
    {
        if (request()->isMethod('POST')) {

            return [
                'name.required' => 'name is required',
                'value.required' => 'price is required',
                'description.required' => 'description is required',
                'category.required' => 'category is required',
                'image.required' => 'image is required',
            ];
        } else {
            return [
                'name.string' => 'name must be a string',
                'value.integer' => 'price must be an integer',
                'description.string' => 'description must be a string',
                'category.string' => 'category must be a string',
                'image.string' => 'image must be a string',
            ];
        }
    }
}
