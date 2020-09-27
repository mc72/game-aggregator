<div wire:init="loadRecentlyReviewed" class="mt-8 space-y-12 recently-reviewed-container">
    @forelse($recentlyReviewed as $game)
    <div class="flex px-6 py-6 bg-gray-800 rounded-lg shadow-md game">
        <div class="relative flex-none">
            <a href="{{ route('games.show',$game['slug']) }}">
                <img src="{{ $game['coverImgUrl'] }}" alt="game cover image" class="duration-150 hover:opacity-75 transition-ease-in-out">
            </a>

            <div class="absolute bottom-0 right-0 w-16 h-16 bg-gray-900 rounded-full" style="right:-20px; bottom:-20px" id="review_{{ $game['slug'] }}">
                <div class="relative text-xs font-semibold" >

                </div>
            </div>

        </div>
        <div class="ml-12">
            <a href="#" class="block mt-4 text-lg font-semibold leading-tight hover:text-gray-400">
                {{ $game['name'] }}
                <div class="mt-1 text-gray-400">
                    {{ $game['platforms'] }}
                </div>
                <p class="hidden mt-6 text-gray-400 lg:block">
                    {{ $game['summary'] }}
                </p>
            </a>
        </div>
    </div>
    @empty
    @foreach(range(1,3) as $game)
    <div class="flex px-6 py-6 bg-gray-800 rounded-lg shadow-md game">
        <div class="relative flex-none">
          <div class="w-40 h-40 bg-gray-700 lg:w-48 lg:h-56"></div>
        </div>
        <div class="ml-12">
            <div class="block inline-block mt-4 text-lg leading-tight text-transparent bg-gray-700 rounded">Title Goes Here</div>
            <div class="hidden mt-8 space-y-4 lg:block ">
                <span class="inline-block text-transparent bg-gray-700 rounded">Lorem ipsum dolor sit amet consectetur, adipisicing elit.</span>
                <span class="inline-block text-transparent bg-gray-700 rounded">Lorem ipsum dolor sit amet consectetur, adipisicing elit.</span>
                <span class="inline-block text-transparent bg-gray-700 rounded">Lorem ipsum dolor sit amet consectetur, adipisicing elit.</span>
                <span class="inline-block text-transparent bg-gray-700 rounded">Lorem ipsum dolor sit amet consectetur, adipisicing elit.</span>
            </div>
        </div>
    </div>
    @endforeach
    @endforelse
</div>
@push('scripts')
@include('_rating', [
        'event' => 'recentGameWithRatingAdded'
    ])
@endpush

