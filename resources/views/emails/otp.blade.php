<x-mail::message>
# Someone Try to Login Admin Account

Dear {{auth()->user()->username}},

This Email to Inform you that someone try to login administartor account, if it's really you, then use this OTP to Complete Authentication.

OTP: {{$token}}

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
