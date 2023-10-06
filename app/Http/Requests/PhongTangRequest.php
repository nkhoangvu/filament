<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PhongTangRequest extends FormRequest
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
            'TenPhongTang' => 'required|string',
            'ThoiDiem'=> 'nullable|string',
            'GhiChu'=> 'nullable|string',
        ];
		
		if ($this->isMethod('POST')) {
            $rules['user_id'] = 'nullable|integer';
        } else if ($this->isMethod('PUT') || $this->isMethod('PATCH')) {
            $rules['user_id'] = 'nullable|integer';
        }

        return $rules;
    }
}
