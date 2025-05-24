@component('mail::message')
{!!  __('user::frontend.emails.your_medical_profile_approved') !!}
@component('mail::button', ['url' => $url])
    {!!  __('apps::frontend.emails.visit_site') !!}
@endcomponent
{{__('apps::frontend.emails.thanks')}},<br>{{ config('app.name') }}
@endcomponent
