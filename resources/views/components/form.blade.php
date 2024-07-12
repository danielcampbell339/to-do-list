@props([
    'action' => null,
    'method' => 'POST',
])

<form action="{{ $action }}" method="{{ strtolower($method) !== 'get' ? 'post' : 'get' }}">
    @if (strtolower($method) !== 'get')
        @csrf
    @endif
    @if (!in_array(strtolower($method), ['get', 'post']))
        @method($method)
    @endif
    {{ $slot }}
</form>
