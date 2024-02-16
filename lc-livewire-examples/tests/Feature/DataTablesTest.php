<?php

namespace Tests\Feature;

use App\Http\Livewire\DataTables;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;

class DataTablesTest extends TestCase
{
    use RefreshDatabase;

    public function test_main_page_contains_datatables_livewire_component()
    {
        $this->get('/')
            ->assertSeeLivewire('data-tables');
    }

    public function test_datatables_active_checkbox_works_correctly()
    {
        $userA = User::create([
            'name' => 'User',
            'email' => 'user@user.com',
            'password' => bcrypt('password'),
            'active' => true,
        ]);

        $userB = User::create([
            'name' => 'Another',
            'email' => 'another@another.com',
            'password' => bcrypt('password'),
            'active' => false,
        ]);

        Livewire::test(DataTables::class)
            ->assertSee($userA->name)
            ->assertDontSee($userB->name)
            ->set('active', false)
            ->assertSee($userB->name)
            ->assertDontSee($userA->name);
    }

    public function test_datatables_searches_name_correctly()
    {
        $userA = User::create([
            'name' => 'User',
            'email' => 'user@user.com',
            'password' => bcrypt('password'),
            'active' => true,
        ]);

        $userB = User::create([
            'name' => 'Another',
            'email' => 'another@another.com',
            'password' => bcrypt('password'),
            'active' => false,
        ]);

        Livewire::test(DataTables::class)
            ->set('search', 'user')
            ->assertSee($userA->name)
            ->assertDontSee($userB->name);
    }

    public function test_datatables_searches_email_correctly()
    {
        $userA = User::create([
            'name' => 'User',
            'email' => 'user@user.com',
            'password' => bcrypt('password'),
            'active' => true,
        ]);

        $userB = User::create([
            'name' => 'Another',
            'email' => 'another@another.com',
            'password' => bcrypt('password'),
            'active' => false,
        ]);

        Livewire::test(DataTables::class)
            ->set('search', 'user@user.com')
            ->assertSee($userA->name)
            ->assertDontSee($userB->name);
    }

    public function test_datatables_sorts_name_asc_correctly()
    {
        $userC = User::create([
            'name' => 'Cathy C',
            'email' => 'cathy@cathy.com',
            'password' => bcrypt('password'),
            'active' => true,
        ]);

        $userA = User::create([
            'name' => 'Andre A',
            'email' => 'andre@andre.com',
            'password' => bcrypt('password'),
            'active' => true,
        ]);

        $userB = User::create([
            'name' => 'Brian B',
            'email' => 'brian@brian.com',
            'password' => bcrypt('password'),
            'active' => true,
        ]);

        Livewire::test(DataTables::class)
            ->call('sortBy', 'name')
            ->assertSeeInOrder(['Andre A', 'Brian B', 'Cathy C']);
    }

    public function test_datatables_sorts_name_desc_correctly()
    {
        $userC = User::create([
            'name' => 'Cathy C',
            'email' => 'cathy@cathy.com',
            'password' => bcrypt('password'),
            'active' => true,
        ]);

        $userA = User::create([
            'name' => 'Andre A',
            'email' => 'andre@andre.com',
            'password' => bcrypt('password'),
            'active' => true,
        ]);

        $userB = User::create([
            'name' => 'Brian B',
            'email' => 'brian@brian.com',
            'password' => bcrypt('password'),
            'active' => true,
        ]);

        Livewire::test(DataTables::class)
            ->call('sortBy', 'name')
            ->call('sortBy', 'name')
            ->assertSeeInOrder(['Cathy C', 'Brian B', 'Andre A']);
    }

    public function test_datatables_sorts_email_asc_correctly()
    {
        $userC = User::create([
            'name' => 'Cathy C',
            'email' => 'cathy@cathy.com',
            'password' => bcrypt('password'),
            'active' => true,
        ]);

        $userA = User::create([
            'name' => 'Andre A',
            'email' => 'andre@andre.com',
            'password' => bcrypt('password'),
            'active' => true,
        ]);

        $userB = User::create([
            'name' => 'Brian B',
            'email' => 'brian@brian.com',
            'password' => bcrypt('password'),
            'active' => true,
        ]);

        Livewire::test(DataTables::class)
            ->call('sortBy', 'email')
            ->assertSeeInOrder(['andre@andre.com', 'brian@brian.com', 'cathy@cathy.com']);
    }

    public function test_datatables_sorts_email_desc_correctly()
    {
        $userC = User::create([
            'name' => 'Cathy C',
            'email' => 'cathy@cathy.com',
            'password' => bcrypt('password'),
            'active' => true,
        ]);

        $userA = User::create([
            'name' => 'Andre A',
            'email' => 'andre@andre.com',
            'password' => bcrypt('password'),
            'active' => true,
        ]);

        $userB = User::create([
            'name' => 'Brian B',
            'email' => 'brian@brian.com',
            'password' => bcrypt('password'),
            'active' => true,
        ]);

        Livewire::test(DataTables::class)
            ->call('sortBy', 'email')
            ->call('sortBy', 'email')
            ->assertSeeInOrder(['cathy@cathy.com', 'brian@brian.com', 'andre@andre.com']);
    }
}
