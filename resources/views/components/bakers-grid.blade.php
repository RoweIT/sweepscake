@props(['bakers'])

<x-baker-featured-card :baker="$bakers[0]" />

@if ($bakers->count() > 1)
    <div class="lg:grid lg:grid-cols-6">
        @foreach ($bakers->skip(1) as $baker)
            <x-baker-card
                :baker="$baker"
                class="{{ $loop->iteration < 3 ? 'col-span-3' : 'col-span-2' }}"
            />
        @endforeach
    </div>
@endif
