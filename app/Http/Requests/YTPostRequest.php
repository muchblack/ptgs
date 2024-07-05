<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class YTPostRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //
            'title'=>'required|string',
            'ytLink' => 'required|string',
        ];
    }
}
