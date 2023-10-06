<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NgoaiRequest extends FormRequest
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
            'MaCha' => 'required|integer',
            'MaMe' => 'required|integer',
            'GioiTinh' => 'required|integer',
            'NgaySinhDL' => 'nullable|date',
            'NgaySinhAL' => 'nullable|integer',
            'ConThu' => 'required|integer',
            'ChucVi' => 'nullable|string',
            'LienKet' => 'nullable|string',
            'GhiChu' => 'nullable|string'
        ];
		
		if ($this->isMethod('POST')) {
            $rules['user_id'] = 'nullable|integer';
        } else if ($this->isMethod('PUT') || $this->isMethod('PATCH')) {
            $rules['user_id'] = 'nullable|integer';
        }

        return $rules;
    }
}
