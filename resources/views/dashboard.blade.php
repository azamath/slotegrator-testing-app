<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="text-lg mb-4">
                Loyalty: {{ auth()->user()->loyalty }}
            </div>

            @if (session('prize'))
                <div class="text-green-800 mb-4">
                    {{ session('prize') }}
                </div>
            @endif

            @foreach($winnings as $winning)
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-4">
                <div class="p-6 bg-white border-b border-gray-200">
                    @switch($winning->prize_type)
                        @case(\App\Models\MoneyPrize::class)
                            @include('winnings.money')
                            @break
                        @case(\App\Models\PointsPrize::class)
                            @include('winnings.points')
                            @break
                        @case(\App\Models\GoodPrize::class)
                            @include('winnings.good')
                            @break
                    @endswitch
                </div>
            </div>
            @endforeach

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('get-prize') }}">
                        @csrf
                        <x-button type="submit">
                            I'm lucky!
                        </x-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
