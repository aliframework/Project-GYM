<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return true; 
    }

    public function rules()
    {
        return [
            'nama' => 'required|string|max:255',
            'durasi' => 'required|integer|min:1',
            'deskripsi' => 'nullable|string',
            'harga' => 'required|numeric|min:0',
        ];
    }

    public function messages()
    {
        return [
            'nama.required' => 'Nama kategori harus diisi.',
            'durasi.required' => 'Durasi harus diisi.',
            'harga.required' => 'Harga harus diisi.',
            'harga.numeric' => 'Harga harus berupa angka.',
            'durasi.integer' => 'Durasi harus berupa angka.',
        ];
    }
}
