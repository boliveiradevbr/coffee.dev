<?php

declare(strict_types=1);

return [

    /*
    |--------------------------------------------------------------------------
    | Contact channels
    |--------------------------------------------------------------------------
    |
    | Every outbound link on the marketing site resolves from here so the
    | WhatsApp CTA — repeated in the header, the hero and the article callout —
    | has a single source of truth.
    |
    | NOTE: `email` and `email_label` differ on purpose; the prototype's markup
    | links to contato@ while displaying hello@. Reconcile once the real inbox
    | is confirmed.
    |
    */

    'whatsapp' => 'https://wa.me/5518936191084?text=Ol%C3%A1%21%20Gostaria%20de%20falar%20com%20um%20especialista%20da%20coffee.dev.',

    'email' => 'contato@coffee.dev.br',
    'email_label' => 'hello@coffee.dev.br',

    'social' => [
        'instagram' => [
            'url' => 'https://instagram.com/coffee.dev',
            'label' => '@coffee.dev',
        ],
        'linkedin' => [
            'url' => 'https://linkedin.com/company/coffee-dev',
            'label' => '@coffee-dev',
        ],
        'github' => [
            'url' => 'https://github.com/coffee-dev',
            'label' => '@coffee-dev',
        ],
    ],

];
