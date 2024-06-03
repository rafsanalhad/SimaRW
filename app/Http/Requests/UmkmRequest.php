<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UmkmRequest extends FormRequest
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
            'pemilik_umkm' => 'required',
            'nama_umkm' => 'required',
            'alamat_umkm' => 'required',
            'kontak_umkm' => 'required',
            'jam_operasional_awal' => 'required',
            'jam_operasional_akhir' => 'required',
            'deskripsi_umkm' => 'required',
        ];
    }
}
