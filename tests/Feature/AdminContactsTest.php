<?php

namespace Tests\Feature;

use App\Models\Admin;
use App\Models\Contacts;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminContactsTest extends TestCase
{
    use RefreshDatabase;

    protected function admin()
    {
        return Admin::create([
            'name' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@test.com',
            'password' => bcrypt('password'),
            'is_admin' => 1,
        ]);
    }

    public function test_contacts_index_requires_auth()
    {
        $response = $this->get('/admin/contacts');
        $response->assertRedirect(route('getLogin'));
    }

    public function test_admin_can_view_contacts()
    {
        $admin = $this->admin();
        Contacts::factory()->create(['subject' => 'Hello']);

        $response = $this->actingAs($admin, 'admin')->get('/admin/contacts');

        $response->assertStatus(200);
        $response->assertSee('Hello');
    }

    public function test_admin_can_view_and_delete_contact()
    {
        $admin = $this->admin();
        $contact = Contacts::factory()->create(['subject' => 'Delete Me']);

        $this->actingAs($admin, 'admin')->get('/admin/contacts/' . $contact->id)
            ->assertStatus(200)
            ->assertSee('Delete Me');

        $this->actingAs($admin, 'admin')->delete('/admin/contacts/' . $contact->id)
            ->assertRedirect(route('admin.contacts.index'));

        $this->assertDatabaseMissing('contacts', ['id' => $contact->id]);
    }
}
