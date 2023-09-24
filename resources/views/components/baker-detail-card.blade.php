@props(['baker', 'scorecard'])
<article
    class="transition-colors duration-300 border border-black border-opacity-0 rounded-xl">
    <div class="py-6 px-5 lg:flex lg:flex-row lg:gap-8">
        <div class="flex-auto w-64">
            <img src="{{ asset('/images/' . $baker->image_path) }}" alt="Picture of baker {{$baker->name}}"
                 class="rounded-xl">
        </div>
        <div class="flex-auto w-96">
            <header class="mt-8 lg:mt-0">
                <div class="mt-4">
                    <h1 class="text-3xl">
                        <a href="/bakers/{{ $baker->slug }}">
                            {{ $baker->name }}
                        </a>
                    </h1>
                    <span class="mt-2 block text-gray-800 text-sm">
                        Age: {{ $baker->age }}
                    </span>
                    @if(!empty($baker->job))
                    <span class="mt-2 block text-gray-800 text-sm">
                        Job: {{ $baker->job }}
                    </span>
                    @endif
                </div>
            </header>
            <div class="mt-2 space-y-4">
                {!! $baker->bio !!}
            </div>
        </div>
        @isset($scorecard)
            <div class="flex-auto w-96">
                <header class="mt-8 lg:mt-0">
                    <div class="mt-4">
                        <h1 class="text-3xl">Scorecard</h1>
                    </div>
                </header>
                <div class="mt-4">
                <span class="mt-2 block text-gray-800 text-sm">
                    Handshakes: {{ str_repeat('🤝', $scorecard->getHandshakes()) }}
                </span>
                    <span class="mt-2 block text-gray-800 text-sm">
                    Star bakers: {{ str_repeat('⭐', $scorecard->getStarBakers()) }}
                </span>
                    <span class="mt-2 block text-gray-800 text-sm">
                    Technicals: {{ $scorecard->getTechnicalFirsts() . ' / ' . $scorecard->getTechnicalSeconds() . ' / ' . $scorecard->getTechnicalThirds() }}
                </span>
                    <span class="mt-2 block text-gray-800 text-sm">
                    Technical lasts: {{ $scorecard->getTechnicalLasts() }}
                </span>
                    <span class="mt-2 block text-gray-800 text-sm">
                    Raising agent played: {{ $scorecard->isRaisingAgent() ? 'Yes' : 'No' }}
                </span>
                    <span class="mt-2 block text-gray-800 text-sm">
                    Raising agent score: {{ $scorecard->isRaisingAgent() ? $scorecard->getRaisingAgentScore() : 'n/a' }}
                </span>
                    <span class="mt-2 block text-gray-800 text-sm">
                    Score: {{ $scorecard->getScore() }}
                </span>
                </div>
            </div>
        @endisset
    </div>
</article>
