<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\SendContactMessageRequest;
use App\Mail\ContactFormSubmitted;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function __invoke(SendContactMessageRequest $request): RedirectResponse
    {
        Mail::to(config('site.email'))->send(
            new ContactFormSubmitted(...$request->validated()),
        );

        return redirect()
            ->to(route('home').'#contato')
            ->with('contact_status', 'Recebemos seu briefing. Em breve entraremos em contato.');
    }
}
