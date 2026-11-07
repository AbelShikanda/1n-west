<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contacts;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
    public function index()
    {
        $contacts = Contacts::latest()->paginate(15);

        return view('admin.contacts.index', compact('contacts'));
    }

    public function show(Contacts $contact)
    {
        return view('admin.contacts.show', compact('contact'));
    }

    public function destroy(Contacts $contact)
    {
        $contact->delete();

        return redirect()->route('admin.contacts.index')->with('success', 'Contact message deleted.');
    }
}
