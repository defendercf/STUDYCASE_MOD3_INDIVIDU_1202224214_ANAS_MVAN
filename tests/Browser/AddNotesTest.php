<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class AddNotesTest extends DuskTestCase
{
    /**
     * A basic browser test example.
     */


    public function testAddNotes(): void
    {
        $this->browse(callback: function (Browser $browser): void {
            $browser->visit(url: '/')
                ->clickLink('Log in')
                ->assertPathIs(path: '/login')
                ->type(field: 'email', value: 'admin@gmail.com')
                ->type(field: 'password', value: 'password')
                ->press(button: 'LOG IN')
                ->assertPathIs(path: '/dashboard')
                ->clickLink('Notes')
                ->assertPathIs(path: '/notes')
                ->clickLink('Create Note')
                ->type(field: 'title', value: 'Test Notes')
                ->type(field: 'description', value: 'this is test notes')
                ->press(button: 'CREATE')
                ->assertPathIs(path: '/notes');
        });
    }

}


