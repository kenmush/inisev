@component('mail::message')
# Hello there,

A new post has been published with the title: {{ $post->title }}.
The posts Description is:
{{ $post->description }}
Thanks,<br>
{{ config('app.name') }}
@endcomponent
