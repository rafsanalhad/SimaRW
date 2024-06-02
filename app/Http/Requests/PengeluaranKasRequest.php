<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PengeluaranKasRequest extends FormRequest
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
            'nama_pelapor' => 'required',
            'jabatan_pelapor' => 'required',
            'nomor_rt' => 'required',
            'nomor_rw' => 'required',
            'jumlah_pengeluaran' => 'required',
            'bukti_struk' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'keterangan_pengeluaran' => 'required',
        ];
    }
}
