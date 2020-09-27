
<div class="mt-8 game">
    <div class="relative inline-block">
         <a href="{{ route('games.show',$game['slug']) }}">
             <img src="{{ $game['coverImgUrl'] }}" alt="game cover image" class="duration-150 hover:opacity-75 transition-ease-in-out">
         </a>

         <div class="absolute bottom-0 right-0 w-16 h-16 bg-gray-800 rounded-full" style="right:-20px; bottom:-20px" id="{{ $game['slug'] }}">

         </div>
         @push('scripts')
         @include('_rating',[
            'slug' => $game['slug'],
            'rating' =>   $game['rating'],
            'event' => null,
         ])
        @endpush
    </div>
    <a href="{{ route('games.show',$game['slug']) }}" class="block mt-8 text-base font-semibold leading-tight hover:text-gray-400">
        {{ $game['name'] }}
        <div class="mt-1 text-gray-400">
        {{ $game['platforms'] }}
        </div>
    </a>
 </div>
