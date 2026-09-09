<?php

namespace Tests\Browser\Public;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\Browser\Pages\Public\ContactPage;
use Tests\DuskTestCase;

class ContactTest extends DuskTestCase
{
    use DatabaseMigrations;

    public function test_contact_page_can_be_rendered(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(new ContactPage)
                    ->assertSee('Mau Bikin Website')
                    ->assertVisible('input[name="name"]')
                    ->assertVisible('input[name="email"]')
                    ->assertVisible('textarea[name="message"]');
        });
    }

    public function test_user_can_submit_inquiry(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(new ContactPage)
                    ->type('name', 'QA Tester')
                    ->type('email', 'qa-tester@smstudio.test')
                    ->type('whatsapp', '08123456789')
                    ->type('message', 'Halo SM STUDIO, ini pesan test otomatis via Selenium Dusk. Mau bikin website UMKM.')
                    ->press('Kirim — Konsultasi Gratis')
                    ->waitForText('Pesan Anda telah terkirim', 5)
                    ->assertSee('Pesan Anda telah terkirim');

            $this->assertDatabaseHas('inquiries', [
                'email' => 'qa-tester@smstudio.test',
                'name' => 'QA Tester',
            ]);
        });
    }

    public function test_contact_validation_requires_required_fields(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(new ContactPage)
                    // Submit kosong biarkan HTML5 validation muncul, tapi cek tetap di /contact
                    ->press('Kirim — Konsultasi Gratis')
                    // Browser tidak akan submit karena required, tetap di /contact
                    ->assertPathIs('/contact');
        });
    }
}
