<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PublicContactController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        abort_if($request->filled('website'), 422);

        $data = $request->validate([
            'full_name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:50'],
            'email' => ['nullable', 'email', 'max:255'],
            'purpose' => ['nullable', 'string', 'max:100'],
            'message' => ['required', 'string', 'max:5000'],
            'website' => ['nullable', 'max:0'],
        ]);
        unset($data['website']);
        Contact::query()->create($data);

        return redirect('/#contact')->with('contact_success', 'Cảm ơn bạn đã liên hệ. Paneco đã nhận được thông tin.');
    }
}
