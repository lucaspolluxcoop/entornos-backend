<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContractExtintionRequest extends FormRequest
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
            'extintion_date'        => 'required|date',
            'extintion_reason_id'   => 'required|exists:extintion_reasons,id',
            'other_reason'          => 'nullable|required_if:extintion_reason_id,9|string',
        ];
    }
}
