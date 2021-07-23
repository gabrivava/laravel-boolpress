@component('mail::message')
# Introduction

The body of your message.
Message: {{ $contact->message }}
From: {{ $contact->full_name }}
Email: {{ $contact->email }}

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent

