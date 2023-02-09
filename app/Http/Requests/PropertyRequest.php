<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PropertyRequest extends FormRequest
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
        $PropertyFieldValidation = $this->isMethod('post') ? 'unique' : 'exists';

        return [
            'street'                => 'required',
            'number'                => 'required|numeric',
            'floor'                 => 'nullable',
            'apartment'             => 'nullable',
            'area'                  => 'nullable|numeric',
            'neightbourhood'        => 'nullable',
            'zip'                   => 'required|string',
            'property_identifier'   => "required|{$PropertyFieldValidation}:properties,property_identifier",
            'owner_tax_id'          => 'required|min:11',
            'city_id'               => 'required|exists:cities,id',
            'property_type_id'      => 'required|exists:property_types,id',
            'property_zone_id'      => 'nullable|exists:property_zones,id'
        ];
    }
    public function attributes()
    {
        $attributes = [
            'street'                => 'Calle',
            'number'                => 'Número',
            'floor'                 => 'Piso',
            'apartment'             => 'Departamento',
            'area'                  => 'Área',
            'neightbourhood'        => 'Barrio',
            'zip'                   => 'Código Postal',
            'property_identifier'   => 'Partida Inmobiliaria',
            'owner_tax_id'          => 'CUIT Propietario',
            'city_id'               => 'Ciudad',
            'property_type_id'      => 'Tipo de Propiedad',
            'property_zone_id'      => 'Zona',
        ];

        return $attributes;
    }
}
