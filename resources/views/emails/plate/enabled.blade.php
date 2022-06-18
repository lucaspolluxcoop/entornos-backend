@component('mail::message')

Estimado {{ $plate->profile->denomination ? $plate->profile->denomination : $plate->profile->first_name.$plate->profile->last_name}}.

Se le informa que su matrícula ha sido activada.
Saludos, {{ config('app.name') }}

@endcomponent
