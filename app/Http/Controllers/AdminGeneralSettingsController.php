<?php

namespace App\Http\Controllers;

use App\Http\Requests\GeneralSettingsRequest;
use App\Settings\GeneralSettings;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;

class AdminGeneralSettingsController extends Controller
{
    /**
     * Display the general settings.
     */
    public function show(GeneralSettings $settings): Response
    {
        return Inertia::render('Settings/Show', [
            'settings' => $settings
        ]);
    }

    /**
     * Update the settings.
     */
    public function update(
        GeneralSettingsRequest $request,
        GeneralSettings $settings
    ): RedirectResponse {
        $formFields = $request->validated();

        $settings->site_email = $formFields['site_email'];
        $settings->site_phone = $formFields['site_phone'];

        $settings->save();

        return redirect()->route('admin.settings.show');
    }
}
