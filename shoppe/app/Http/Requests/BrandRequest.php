<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BrandRequest extends FormRequest
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
            'brand_name	' => 'required|unique:categorys,brand_name',
        ];
    }
    public function messages()
    {
        return [
            'required' =>':attribute :Không được để trống trường ',
            'unique' => ':attribute đã tồn tại trong cơ sở dữ liệu',
        ];
    }
}
