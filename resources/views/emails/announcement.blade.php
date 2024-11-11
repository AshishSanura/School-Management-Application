@component('mail::message')
# {{ $announcement->title }}

{{ $announcement->message }}

Thanks,<br>
{{ config('app.name') }}
@endcomponent