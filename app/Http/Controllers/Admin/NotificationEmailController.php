<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NotificationEmail;

class NotificationEmailController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'notification_email' => 'nullable|string',
        ]);

        if ($request->filled('notification_email')) {
            $inputEmails = array_filter(array_map('trim', preg_split('/[\s,]+/', $request->notification_email)));

            foreach ($inputEmails as $email) {
                if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    // Avoid duplicate emails
                    $exists = NotificationEmail::where('email', $email)->exists();

                    if (!$exists) {
                        NotificationEmail::create([
                            'email' => $email,
                        ]);
                    }
                }
            }
        }

        return redirect()->back()->with('success', 'Email notifikasi berhasil disimpan.');
    }

    public function destroy($id)
    {
        NotificationEmail::destroy($id);
        return redirect()->back()->with('success', 'Email berhasil dihapus.');
    }
}
