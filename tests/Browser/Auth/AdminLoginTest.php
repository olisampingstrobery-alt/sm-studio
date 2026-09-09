<?php

namespace Tests\Browser\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\Browser\Pages\AdminLoginPage;
use Tests\DuskTestCase;

class AdminLoginTest extends DuskTestCase
{
    use DatabaseMigrations;

    public function test_admin_login_page_can_be_rendered(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(new AdminLoginPage)
                    ->assertSee('Masuk ke dashboard')
                    ->assertVisible('#email')
                    ->assertVisible('#password');
        });
    }

    public function test_admin_can_login_with_valid_credentials(): void
    {
        $admin = User::factory()->create([
            'name' => 'Admin SM Studio',
            'email' => 'admin@smstudio.test',
            'password' => 'password',
            'role' => 'admin',
        ]);

        $this->browse(function (Browser $browser) use ($admin) {
            $browser->visit(new AdminLoginPage)
                    ->type('#email', $admin->email)
                    ->type('#password', 'password')
                    ->press('Masuk')
                    ->waitForLocation('/admin', 5)
                    ->assertPathIs('/admin')
                    ->assertSee('Dashboard')
                    ->assertSee('Inquiries Terbaru');
        });
    }

    public function test_admin_cannot_login_with_invalid_password(): void
    {
        $admin = User::factory()->create([
            'email' => 'admin2@smstudio.test',
            'password' => 'password',
            'role' => 'admin',
        ]);

        $this->browse(function (Browser $browser) {
            $browser->visit(new AdminLoginPage)
                    ->type('#email', 'admin2@smstudio.test')
                    ->type('#password', 'wrong-password')
                    ->press('Masuk')
                    ->waitForText('Email atau password tidak sesuai', 5)
                    ->assertSee('Email atau password tidak sesuai')
                    ->assertPathIs('/admin/login');
        });
    }

    public function test_public_login_redirects_to_admin_login(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                    ->assertPathIs('/login')
                    ->assertSee('Admin Login');
        });
    }

    public function test_guest_cannot_access_admin_dashboard(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin')
                    ->assertPathIs('/admin/login')
                    ->assertSee('Masuk ke dashboard');
        });
    }
}
