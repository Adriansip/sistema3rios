<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BitacoraStoreRequest extends FormRequest
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
            'cliente' => 'required',
            'noEmbarque' => 'required',
            'kilosBrutos' => 'required|numeric',
            'kilosNetos' => 'required|numeric',
            'numeroTarimas' => 'required|numeric'
        ];
    }
}
