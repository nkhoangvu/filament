<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ParagraphRequest extends FormRequest
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
        return [
            'page_id' => 'required|integer',
            'dis_order' => 'required|integer',
            'title' => 'required|string',
            'title_enable' => 'nullable',
            'paragraph' => 'required|string',
        ];
    }
}
