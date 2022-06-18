<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WarrantyRequest extends FormRequest
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
            'title'             => 'required|string',
            'description'       => 'nullable|string',
            'warranty_type_id'  => 'required|numeric|exists:warranty_types,id',
            'user_id'           => 'exclude_unless:warranty_type_id,5|required|exists:users,id',
            'document'          => 'sometimes|file|mimes:pdf'
        ];
    }
}
