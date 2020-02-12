<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ExampleTest extends DuskTestCase
{

    /**
     * testing login process.
     *
     * @return void
     */
    public function testLoginProcess()
    {

        $this->browse(function ($browser) {
            $browser->visit('/login')
                    ->type('email', 'ldaazzi@gmail.com')
                    ->type('password', 'ligiano01')
                    ->press('Login')
                    ->assertPathIs('/home');
        });
    }

    /**
     * testing if home page is showing the games.
     *
     * @return void
     */
    public function testIfHomePageIsShowingTheGames()
    {

        $this->browse(function ($browser) {
            $browser->visit('/home')
                    ->assertSee('Show Details');
        });

    }    

    /**
     * testing if game page is showing the cards.
     *
     * @return void
     */
    public function testIfGamePageIsShowingTheCards()
    {

        $this->browse(function ($browser) {
            $browser->visit('/games/1')
                    ->assertSee('Line Result');
        });

    }

}
