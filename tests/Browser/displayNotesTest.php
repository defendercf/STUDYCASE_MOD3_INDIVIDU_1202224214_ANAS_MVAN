<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class displayNotesTest extends DuskTestCase
{
  /**
   * A basic browser test example.
   */


  public function testDisplayNotes(): void
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
        ->assertSee('Test Notes') // Check if the text Test Notes is in the page
        ->clicklink('Test Notes') // Click the hyperlink text Test Notes
        ->assertPathIs(path: '/note/5'); // Check if we are in the opened note
    });
  }

}


