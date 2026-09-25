<?php

declare(strict_types=1);

use App\Mail\ContactFormSubmitted;
use Illuminate\Support\Facades\Mail;

it('sends the contact form to the site inbox', function () {
    Mail::fake();

    $response = $this->post(route('contact.send'), [
        'name' => 'Ana Silva',
        'email' => 'ana@example.com',
        'project' => 'Preciso de uma plataforma para organizar pedidos.',
    ]);

    $response
        ->assertRedirect(route('home').'#contato')
        ->assertSessionHas('contact_status');

    Mail::assertSent(ContactFormSubmitted::class, function (ContactFormSubmitted $mail): bool {
        return $mail->hasTo(config('site.email'))
            && $mail->hasReplyTo('ana@example.com', 'Ana Silva')
            && $mail->project === 'Preciso de uma plataforma para organizar pedidos.';
    });
});

it('validates the contact form fields', function () {
    Mail::fake();

    $this->from(route('home').'#contato')
        ->post(route('contact.send'), [
            'name' => '',
            'email' => 'not-an-email',
            'project' => '',
        ])
        ->assertRedirect(route('home').'#contato')
        ->assertSessionHasErrors(['name', 'email', 'project']);

    Mail::assertNothingSent();
});

it('renders the contact submit loading state hooks', function () {
    $this->get(route('home'))
        ->assertOk()
        ->assertSee('data-contact-form', false)
        ->assertSee('data-contact-submit', false)
        ->assertSee('data-contact-submit-label', false)
        ->assertSee('data-contact-submit-spinner', false)
        ->assertSee('disabled:cursor-wait', false);
});

it('renders the contact email in the site visual style', function () {
    $email = new ContactFormSubmitted(
        name: 'Ana Silva',
        email: 'ana@example.com',
        project: "Uma plataforma para organizar pedidos.\nCom relatórios semanais.",
    );

    expect($email->render())
        ->toContain('coffee.dev')
        ->toContain('Novo briefing chegou.')
        ->toContain('#0b0807')
        ->toContain('#fef3c7')
        ->toContain('Uma plataforma para organizar pedidos.<br')
        ->toContain('Responder briefing');
});
