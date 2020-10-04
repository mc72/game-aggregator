<div class="relative" x-data="{ isVisible: true }" @click.away="isVisible = false">
    <input
        wire:model.debounce.300ms="search"
        type="text"
        class="w-64 px-3 py-1 pl-8 text-sm bg-gray-800 rounded-full focus:outline-none focus:shadow-outline"
        placeholder="Search (Press '/' to focus)"
        x-ref="search"
        @keydown.window="
            if(event.keyCode === 191){
                event.preventDefault();
                $refs.search.focus();
            }
        "
        @focus="isVisible = true"
        @keydown.escape.window="isVisible = false"
        @keydown="isVisible = true"
        @keydown.shift.tab="isVisible = false"
    >
    <div class="absolute top-0 flex items-center h-full ml-2">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="inline-block w-6 pr-2 text-gray-400 fill-current"><path d="M12.9 14.32a8 8 0 1 1 1.41-1.41l5.35 5.33-1.42 1.42-5.33-5.34zM8 14A6 6 0 1 0 8 2a6 6 0 0 0 0 12z"/></svg>
    </div>

    <div wire:loading class="top-0 right-0 mt-3 mr-4 spinner" style="position:absolute"></div>


    @if(strlen($search )>= 2)
    <div class="absolute z-50 w-64 mt-2 text-sm bg-gray-800 rounded" x-show.transition.opacity.duration.500="isVisible">
        @if(count($searchResults) > 0)
        <ul>
            @foreach($searchResults as $game)
            <li class="border-b border-gray-700">
                <a
                    href="{{ route('games.show', $game['slug']) }}"
                    class="flex items-center block px-3 py-3 transition duration-150 ease-in-out hover:bg-gray-700"
                    @if($loop->last)@keydown.tab="isVisible=false"@endif
                >
                    @if(isset($game['cover']))
                    <img src="{{ Str::replaceFirst('thumb', 'cover_small', $game['cover']['url']) }}" alt="cover image" class="w-10" />
                    @else
                    <img src="https://via.placeholder.com/264x352" alt="game cover" class="w-10" />
                    @endif
                    <span class="ml-4">{{ $game['name'] }}</span>
                </a>
            </li>
            @endforeach
        </ul>
        @else
        <div class="px-3 py-3">No results for "{{ $search }}"</div>
        @endif
    </div>
    @endif
</div>
