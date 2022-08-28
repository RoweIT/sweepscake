<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Bakers') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                @if ($bakers->count())
                    <x-bakers-grid :bakers="$bakers"/>
                @else
                    <p class="text-center">No bakers yet. Please check back later.</p>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
