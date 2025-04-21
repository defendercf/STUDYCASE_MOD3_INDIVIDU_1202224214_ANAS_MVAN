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
        ->clickLink('Register')
        ->assertPathIs(path: '/register')
        ->type(field: 'name', value: 'admin')
        ->type(field: 'email', value: 'admin@gmail.com')
        ->type(field: 'password', value: 'password')
        ->type(field: 'password_confirmation', value: 'password')
        ->press(button: 'REGISTER')
        ->assertPathIs(path: '/dashboard');
    });
  }

}


