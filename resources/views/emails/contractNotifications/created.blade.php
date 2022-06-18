@component('mail::message')

Estimado {{ $user->profile->first_name}} {{ $user->profile->second_name ?? ' '}}. Se ha registrado una notificación en el contrato {{ $contract->id }}

Por favor ingrese al sistema para verificar dicha notificación.

Saludos, {{ config('app.name') }}

@endcomponent
