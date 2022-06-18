@component('mail::message')

Estimado {{ $owner }}. 

Un usuario ha intentado cargar un contrato con la propiedad: {{ $property_identifier }}

Dicha propiedad tiene un contrato suyo activo: {{ $contract_identifier }}.

Por favor ingrese al sistema para verificar dicho contrato y actualizar su estado si corresponde.

Saludos, {{ config('app.name') }}

@endcomponent
