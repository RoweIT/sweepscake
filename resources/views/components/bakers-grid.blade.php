@props(['bakers'])

<!--<x-star-baker-card :baker="$bakers[0]" />-->

@if ($bakers->count() > 0)
    <div class="lg:grid lg:grid-cols-6">
        @foreach ($bakers as $baker)
            <x-baker-card
                :baker="$baker"
                class="{{ 'col-span-2' }}"
            />
        @endforeach
    </div>
@endif
