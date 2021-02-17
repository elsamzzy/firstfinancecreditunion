@component('mail::message')
    {{ __('$') }}{{ $deducted_balance }} {{ __('was deducted from your available balance') }} <br>
    {{ __('Your previous balance: ') }}{{ __('$') }}{{ $prev_balance }} <br>
    {{ __('Deducted amount: ') }}{{ __('-$') }}{{ $deducted_balance }} <br>
    {{ __('Available Balance: ') }}{{ __('$') }}{{ $available_balance }} <br>

Login into your dashboard

@component('mail::button', ['url' => route('index')])
Login
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
