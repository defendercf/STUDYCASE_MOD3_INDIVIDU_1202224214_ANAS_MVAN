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
        ->clickLink('Log in')
        ->assertPathIs(path: '/login')
        ->type(field: 'email', value: 'admin@gmail.com')
        ->type(field: 'password', value: 'password')
        ->press(button: 'LOG IN')
        ->assertPathIs(path: '/dashboard')
        ->clickLink('Notes')
        ->assertPathIs(path: '/notes')
        ->clickLink('Edit')
        ->type(field: 'title', value: 'Test Notes Edit')
        ->type(field: 'description', value: 'this is edited test notes')
        ->press(button: 'UPDATE')
        ->assertPathIs(path: '/notes');
    });
  }

}


