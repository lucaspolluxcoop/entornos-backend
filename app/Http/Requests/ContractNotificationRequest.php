<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContractNotificationRequest extends FormRequest
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
            'contract_notification_category_id' => 'required|numeric|exists:contract_notification_categories,id',
            'contract_id'                       => 'required|numeric|exists:contracts,id',
            'notification_date'                 => 'required|date',
            'response_date'                      => 'exclude_if:contract_notification_response_id,null|required|date',
            'contract_notification_response_id' => 'nullable||numeric|exists:contract_notification_responses,id',
            'first_part_id'                     => 'required|numeric|exists:users,id',
            'second_part_id'                    => 'required|numeric|exists:users,id',
            'reason_id'                         => 'required||numeric|exists:contract_notification_categories,id'
        ];
    }
}
