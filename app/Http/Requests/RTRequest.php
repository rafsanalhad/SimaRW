<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RTRequest extends FormRequest
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
            'rt_baru' => 'required',
            'nomor_rt' => 'required',
            'nomor_rw' => 'required',
            'masa_jabatan_awal' => 'required',
            'masa_jabatan_akhir' => 'required',
        ];
    }
}
