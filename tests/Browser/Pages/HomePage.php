<?php

namespace Tests\Browser\Pages;

use Laravel\Dusk\Browser;

class HomePage extends Page
{
    /**
     * Get the URL for the page.
     */
    public function url(): string
    {
        return '/';
    }

    /**
     * Assert that the browser is on the page.
     */
    public function assert(Browser $browser): void
    {
        $browser->assertPathIs('/')
                ->assertSee('Dibangun Siswa SMK')
                ->assertSee('SM STUDIO');
    }

    /**
     * Get the element shortcuts for the page.
     *
     * @return array<string, string>
     */
    public function elements(): array
    {
        return [
            '@hero-title' => 'h1',
            '@cta-contact' => 'a[href*="contact"]',
            '@portfolio-section' => '#portfolio',
            '@services-section' => '#services',
        ];
    }
}
