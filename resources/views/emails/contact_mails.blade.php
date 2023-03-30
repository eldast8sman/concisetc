<x-mail::message>
# {{ $interest }}

{!! $message !!}

{{-- <x-mail::button :url="''">
Button Text
</x-mail::button> --}}

<br>
{{ $name }}<br />{{ $email }}
</x-mail::message>
