@props(['sweepscake'])
<article
    class="transition-colors duration-300 border border-black border-opacity-0 rounded-xl">
    <div class="py-6 px-5 lg:flex">
        <div class="flex-1 lg:mr-8">
            <img src="{{ asset('/images/' . $sweepscake->series->image_path) }}" alt="Picture of bakers from series {{$sweepscake->series->name}}" class="rounded-xl">
        </div>
        <div class="flex-1 flex flex-col justify-between">
            <header class="mt-8 lg:mt-0">
                <div class="mt-4">
                    <h1 class="text-3xl">
                        <a href="/sweepscakes/{{ $sweepscake->slug }}">
                            {{ $sweepscake->name }}
                        </a>
                    </h1>
                    <span class="mt-2 block text-gray-800 text-sm">
                        Series: {{ $sweepscake->series->name }}</time>
                    </span>
                    <span class="mt-2 block text-gray-800 text-sm">
                        {{ $sweepscake->series->status }}</time>
                    </span>
                </div>
            </header>
            <footer class="flex justify-between items-center mt-8">
                <div>
                    <a href="/sweepscakes/{{ $sweepscake->slug }}"
                       class="transition-colors duration-300 text-xs font-semibold bg-gray-200 hover:bg-gray-300 rounded-full py-2 px-8"
                    >View</a>
                </div>
            </footer>
        </div>
    </div>
</article>
