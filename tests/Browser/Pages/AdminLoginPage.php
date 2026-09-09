<?php

namespace Tests\Browser\Pages;

use Laravel\Dusk\Browser;

class AdminLoginPage extends Page
{
    public function url(): string
    {
        return '/admin/login';
    }

    public function assert(Browser $browser): void
    {
        $browser->assertPathIs('/admin/login')
                ->assertSee('Masuk ke dashboard')
                ->assertVisible('@email')
                ->assertVisible('@password')
                ->assertVisible('@login-button');
    }

    public function elements(): array
    {
        return [
            '@email' => '#email',
            '@password' => '#password',
            '@login-button' => 'button[type="submit"]',
            '@error' => '.bg-red-50',
        ];
    }

    public function login(Browser $browser, string $email, string $password): void
    {
        $browser->type('@email', $email)
                ->type('@password', $password)
                ->press('@login-button');
    }
}
