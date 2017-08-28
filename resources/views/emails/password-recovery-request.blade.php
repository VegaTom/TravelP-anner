@component('mail::message')
{{ __('Hello :name.', ['name' => $user->name ?? $user->email]) }}

{{ __('We have received a request to recover your password.') }}

{{ __('If you made this request, click the next button') }}

@component('mail::button', ['url' => $actions['accept']])
{{ __('Proceed') }}
@endcomponent

{{ __('You will receive a new email with a new temporal password. Your old password will be removed.') }}

{{ __("If you didn't make this request or you don't want to further proceed then don't be afraid, your account is still secure.") }}

{{ __('Just delete this mail and Log in as always.') }}

{{ __('Thanks,') }}<br>
<a href="{{ url('/') }}">{{ config('app.name') }}</a>
@endcomponent
