<!doctype html>
<html lang="pt-BR">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="x-apple-disable-message-reformatting">
        <title>Novo briefing — coffee.dev</title>
    </head>
    <body style="margin: 0; padding: 0; background-color: #0b0807; color: #e7e5e4; font-family: Arial, Helvetica, sans-serif;">
        <div style="display: none; max-height: 0; overflow: hidden; opacity: 0; mso-hide: all;">
            Novo briefing de {{ $name }}.
        </div>

        <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" bgcolor="#0b0807" style="width: 100%; background-color: #0b0807;">
            <tr>
                <td align="center" style="padding: 32px 16px;">
                    <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" style="width: 100%; max-width: 640px;">
                        <tr>
                            <td style="padding: 0 0 20px; border-bottom: 1px solid #29201c;">
                                <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0">
                                    <tr>
                                        <td style="font-family: 'Courier New', Courier, monospace; font-size: 17px; font-weight: 700; letter-spacing: -0.5px; color: #ffffff;">
                                            <span style="display: inline-block; width: 8px; height: 8px; margin-right: 8px; background-color: #fde68a; vertical-align: 1px;"></span>coffee<span style="color: #fcd34d">.</span>dev
                                        </td>
                                        <td align="right" style="font-family: 'Courier New', Courier, monospace; font-size: 10px; letter-spacing: 1.8px; color: #78716c; text-transform: uppercase;">
                                            novo_projeto.form
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>

                        <tr>
                            <td style="padding: 40px 0 24px;">
                                <p style="margin: 0 0 14px; font-family: 'Courier New', Courier, monospace; font-size: 11px; font-weight: 700; letter-spacing: 1.8px; color: #fcd34d; text-transform: uppercase;">
                                    04 / contato
                                </p>
                                <h1 style="margin: 0; color: #f5f5f4; font-size: 34px; font-weight: 800; letter-spacing: -1.4px; line-height: 1.05;">
                                    Novo briefing chegou.
                                </h1>
                                <p style="margin: 16px 0 0; color: #a8a29e; font-size: 16px; line-height: 1.65;">
                                    {{ $name }} quer conversar sobre um novo projeto.
                                </p>
                            </td>
                        </tr>

                        <tr>
                            <td bgcolor="#0f0c0b" style="background-color: #0f0c0b; border: 1px solid #29201c;">
                                <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0">
                                    <tr>
                                        <td style="padding: 22px 24px; border-bottom: 1px solid #29201c;">
                                            <p style="margin: 0 0 7px; font-family: 'Courier New', Courier, monospace; font-size: 10px; font-weight: 700; letter-spacing: 1.5px; color: #78716c; text-transform: uppercase;">
                                                contato
                                            </p>
                                            <p style="margin: 0; color: #f5f5f4; font-size: 17px; font-weight: 700; line-height: 1.5;">
                                                {{ $name }}
                                            </p>
                                            <a href="mailto:{{ $email }}" style="color: #fde68a; font-family: 'Courier New', Courier, monospace; font-size: 13px; line-height: 1.8; text-decoration: none;">
                                                {{ $email }}
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 24px;">
                                            <p style="margin: 0 0 12px; font-family: 'Courier New', Courier, monospace; font-size: 10px; font-weight: 700; letter-spacing: 1.5px; color: #78716c; text-transform: uppercase;">
                                                sobre o projeto
                                            </p>
                                            <p style="margin: 0; color: #d6d3d1; font-size: 15px; line-height: 1.75;">
                                                {!! nl2br(e($project)) !!}
                                            </p>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>

                        <tr>
                            <td style="padding: 24px 0 40px;">
                                <a href="mailto:{{ $email }}" style="display: inline-block; background-color: #fef3c7; color: #0b0807; padding: 14px 18px; font-family: 'Courier New', Courier, monospace; font-size: 12px; font-weight: 700; letter-spacing: 1.2px; text-decoration: none; text-transform: uppercase;">
                                    Responder briefing →
                                </a>
                            </td>
                        </tr>

                        <tr>
                            <td style="padding-top: 20px; border-top: 1px solid #29201c; color: #78716c; font-family: 'Courier New', Courier, monospace; font-size: 10px; letter-spacing: 0.4px; line-height: 1.7;">
                                coffee.dev · software feito com código limpo e café forte.<br>
                                Esta mensagem foi enviada pelo formulário de contato do site.
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </body>
</html>
