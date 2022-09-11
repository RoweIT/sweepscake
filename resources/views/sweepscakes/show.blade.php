<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $sweepscake->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-sweepscake-detail-card :sweepscake="$sweepscake"/>
            </div>

            <p>
            <h2 class="text-xl mt-4">Your Bakers</h2>
            </p>

            <div class=" mt-4 bg-white overflow-hidden shadow-xl sm:rounded-lg">
                @if ($bakers->count())
                    <div class="lg:grid lg:grid-cols-2">
                        @foreach ($bakers as $baker)
                            <x-baker-detail-card :baker="$baker"/>
                        @endforeach
                    </div>
                @else
                    <p class="text-center">You have no bakers for this sweepscake.</p>
                @endif
            </div>
        </div>
    </div>

</x-app-layout>
