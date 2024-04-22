<?php

namespace App\Http\Controllers;

use App\Http\Requests\SendContactFormRequest;
use App\Mail\EnquiryMail;
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
        Mail::to('contact@camerontrenddesign.co.uk')->send(new EnquiryMail(
            $formData['email'],
            $formData['subject'],
            $formData['body'],
            $formData['heard']
        ));

        return Redirect::route('contact');
    }
}
