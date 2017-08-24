@component('mail::message')
{{ __('Hello :name.', ['name' => $user->name ?? $user->email]) }}

{{ __('We have received a request to recover your password.') }}

{{ __('At next we left your new password&#58;') }}

@component('mail::promotion')
{{ $password }}
@endcomponent

{{ __('We recomend you to change this password as soon as you log in again.') }}

{{ __("If you didn't make this request your email account may be compromised.") }}

{{ __('Please take the respective actions to secure your email account.') }}

{{ __('Thanks,') }}<br>
<a href="{{ url('/') }}">{{ config('app.name') }}</a>
@endcomponent
