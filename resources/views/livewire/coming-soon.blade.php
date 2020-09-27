<div wire:init="loadComingSoon" class="mt-8 space-y-10 coming-soon-container">
    @forelse($comingSoon as $game)
   <x-game-card-small :game="$game" />
    @empty
    @foreach(range(1,4) as $game)
    <x-game-card-small-skeleton />
    @endforeach
    @endforelse
</div>
