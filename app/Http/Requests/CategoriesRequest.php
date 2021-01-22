<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoriesRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:200',
            'description' => 'required|max:500',
            'slug' => 'required|unique:categories',
            'is_active' => 'required|numeric',
        ];
    }
    public function attributes()
    {
        return [
            'name' => 'Kategori Adı',
            'description' => 'Kategori Açıklaması',
            'slug' => 'Kategori Slug',
            'is_active' => 'Kategori Durum',
        ];
    }
}
