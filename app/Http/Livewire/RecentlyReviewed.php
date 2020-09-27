<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;


class RecentlyReviewed extends Component
{
    public $recentlyReviewed = [];

    public function loadRecentlyReviewed() {

        $before = Carbon::now()->subMonths(2)->timestamp;
        $current = Carbon::now()->timestamp;

        $recentlyReviewedUnformatted = Cache::remember('recently-reviewed ', 7, function () use($current,$before) {
           return  Http::withHeaders(config('services.igdb'))->withOptions([
                'body' => "fields name,cover.url, first_release_date, popularity, platforms.abbreviation, rating, rating_count, summary,slug;
                    where platforms = (48,49,130,6)
                    &(first_release_date >= {$before}
                    & first_release_date < {$current}
                    & rating_count > 5);
                    sort popularity desc;
                    limit 3;"
            ])->get('https://api-v3.igdb.com/games/')->json();
        });

        $this->recentlyReviewed = $this->formatForView($recentlyReviewedUnformatted);

        collect($this->recentlyReviewed)->filter(function($game){
            return $game['rating'];
        })->each(function($game){
            $this->emit('recentGameWithRatingAdded', [
                'slug' => 'review_'.$game['slug'],
                'rating' => $game['rating'] / 100,
            ]);
        });
    }


    private function formatForView($games){
        return collect($games)->map(function($game){
            return collect($game)->merge([
                'coverImgUrl' => Str::replaceFirst('thumb', 'cover_big', $game['cover']['url']),
                'rating' =>  isset($game['rating']) ? round($game['rating']) : null,
                'platforms' => collect($game['platforms'])->pluck('abbreviation')->filter()->implode(', '),
            ]);
        })->toArray();
    }


    public function render()
    {
        return view('livewire.recently-reviewed');
    }

}
