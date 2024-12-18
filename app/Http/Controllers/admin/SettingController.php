<?php

namespace App\Http\Controllers\admin;

use App\Models\Setting;
use Illuminate\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\admin\UpdateSiteSettings;
use Illuminate\Support\Facades\Gate;

class SettingController extends Controller
{
    public function edit(): View
    {
        Gate::authorize('admin', Setting::class);
        return view('admin.settings.edit');
    }

    public function update(UpdateSiteSettings $request, $id): RedirectResponse
    {
        $setting = Setting::findOrFail($id);
        Gate::authorize('admin', $setting);
        $validated = $request->validated();

        if ($request->hasFile('site_logo')) {
            $validated['site_logo'] = $request->file('site_logo')->store('images/settings', 'public');

            if ($setting->site_logo) {
                Storage::disk('public')->delete($setting->site_logo);
            }
        }

        $setting->update($validated);

        return to_route('dashboard')->with('success', 'Settings updated successfully');
    }
}
