<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PropertyAntiquityRequest extends FormRequest
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

    protected function prepareForValidation()
    {
        // TODO revisar desde el front cuando no se mande un booleano
        if (in_array($this->get('delivered_painted'), ['S', 'N'])) {
            $this->merge([
                'delivered_painted' => $this->get('delivered_painted') == "S"
            ]);
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'property_id'                   => 'required|exists:properties,id',
            'antiquity'                     => 'required|numeric',
            'property_conservation_id'      => 'required|exists:property_conservations,id',
            'property_termination_id'       => 'required|exists:property_terminations,id',
            'property_maintenance_state_id' => 'required|exists:property_maintenance_states,id',
            'delivered_painted'             => 'required|boolean'
        ];
    }
}
