<div class="flex flex-wrap game">
    <a href="{    { route('games.show',$game['slug']) }}">
        <img src="{{ $game['coverImgUrl'] }}" alt="game cover image" class="duration-150 hover:opacity-75 transition-ease-in-out">
    </a>
    <div class="ml-4">
        <a href="#" class="hover:text-gray-300">{{ $game['name'] }}</a>
        <div class="mt-1 text-sm text-gray-400">{{ $game['platforms'] }}</div>
        <div class="mt-1 text-sm text-gray-400">
            {{ $game['release_date'] }}
        </div>
    </div>
</div>
