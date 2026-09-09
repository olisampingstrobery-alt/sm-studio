<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ExampleTest extends DuskTestCase
{
    use DatabaseMigrations;

    /**
     * Basic smoke test: homepage loads with SM Studio branding (Selenium QA via Dusk).
     */
    public function test_homepage_loads(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(new \Tests\Browser\Pages\HomePage)
                    ->assertSee('Dibangun Siswa SMK')
                    ->assertSee('SM STUDIO');
        });
    }

    public function test_admin_login_page_loads(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(new \Tests\Browser\Pages\AdminLoginPage)
                    ->assertSee('Masuk ke dashboard');
        });
    }
}
