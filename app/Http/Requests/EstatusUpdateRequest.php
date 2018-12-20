<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EstatusUpdateRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
         return [
            '_noTransito' => 'required',
            '_fecha' => 'required',
            '_hora' => 'required',
        ];
    }
}