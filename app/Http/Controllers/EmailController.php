<?php

namespace App\Http\Controllers;

use App\Http\Requests\SendContactFormRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;

class EmailController extends Controller
{
    /**
     * Submit the contact form.
     */
    public function sendContactForm(SendContactFormRequest $request): RedirectResponse
    {
        // Get validated input
        $formData = $request->validated();

        // Send contact email
        Mail::raw($formData['body'], function ($message) use ($formData) {
            $message
                ->to('contact@camerontrenddesign.co.uk')
                ->from($formData['email'])
                ->subject($formData['subject']);
        });

        return Redirect::route('contact');
    }
}
