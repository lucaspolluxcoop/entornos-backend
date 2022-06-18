@component('mail::message')

Estimado {{ $user->profile->denomination ? $user->profile->denomination : $user->profile->first_name.$user->profile->last_name}}. 

Se ha registrado un usuario en el sistema {{ config('app.name') }} con este correo electrónico

Ya se encuentra habilitado para ingresar al sistema haciendo <a href="{{ config('app.frontend_url') }}">CLICK AQUI</a>.

Saludos, {{ config('app.name') }}

@endcomponent
