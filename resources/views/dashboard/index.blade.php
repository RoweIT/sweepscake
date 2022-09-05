<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <p>
                Current user: {{ $user->name }}
            </p>
            <p>
                Sweepscakes:
            </p>
            <ul>
                @foreach ($user->sweepscakes as $sweepscake)
                    <li><a href="/sweepscakes/{{ $sweepscake->slug }}">{{ $sweepscake->name }}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
</x-app-layout>
