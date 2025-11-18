<x-mail::message>
# Welcome to {{ config('app.name') }}

Hi {{ $subscriber->email }},

Thanks for subscribing to our updates. We will only reach out when we have
actionable finance tips, regulatory alerts, or feature releases that can help
you stay ahead.

<x-mail::button :url="config('app.url')">
Visit Our Site
</x-mail::button>

If this wasn't you, simply ignore this message and you will not hear from us
again.

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
