<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    /**
     * Tampilkan form pengaturan.
     */
    public function index()
    {
        // Ambil pengaturan (asumsikan hanya ada satu baris)
        $setting = Setting::first();
        $name  = Auth::user()->name;
        $email = Auth::user()->email;
        
        return view('admin.menu.setting', compact('setting', 'name', 'email'));
    }

    /**
     * Simpan perubahan pengaturan.
     */
    public function update(Request $request)
    {
        $request->validate([
            'web_name' => 'required|string|max:255',
            'logo'     => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $setting = Setting::first();
        if (!$setting) {
            $setting = new Setting();
        }

        $setting->web_name = $request->web_name;

        // Jika ada file logo yang diupload, simpan dan update field logo.
        if ($request->hasFile('logo')) {
            // Hapus file logo lama jika ada.
            if ($setting->logo) {
                Storage::disk('public')->delete($setting->logo);
            }
            $path = $request->file('logo')->store('settings', 'public');
            $setting->logo = $path;
        }

        $setting->save();

        return redirect()->back()->with('success', 'Pengaturan berhasil diperbarui!');
    }
}
