@component('mail::message')

Estimado {{ $plate->profile->denomination ? $plate->profile->denomination : $plate->profile->first_name.$plate->profile->last_name}}.

Se le informa que su matrícula ha sido inhabilitada. Por favor comuníquese con su Colegio de Corredores Inmobiliarios para rectificar la situación.

Saludos, {{ config('app.name') }}

@endcomponent
