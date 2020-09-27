<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class MostAnticipated extends Component
{
    public $mostAnticipated = [];

    public function loadMostAnticipated() {

        $current = Carbon::now()->timestamp;
        $afterFourMonths = Carbon::now()->addMonths(4)->timestamp;

        $mostAnticipatedUnformatted = Cache::remember('most-anticipated', 7, function () use($current,$afterFourMonths) {
            return
            Http::withHeaders(config('services.igdb'))->withOptions([
                'body' => "fields name,cover.url, first_release_date, popularity, platforms.abbreviation, rating, rating_count,slug;
                    where platforms = (48,49,130,6)
                    &(first_release_date >= {$current}
                    & first_release_date < {$afterFourMonths});
                    sort popularity desc;
                    limit 4;"
            ])->get('https://api-v3.igdb.com/games/')->json();
        });

        $this->mostAnticipated = $this->formatForView($mostAnticipatedUnformatted);
    }

    private function formatForView($games){
        return collect($games)->map(function($game){
            return collect($game)->merge([
                'coverImgUrl' => Str::replaceFirst('thumb', 'cover_small', $game['cover']['url']),
                'platforms' => collect($game['platforms'])->pluck('abbreviation')->filter()->implode(', '),
                'release_date' => Carbon::parse($game['first_release_date' ])->format('M d, Y')
            ]);
        })->toArray();
    }


    public function render()
    {
        return view('livewire.most-anticipated');
    }
}
