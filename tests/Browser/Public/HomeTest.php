<?php

namespace Tests\Browser\Public;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\Browser\Pages\HomePage;
use Tests\DuskTestCase;

class HomeTest extends DuskTestCase
{
    use DatabaseMigrations;

    public function test_homepage_shows_hero_and_sections(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(new HomePage)
                    ->assertSee('Dibangun Siswa SMK')
                    ->assertSee('SMK BPPI BALEENDAH')
                    ->assertSee('Konsultasi Gratis')
                    ->assertVisible('#portfolio')
                    ->assertVisible('#services');
        });
    }

    public function test_navigation_to_contact_page(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(new HomePage)
                    ->clickLink('Konsultasi Gratis — Mulai Project')
                    ->assertPathIs('/contact')
                    ->assertSee('Mau Bikin Website');
        });
    }

    public function test_navigation_to_portfolio_page(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->clickLink('Lihat semua portfolio →')
                    ->assertPathIs('/portfolio')
                    ->assertSee('Portfolio');
        });
    }

    public function test_public_routes_accessible(): void
    {
        $routes = ['/', '/about', '/services', '/portfolio', '/clients', '/testimonials', '/faq', '/contact'];

        $this->browse(function (Browser $browser) use ($routes) {
            foreach ($routes as $path) {
                $browser->visit($path)
                        ->assertDontSee('404')
                        ->assertDontSee('abort');
            }
        });
    }
}
