<?php

namespace App\Http\Requests;

use App\Models\NotificationReason;
use Illuminate\Foundation\Http\FormRequest;

class NotificationRequest extends FormRequest
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
            'date'  => 'required|date',
            'other_reason'  => 'nullable|string',
            'contract_id' => 'required|exists:contracts,id',
            'notification_management_id' => 'required|exists:notification_managements,id',
            'notification_reason_id' => 'required|exists:notification_reasons,id',
            'user_id' => 'required|exists:users,id',
            'notification_response_id' => 'nullable|exists:notification_responses,id'
        ];
    }

    protected function prepareForValidation()
    {
        if(!in_array($this->get('notification_reason_id'),NotificationReason::NOTIFICATION_OTHER_REASONS)) {
            $this->merge([
                'other_reason' => null
            ]);
        }
    }
}
