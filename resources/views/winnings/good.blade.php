{{ $winning->prize->name() }} / good: {{ $winning->prize->good_name }}
/ Status: {{ $winning->prize->status }}<br>
@if ($winning->prize->status->isNew())
    <form method="POST" action="{{ route('good-action', $winning->prize->id) }}" class="inline-block">
        @csrf
        <input type="hidden" name="status" value="{{ \App\Enums\GoodStatus::ACCEPTED }}">
        <x-button type="submit">Accept</x-button>
    </form>
    <form method="POST" action="{{ route('good-action', $winning->prize->id) }}" class="inline-block">
        @csrf
        <input type="hidden" name="status" value="{{ \App\Enums\GoodStatus::REJECTED }}">
        <x-button type="submit">Reject</x-button>
    </form>
@endif
