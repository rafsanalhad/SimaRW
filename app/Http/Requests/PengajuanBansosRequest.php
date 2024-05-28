<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PengajuanBansosRequest extends FormRequest
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
            'kartu_keluarga_id' => 'required',
            'pendapatan_keluarga' => 'required',
            'tanggungan_warga' => 'required',
            'nomor_rt' => 'required',
            'nomor_rw' => 'required',
            'file_sktm' => 'required|file|mimes:pdf|max:2048',
            'alasan_warga' => 'required',
        ];
    }
}
