<?php

namespace Tests\Browser\Pages\Public;

use Laravel\Dusk\Browser;
use Tests\Browser\Pages\Page;

class ContactPage extends Page
{
    public function url(): string
    {
        return '/contact';
    }

    public function assert(Browser $browser): void
    {
        $browser->assertPathIs('/contact')
                ->assertSee('Mau Bikin Website');
    }

    public function elements(): array
    {
        return [
            '@name' => 'input[name="name"]',
            '@email' => 'input[name="email"]',
            '@whatsapp' => 'input[name="whatsapp"]',
            '@message' => 'textarea[name="message"]',
            '@submit' => 'button[type="submit"]',
        ];
    }

    public function submitInquiry(Browser $browser, array $data): void
    {
        $browser->type('@name', $data['name'] ?? 'Test User')
                ->type('@email', $data['email'] ?? 'test@example.com')
                ->type('@message', $data['message'] ?? 'Pesan test inquiry dari Dusk')
                ->press('@submit');
    }
}
