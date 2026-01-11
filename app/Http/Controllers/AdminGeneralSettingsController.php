<?php

namespace App\Http\Controllers;

use App\Http\Requests\GeneralSettingsRequest;
use App\Http\Requests\SocialSettingsRequest;
use App\Settings\GeneralSettings;
use App\Settings\SocialSettings;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;

class AdminGeneralSettingsController extends Controller
{
    /**
     * Display the general settings.
     */
    public function show(GeneralSettings $settings, SocialSettings $socialSettings): Response
    {
        return Inertia::render('Settings/Show', [
            'settings' => $settings,
            'socialSettings' => $socialSettings,
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

    /**
     * Update the social links.
     */
    public function updateSocial(
        SocialSettingsRequest $request,
        SocialSettings $settings,
    ): RedirectResponse {
        $formFields = $request->validated();

        $settings->site_facebook = $formFields['site_facebook'];
        $settings->site_pinterest = $formFields['site_pinterest'];
        $settings->site_linkedin = $formFields['site_linkedin'];
        $settings->site_instagram = $formFields['site_instagram'];

        $settings->save();

        return redirect()->route('admin.settings.show');
    }
}
