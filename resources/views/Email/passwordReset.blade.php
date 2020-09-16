@component('mail::message')
# Change Password Request

Click on the Button bellow to change password
@component('mail::button', ['url' => 'http://localhost:4200/response-pssword-reset?token='.$token])
Reset Password
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
