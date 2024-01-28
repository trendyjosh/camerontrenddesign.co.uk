<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;

class EmailController extends Controller
{
    /**
     * Submit the contact form.
     */
    public function sendContactForm(Request $request): RedirectResponse
    {
        Mail::raw($request->input('body'), function ($message) use ($request) {
            $message
                ->to('contact@camerontrenddesign.co.uk')
                ->from($request->input('email'))
                ->subject($request->input('subject'));
        });
        return Redirect::route('contact');
    }
}
