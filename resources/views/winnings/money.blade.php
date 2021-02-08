{{ $winning->prize->name() }} / amount: {{ $winning->prize->amount }}
@if ($winning->prize->is_withdrawn)
    (withdrawn)
@else
    <form method="POST" action="{{ route('withdraw', $winning->prize->id) }}">
        @csrf
        <x-button type="submit">Withdraw</x-button>
    </form>
@endif
