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
                ->clickLink('Log in') // Click the Log In text
                ->assertPathIs(path: '/login') // Check if we are in login page
                // type in email and password
                ->type(field: 'email', value: 'admin@gmail.com')
                ->type(field: 'password', value: 'password')
                ->press(button: 'LOG IN') // click log in button
                ->assertPathIs(path: '/dashboard') // Check if currently on dashboard
                ->clickLink('Notes') // Click the hyperlink Notes
                ->assertPathIs(path: '/notes') // Check if we are in notes page
                ->clickLink('Create Note') // Click the hyperlink Notes
                // type in the title and description of the notes
                ->type(field: 'title', value: 'Test Notes')
                ->type(field: 'description', value: 'this is test notes')
                ->press(button: 'CREATE') // Click the CREATE button
                ->assertPathIs(path: '/notes'); // Check if we are back in notes page
        });
    }

}


