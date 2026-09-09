<?php

namespace Tests\Browser\Pages;

use Laravel\Dusk\Browser;

class AdminDashboardPage extends Page
{
    public function url(): string
    {
        return '/admin';
    }

    public function assert(Browser $browser): void
    {
        $browser->assertPathIs('/admin')
                ->assertSee('Dashboard')
                ->assertSee('Inquiries Terbaru');
    }

    public function elements(): array
    {
        return [
            '@services-card' => 'div:contains("Services")',
            '@portfolio-card' => 'div:contains("Portfolio")',
        ];
    }
}
