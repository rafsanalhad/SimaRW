<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'role_id' => 'required',
            'nama_user' => 'required',
            'nik_user' => 'required|max:16',
            'tempat' => 'required',
            'tanggal_lahir' => 'required',
            'gender' => 'required',
            'agama' => 'required',
            'status_kawin' => 'required',
            'pekerjaan_user' => 'required',
            'alamat_user' => 'required',
            'email_user' => 'required',
            'gaji_user' => 'required',
            'nomor_rt' => 'required',
            'nomor_rw' => 'required',
            'foto_user' => ''
        ];
    }
}
