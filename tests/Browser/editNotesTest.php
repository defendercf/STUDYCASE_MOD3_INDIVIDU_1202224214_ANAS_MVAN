<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class editNotesTest extends DuskTestCase
{
  /**
   * A basic browser test example.
   */


  public function testEditNotes(): void
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
        ->clickLink('Notes') // Click the notes on navbar
        ->assertPathIs(path: '/notes') // Check if we are currently in notes page
        ->clickLink('Edit') // Click the Edit button
        // type in the edited title and description
        ->type(field: 'title', value: 'Test Notes Edit')
        ->type(field: 'description', value: 'this is edited test notes')
        ->press(button: 'UPDATE') // Click the button UPDATE
        ->assertPathIs(path: '/notes'); // Check if we are back in notes Page
    });
  }

}


