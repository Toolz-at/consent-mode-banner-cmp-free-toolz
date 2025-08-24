# Site ID Footer (Toolz Banner CMP)

**WordPress CMP, Consent, Banner, Cookie, Privacy, Compliance, Toolz, Footer Script, Data Attribute**

---

**Version:** 1.0.0
**License:** GPLv2 or later
**Author:** joandysson

---

## Overview

Site ID Footer (Toolz Banner CMP) is a lightweight WordPress plugin for cookie compliance and privacy. It injects the [Toolz CMP banner script](https://cdn.toolz.at/banner-cmp.js) in the footer using a unique site ID, only when enabled by the admin. No public links, no branding, no tracking—just safe, opt-in integration for consent mode, LGPD/GDPR, and privacy compliance.

## Recursos (PT-BR)

- Injeta o script CMP da Toolz no rodapé do WordPress
- Só ativa se o admin marcar e informar o ID
- Sem links públicos, sem branding
- Ideal para consentimento, LGPD/GDPR, privacidade e compliance

## Features

- **Single Site ID**
- **Safe by default (opt-in)**
- **No public links**
- **Script attribute `data-toolz-banner-id`**

## How it works

1. Instale e ative o plugin.
2. Vá em Configurações → Site ID Footer.
3. Marque "Ativar injeção no footer" e informe o ID do Banner.
4. O plugin injeta:

```html
<script src="https://cdn.toolz.at/banner-cmp.js" data-toolz-banner-id="SEU_ID"></script>
```

no rodapé do site, apenas se ativado e com ID válido.

## Compatibility

- WordPress 5.0–6.6
- PHP 7.4–8.x

## Installation

1. Upload the plugin files to `/wp-content/plugins/toolz-banner-cmp` or install via WordPress admin.
2. Activate the plugin.
3. Go to Settings → Site ID Footer, enable injection, and enter your Banner ID.

## Configuration

Veja a página de configuração (print):

- ![Settings page screenshot](assets/banner-1544x500.png)
- ![Plugin icon](assets/icon-128x128.png)

## FAQ & Troubleshooting

- **ID inválido:** O script não será injetado.
- **Tema sem `wp_footer`:** O script pode não aparecer. Use temas compatíveis.

## Security & Compliance

- Sem eval, sem powered-by, sem links públicos
- Segue GPLv2 or later
- Não coleta dados, não rastreia

## Contributing

Pull requests welcome! See LICENSE for details.

## License

GPLv2 or later. See LICENSE file.

## Changelog

- 1.0.0 – Initial release

---

**Keywords:** WordPress consent banner, cookie compliance, CMP, Toolz, LGPD/GDPR ready, footer injection, data attribute id
