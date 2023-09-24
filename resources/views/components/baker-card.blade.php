@props(['baker'])

<article {{ $attributes->merge(['class' => 'transition-colors duration-300 hover:bg-gray-100 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl']) }}>
    <div class="py-6 px-5 h-full flex flex-col">
        <div>
            <img src="{{ asset('/images/' . $baker->image_path) }}" alt="Blog Post illustration" class="rounded-xl">
        </div>

        <div class="mt-6 flex flex-col justify-between flex-1">
            <div>
                <header>
                    <div class="mt-4">
                        <h1 class="text-3xl clamp one-line">
                            <a href="/bakers/{{ $baker->slug }}">
                                {{ $baker->name }}
                            </a>
                        </h1>
                        <span class="mt-2 block text-gray-800 text-sm">
                            Age: {{ $baker->age }}</time>
                        </span>
                        @if(!empty($baker->job))
                        <span class="mt-2 block text-gray-800 text-sm">
                            Job: {{ $baker->job }}</time>
                        </span>
                        @endif
                    </div>
                </header>
                <div class="mt-4 space-y-4">
                    {!! $baker->bio !!}
                </div>
            </div>
            <footer class="flex justify-between items-center mt-8">
                <div>
                    <a href="/bakers/{{ $baker->slug }}" class="transition-colors duration-300 text-xs font-semibold bg-gray-200 hover:bg-gray-300 rounded-full py-2 px-8">Read More</a>
                </div>
            </footer>
        </div>
    </div>
</article>