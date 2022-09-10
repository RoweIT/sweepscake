<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div>
                <div class="mt-4 py-4 px-4">
                    Your current Sweepscakes
                </div>
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    @if ($current_sweepscakes->count() == 0)
                        <p>You have no current Sweepscakes</p>
                    @else
                        @foreach ($current_sweepscakes as $sweepscake)
                            <x-sweepscake-card :sweepscake="$sweepscake"/>
                        @endforeach
                    @endif
                </div>

                <div>
                    <div class="mt-4 py-4 px-4">
                        Your previous Sweepscakes
                    </div>
                    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                        @if ($previous_sweepscakes->count() == 0)
                            <p>You have no previous Sweepscakes</p>
                        @else
                            @foreach ($previous_sweepscakes as $sweepscake)
                                <x-sweepscake-card :sweepscake="$sweepscake"/>
                            @endforeach
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
