<?php

namespace Tests\Feature;

use App\Models\Contacts;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ContactFormTest extends TestCase
{
    use RefreshDatabase;

    public function test_contact_page_loads()
    {
        $response = $this->get('/contact');

        $response->assertStatus(200);
        $response->assertViewIs('pages.contact');
    }

    public function test_contact_form_submits_successfully()
    {
        $response = $this->post('/contact', [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'subject' => 'Inquiry',
            'message' => 'I am interested in a property.',
        ]);

        $response->assertStatus(302);
        $response->assertRedirect(route('contact'));
        $response->assertSessionHas('success');

        $this->assertDatabaseHas('contacts', [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'subject' => 'Inquiry',
        ]);
    }

    public function test_contact_form_validation_errors()
    {
        $this->get('/contact');

        $response = $this->post('/contact', []);

        $response->assertStatus(302);
        $response->assertRedirect(route('contact'));
        $response->assertSessionHasErrors(['name', 'email', 'subject', 'message']);
    }
}
