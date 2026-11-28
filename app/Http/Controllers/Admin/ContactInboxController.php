<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ContactInboxController extends Controller
{
    public function index(): View
    {
        $contacts = Contact::query()->latest()->paginate(25);

        return view('admin.contacts.index', compact('contacts'));
    }

    public function markRead(Contact $contact): RedirectResponse
    {
        $contact->update(['is_read' => true]);

        return redirect()->route('admin.contacts.index')->with('success', 'Đã đánh dấu đã xem.');
    }
}
