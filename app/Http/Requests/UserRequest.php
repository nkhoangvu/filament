<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
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
            'name' => 'required|string',        
            'group_id' => 'required',
            'username' => 'required|alpha_dash',
            'nguoiList' => 'nullable',
            'role' => 'nullable',
        ];

        if ($this->isMethod('POST')) {
            $rules['email'] = 'required|email|unique:users,email';
            $rules['password'] = 'required|min:6';
            $rules['confirm'] = 'required|same:password';
        } else if ($this->isMethod('PUT') || $this->isMethod('PATCH')) {
            $rules['email'] = [
                'required',
                Rule::unique('users', 'email')->ignore($this->id),
            ];
        }

        return $rules;
    }
}
