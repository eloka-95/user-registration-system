@component('mail::message')
# {{ $mailData['title'] }}
  
The body of your message.
  
@component('mail::button', ['url' => $mailData['url']])
Visit Our Website
@endcomponent

@component('mail::panel')
This is the panel content.
@endcomponent

@component('mail::table')
| edit          | Table         | Example  |
| ------------- |:-------------:| --------:|
| Col 2 is      | olisa         | $10      |
| Col 3 is      | kent          | $20      |
@endcomponent
Thanks,

{{ config('app.name') }}
@endcomponent