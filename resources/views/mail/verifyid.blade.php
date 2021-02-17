@component('mail::message')
Congratulations! <br>
Your ID has been approved

Login into your dashboard
@component('mail::button', ['url' => route('index')])
Login
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
