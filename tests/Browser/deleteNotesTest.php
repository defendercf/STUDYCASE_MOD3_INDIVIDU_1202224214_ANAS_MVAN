<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class deleteNotesTest extends DuskTestCase
{
  /**
   * A basic browser test example.
   */


  public function testDeleteNotes(): void
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
        ->clickLink('Notes') // Click the Notes in navbar
        ->assertPathIs(path: '/notes') // Check if we are currently in notes page
        ->press('Delete') // Click the Delete Button in Navbar
        ->assertPathIs(path: '/notes');// Check if we are bacm in notes page
    });
  }

}


