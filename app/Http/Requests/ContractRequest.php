<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContractRequest extends FormRequest
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
            'start_contract'                => 'required|date',
            'end_contract'                  => 'required|date',
            'contract_locative_canon_id'    => 'nullable|numeric|exists:contract_locative_canons,id',
            'warranties'                    => 'required|array',
            'property_id'                   => 'required|exists:properties,id',
            'contract_type_id'              => 'required|exists:contract_types,id',
            'owner_id'                      => 'required|exists:users,id',
            'tenant_id'                     => 'required|exists:users,id',
            'locator_id'                    => 'required|exists:users,id',
        ];
    }

    public function attributes()
    {
        $attributes = [
            'start_contract'                => 'Inicio de Contrato',
            'end_contract'                  => 'Fin de Contrato',
            'contract_locative_canon_id'    => 'Canon Locativo',
            'warranties'                    => 'Garantías',
            'property_id'                   => 'Propiedad',
            'contract_type_id'              => 'Tipo de Contrato',
            'owner_id'                      => 'Creador del Contrato',
            'tenant_id'                     => 'Locatario',
            'locator_id'                    => 'Locador',
        ];

        return $attributes;
    }
}
