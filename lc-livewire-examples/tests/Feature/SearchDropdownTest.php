<?php

namespace Tests\Feature;

use App\Http\Livewire\SearchDropdown;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class SearchDropdownTest extends TestCase
{
    public function test_main_page_contains_search_dropdown_livewire_component()
    {
        $this->get('/')
            ->assertSeeLivewire('search-dropdown');
    }

    public function test_search_dropdown_searches_correctly_if_songs_exists()
    {
        Livewire::test(SearchDropdown::class)
            ->assertDontSee('Imagine Dragons')
            ->set('search', 'believer')
            ->assertSee('Imagine Dragons');
    }

    public function test_search_dropdown_shows_message_if_no_songs_exists()
    {
        Livewire::test(SearchDropdown::class)
            ->set('search', 'klasjdhfuihaejhfdlk')
            ->assertSee('No results found for ');
    }
}
