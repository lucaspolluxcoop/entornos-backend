<?php

namespace App\Http\Requests;

use App\Models\Role;
use App\Rules\validatePlate;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        $roleName = Role::find($this->get('role_id'))->name;
        $userFieldValidation = $this->user ? 'exists' : 'unique';
        $required = $this->user ? 'nullable' : 'required';
        $realStateBroker = Role::CORREDOR;
        $tenant = Role::LOCATARIO;
        $warrant = Role::GARANTE;
        $locator = Role::LOCADOR;

        $baseRules = [
            'email'                                     => "required|{$userFieldValidation}:users,email|email",
            'role_id'                                   => 'required|numeric|exists:roles,id',
            'password'                                  => 'nullable|string|min:8',
            'registration_file'                         => 'nullable|file|mimes:pdf',
            'profile.first_name'                        => 'required|string',
            'profile.last_name'                         => 'required|string',
            'profile.denomination'                      => 'nullable|string',
            'profile.district'                          => 'nullable|string',
            'profile.cuit'                              => 'required|numeric',
            'profile.phone'                             => 'nullable|string',
            'profile.cell_phone'                        => 'nullable|string',
            'profile.economic_activity_type_id'         => 'nullable|numeric',
            'profile.other_economic_activity_type_name' => 'nullable|string',
            'profile.website'                           => 'nullable|url',
            'profile.city_id'                           => 'required|numeric|exists:cities,id',
            'profile.zip'                               => 'required|string',
            'profile.street'                            => 'required|string',
            'profile.number'                            => 'required|string',
            'profile.floor'                             => 'nullable|string',
            'profile.apartment'                         => 'nullable|string',
            'profile.neighbourhood'                     => 'nullable|string',
            'profile.family_group_adults'               => 'nullable|numeric',
            'profile.family_group_under_age'            => 'nullable|numeric',
            'profile.plate.number'                      => 'nullable|numeric',
            'profile.plate.plate_state_id'              => 'nullable|numeric',
            'profile.plate.expiration_date'             => 'nullable|date',
            'profile.dni'                               => 'nullable|string',
            'profile.business_name'                     => 'nullable|string',
            'profile.nationality'                       => 'nullable|string'
        ];
        $specificRules = [
            $realStateBroker => [
                'profile.denomination'          => 'required|string',
                'profile.plate.number'          => 'required|unique:plates,number',
                'profile.plate.plate_state_id'  => 'required|numeric|exists:plate_states,id',
                'profile.plate.expiration_date' => 'required|date'
            ],
            $tenant => [
                'profile.economic_activity_type_id'         => 'required|numeric|exists:economic_activity_types,id',
                'profile.other_economic_activity_type_name' => 'nullable|required_if:profile.economic_activity_type_id,4|string',
                'profile.nationality'                       => 'required|string',
                'profile.city_id'                           => 'nullable|string',
                'profile.zip'                               => 'nullable|string',
                'profile.street'                            => 'nullable|string',
                'profile.number'                            => 'nullable|string'
            ],
            $warrant => [
                'profile.economic_activity_type_id'         => 'required|numeric|exists:economic_activity_types,id',
                'profile.other_economic_activity_type_name' => 'nullable|required_if:profile.economic_activity_type_id,4|string',
                'profile.nationality'                       => 'required|string',
                'profile.city_id'                           => 'nullable|string',
                'profile.zip'                               => 'nullable|string',
                'profile.street'                            => 'nullable|string',
                'profile.number'                            => 'nullable|string'
            ],
            $locator => [],
        ];

        if(is_null($roleName)) {

            return $baseRules;
        }

        return array_merge($baseRules, $specificRules[$roleName]);
    }

    protected function prepareForValidation()
    {
        if($this->has('profile') && !is_array($this->get('profile'))) {
            $this->merge([
                'profile' => json_decode($this->get('profile'), true)
            ]);
        }
    }

    public function attributes()
    {
        $attributes = [
            'email'                                     => 'Email',
            'role_id'                                   => 'Rol',
            'password'                                  => 'Contraseña',
            'registration_file'                         => 'Archivo de Registro',
            'profile.first_name'                        => 'Nombre',
            'profile.last_name'                         => 'Apellido',
            'profile.denomination'                      => 'Denominación',
            'profile.district'                          => 'Circunscripción',
            'profile.cuit'                              => 'CUIT',
            'profile.phone'                             => 'Teléfono',
            'profile.cell_phone'                        => 'Celular',
            'profile.economic_activity_type_id'         => 'Actividad Económica',
            'profile.other_economic_activity_type_name' => 'Otra Actividad Económica',
            'profile.website'                           => 'Sitio Web',
            'profile.city_id'                           => 'Ciudad',
            'profile.zip'                               => 'Código Postal',
            'profile.street'                            => 'Calle',
            'profile.number'                            => 'Número',
            'profile.floor'                             => 'Piso',
            'profile.apartment'                         => 'Departamento',
            'profile.neighbourhood'                     => 'Barrio',
            'profile.family_group_adults'               => 'Cantidad de Adultos',
            'profile.family_group_under_age'            => 'Menores de Edad',
            'profile.plate.number'                      => 'Matrícula',
            'profile.plate.plate_state_id'              => 'Estado Matrícula',
            'profile.plate.expiration_date'             => 'Fecha de expiración',
            'profile.dni'                               => 'DNI',
            'profile.business_name'                     => 'Nombre Comercial',
            'profile.nationality'                       => 'Nacionalidad',
        ];

        return $attributes;
    }
}
