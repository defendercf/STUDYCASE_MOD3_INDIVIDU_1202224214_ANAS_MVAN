<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class logoutTest extends DuskTestCase
{
  /**
   * A basic browser test example.
   */


  public function testLogout(): void
  {
    $this->browse(callback: function (Browser $browser): void {
      $browser->visit(url: '/')
        ->clickLink('Log in') // Click the Log In text
        ->assertPathIs(path: '/login') // Check if Path is Correct
        // type in email and password
        ->type(field: 'email', value: 'admin@gmail.com')
        ->type(field: 'password', value: 'password')
        ->press(button: 'LOG IN') // click log in button
        ->assertPathIs(path: '/dashboard') // Check if Path is Correct
        ->click('#click-dropdown') // Click the dropdown menu at the top right
        ->clickLink('Log Out') // Click the hyperlink Log Out
        ->assertPathIs(path: '/'); // Check if we are now in Welcome Page
    });
  }

}


