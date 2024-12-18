<?php

namespace App\Http\Controllers\Api\V1\admin;

use App\Models\Setting;
use App\Traits\ResponseJson;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\V1\SettingResource;
use App\Http\Requests\admin\UpdateSiteSettings;

class SettingController extends Controller
{
    use ResponseJson;

    public function update(UpdateSiteSettings $request, $id)
    {
        $setting = Setting::findOrFail($id);
        Gate::authorize('admin', $setting);
        $validated = $request->validated();

        try {
            if ($request->hasFile('site_logo')) {
                $validated['site_logo'] = $request->file('site_logo')->store('images/settings', 'public');

                if ($setting->site_logo) {
                    Storage::disk('public')->delete($setting->site_logo);
                }
            }

            $setting->update($validated);

            return $this->sendResponse('Site settings updated successfully -_-', true, new SettingResource($setting), 200);
        } catch (\Exception $e) {
            return $this->sendResponse('Something went wrong!', false, null, 500);
        }
    }
}
