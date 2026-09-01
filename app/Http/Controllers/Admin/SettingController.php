<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Setting;

class SettingController extends Controller
{
    public function update(Request $request)
    {
        $request->validate([
            'notification_email' => 'nullable|string',
        ]);

        Setting::updateOrCreate(
            ['key' => 'notification_email'],
            ['value' => $request->notification_email]
        );

        return redirect()->back()->with('success', 'Email berhasil disimpan.');
    }
}
