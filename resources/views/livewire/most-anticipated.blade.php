<div wire:init="loadMostAnticipated" class="mt-8 space-y-10 most-anticipated-container">
    @forelse($mostAnticipated as $game)
    <x-game-card-small :game="$game" />
    @empty
    @foreach(range(1,4) as $game)
    <x-game-card-small-skeleton />
    @endforeach
    @endforelse
</div>
