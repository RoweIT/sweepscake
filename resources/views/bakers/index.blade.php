<x-guest-layout>
    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        @if ($bakers->count())
            <x-bakers-grid :bakers="$bakers"/>
        @else
            <p class="text-center">No bakers yet. Please check back later.</p>
        @endif
    </main>
</x-guest-layout>
