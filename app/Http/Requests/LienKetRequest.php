<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LienKetRequest extends FormRequest
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
            'URL' => 'required|string',
            'TenLienKet' => 'required|string',
            'MaNguoi' => 'required|integer',
        ];
		
		if ($this->isMethod('POST')) {
            $rules['user_id'] = 'nullable|integer';
        } else if ($this->isMethod('PUT') || $this->isMethod('PATCH')) {
            $rules['user_id'] = 'nullable|integer';
        }

        return $rules;
    }
}
