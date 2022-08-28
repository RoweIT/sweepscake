@props(['baker'])

<article
    class="transition-colors duration-300 hover:bg-gray-100 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl">
    <div class="py-6 px-5 lg:flex">
        <div class="flex-1 lg:mr-8">
            <img src="{{ asset('/' . $baker->image_path) }}" alt="Blog Post illustration" class="rounded-xl">
        </div>
        <div class="flex-1 flex flex-col justify-between">
            <header class="mt-8 lg:mt-0">
                <div class="mt-4">
                    <h1 class="text-3xl">
                        <a href="/posts/{{ $baker->slug }}">
                            {{ $baker->name }}
                        </a>
                    </h1>
                    <span class="mt-2 block text-gray-800 text-sm">
                        Age: {{ $baker->age }}</time>
                    </span>
                    <span class="mt-2 block text-gray-800 text-sm">
                        Job: {{ $baker->job }}</time>
                    </span>
                </div>
            </header>
            <div class="text-sm mt-2 space-y-4">
                {!! $baker->bio !!}
            </div>
        </div>
    </div>
</article>
