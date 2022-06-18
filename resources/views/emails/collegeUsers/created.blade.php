@component('mail::message')

Estimado {{ $profile->first_name}} {{ $profile->second_name ?? ' '}}. Hemos registrado con éxito su usuario.

A continuación le explicaremos los pasos a seguir para que pueda comenzar a utilizar el sistema de {{ config('app.name') }}:

1- El usuario creado actualmente esta en revisión hasta que se verifique la documentación adjuntada en el formulario de creación.

2- Una vez aprobado el usuario se le notificará por este mismo medio dicha situación

3- Luego podrá ingresar al sistema en la sección superior dando click al botón de "iniciar sesión" e ingresar su correo y contraseña.

Saludos, {{ config('app.name') }}

@endcomponent
