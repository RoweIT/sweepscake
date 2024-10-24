<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $sweepscake->name }}
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <h2 class="text-xl mt-4">The Sweepscake</h2>

            <div class="mt-4 bg-white overflow-hidden sm:rounded-lg">
                <x-sweepscake-detail-card :sweepscake="$sweepscake"/>
            </div>

            @if ($bakerScorecards->count())
            <h2 class="text-xl mt-4">Your Bakers</h2>

            <div class="mt-4 bg-white overflow-hidden sm:rounded-lg">
                @foreach ($bakerScorecards as $bs)
                    <x-baker-detail-card :baker="$bs['baker']" :scorecard="$bs['scorecard']"/>
                @endforeach
            </div>
            @endif

            <h2 class="text-xl mt-4">Scorecard</h2>

            <div class="mt-4 overflow-x-auto relative">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr class = "border-y border-x">
                        <th scope="col" class="py-3 px-6">
                            Baker
                        </th>
                        <th scope="col" class="py-3 px-6">
                            User
                        </th>
                        <th scope="col" class="py-3 px-6">
                            H
                        </th>
                        <th scope="col" class="py-3 px-6">
                            SB
                        </th>
                        <th scope="col" class="py-3 px-6">
                            T 1/2/3
                        </th>
                        <th scope="col" class="py-3 px-6">
                            TL
                        </th>
                        <th scope="col" class="py-3 px-6">
                            RA WK
                        </th>
                        <th scope="col" class="py-3 px-6">
                            RA SC
                        </th>
                        <th scope="col" class="py-3 px-6">
                            SC
                        </th>
                        <th scope="col" class="py-3 px-6">
                            EL
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($bakerUserScorecards as $bus)
                        <tr class="{{ $bus['scorecard']?->isEliminated() ? 'bg-gray-100' : 'bg-white'  }} border-b border-x dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row"
                                class="py-4 px-6 font-semibold text-gray-900 whitespace-nowrap dark:text-white">
                                <a href="/bakers/{{ $bus['baker']->slug }}">{{ $bus['baker']->name }}</a>
                            </th>
                            <td class="py-4 px-6" x-username="{{ $bus['user']->username }}">
                                {{ $bus['user']->name }}
                            </td>
                            <td class="py-4 px-6">
                                {{ $bus['scorecard']?->getHandshakes() ?? 0}}
                            </td>
                            <td class="py-4 px-6">
                                {{ $bus['scorecard']?->getStarBakers() ?? 0}}
                            </td>
                            <td class="py-4 px-6">
                                {{ $bus['scorecard']?->getTechnicalFirsts() ?? 0}} / {{ $bus['scorecard']?->getTechnicalSeconds() ?? 0}} / {{ $bus['scorecard']?->getTechnicalThirds() ?? 0}}
                            </td>
                            <td class="py-4 px-6">
                                {{ $bus['scorecard']?->getTechnicalLasts() ?? 0}}
                            </td>
                            <td class="py-4 px-6">
                                {{ $bus['scorecard']?->isRaisingAgent() ? ($bus['scorecard']?->getRaisingAgentWeek()->week_num) : '' }}
                            </td>
                            <td class="py-4 px-6">
                                {{ $bus['scorecard']?->isRaisingAgent() ? $bus['scorecard']?->getRaisingAgentScore() : '' }}
                            </td>
                            <td class="py-4 px-6">
                                {{ $bus['scorecard']?->getScore() ?? 0}}
                            </td>
                            <td class="py-4 px-6">
                                {{ $bus['scorecard']?->isEliminated() ? 'Y' : '' }}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>

</x-app-layout>
