<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Support\Facades\Http;

class ViewGameTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function the_game_page_shows_correct_game_info()
    {
        Http::fake([
            // Stub a string response for Google endpoints...
            'https://api-v3.igdb.com/games/' => Http::response(['foo' => 'bar'], 200),
        ]);

       $response = $this->get(route('games.show'), 'cyberpunk-2077');
       $response->assertSuccessful();
    }
}
