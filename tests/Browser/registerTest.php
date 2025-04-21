<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class registerTest extends DuskTestCase
{
  /**
   * A basic browser test example.
   */


  public function testRegister(): void
  {
    $this->browse(callback: function (Browser $browser): void {
      $browser->visit(url: '/')
        ->clickLink('Register') // Click the Register Text
        ->assertPathIs(path: '/register') // Check if we are in register page
        // Type in Name, Email, Password, and Password Confirmation
        ->type(field: 'name', value: 'admin')
        ->type(field: 'email', value: 'admin@gmail.com')
        ->type(field: 'password', value: 'password')
        ->type(field: 'password_confirmation', value: 'password')
        ->press(button: 'REGISTER') // Click the REGISTER button
        ->assertPathIs(path: '/dashboard'); // Check if we are currently in Dashboard
    });
  }

}


