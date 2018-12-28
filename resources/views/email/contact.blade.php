@component('mail::message')
    # New Contact Message

    Someone submitted a contact form.

    @component('mail::panel')
        {{$message}}
    @endcomponent

    @component('mail::button', ['url' => ''])
        Button Text
    @endcomponent

    Thanks,<br>
    {{ config('app.name') }}
@endcomponent

