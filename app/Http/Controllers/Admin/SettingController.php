<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $settings = SiteSetting::all()->groupBy('group');
        return view('admin.pages.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $data = $request->input('settings', []);

        foreach ($data as $key => $value) {
            SiteSetting::set($key, $value, $request->input('group', 'general'));
        }

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $key => $file) {
                if ($file->isValid()) {
                    $path = $file->store('settings', 'public');
                    // form keys already look like "img_logo"; don't turn them into "img_img_logo"
                    $settingKey = str_starts_with($key, 'img_') ? $key : 'img_' . $key;
                    SiteSetting::set($settingKey, $path, 'images');
                }
            }
        }

        return redirect()->back()->with('success', 'Settings updated successfully.');
    }
}
