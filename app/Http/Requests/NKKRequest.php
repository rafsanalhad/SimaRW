<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NKKRequest extends FormRequest
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
            'no_kartu_keluarga' => 'required|max:16',
            'nama_kepala_keluarga' => 'required',
            'alamat_kk' => 'required',
            'jumlah_tanggungan' => 'required',
        ];
    }
}
