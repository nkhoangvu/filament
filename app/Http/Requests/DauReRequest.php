<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DauReRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        $rules = [
            'Ho' => 'required|string',
            'TenDem' => 'nullable|string',
            'Ten' => 'required|string',
            'TenCha' => 'nullable|string',
            'TenMe' => 'nullable|string',
            'TenHuy' => 'nullable|string',
            'TenTu' => 'nullable|string',
            'BietHieu' => 'nullable|string',
            'ThuyHieu' => 'nullable|string',
            'PhapDanh' => 'nullable|string',
            'GioiTinh' => 'required|integer',
            'NgaySinhDL' => 'nullable|date_format:d/m/Y',
            'NgaySinhAL' => 'nullable|string',
            'NgayMatDL' => 'nullable|date_format:d/m/Y',
            'NgayMatAL' => 'nullable|string',
            'HuongTho' => 'nullable|integer',
            'TinhTrang'  => 'nullable|integer',
            'ConThu' => 'nullable|integer',
            'MaMoTang' => 'nullable|integer',
            'TieuSu'  => 'nullable',
            'ChanDung'  => 'nullable|file',
            'MaDiaChi' => 'nullable|integer',
            'NoiSinh' => 'nullable|string',
            'NoiSong' => 'nullable|string',
            'QueQuan' => 'nullable|string',
            'MaMoTang' => 'nullable|integer',
            'ChucVi' => 'nullable|string',
            'PhongTang' => 'nullable|string',
        ];
		
		if ($this->isMethod('POST')) {
            $rules['user_id'] = 'nullable|integer';
        } else if ($this->isMethod('PUT') || $this->isMethod('PATCH')) {
            $rules['user_id'] = 'nullable|integer';
        }

        return $rules;
    }
}
