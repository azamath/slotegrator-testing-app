{{ $winning->prize->name() }} / amount: {{ $winning->prize->amount }}
@if ($winning->prize->is_converted)
    (converted)
@else
    <form method="POST" action="{{ route('convert', $winning->prize->id) }}">
        @csrf
        <x-button type="submit">Convert</x-button>
    </form>
@endif
