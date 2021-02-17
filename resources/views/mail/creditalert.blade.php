@component('mail::message')
    {{ __('$') }}{{ $credited_balance }} {{ __('was credited in your account') }} <br>
    {{ __('Your previous balance: ') }}{{ __('$') }}{{ $prev_balance }} <br>
    {{ __('Credited amount: ') }}{{ __('-$') }}{{ $credited_balance }} <br>
    {{ __('Available Balance: ') }}{{ __('$') }}{{ $new_balance }} <br>

    Login into your dashboard

@component('mail::button', ['url' => route('index')])
Login
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
