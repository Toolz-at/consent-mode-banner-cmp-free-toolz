
# Consent Mode Banner CMP (Free) - Toolz

[Gerador de Banner Toolz CMP](https://consentmode.toolz.at/en/generator) – Gere seu banner personalizado gratuitamente.

## Como instalar o plugin

### Opção 1: Instalar pelo painel do WordPress
1. Baixe o plugin pelo [GitHub](https://github.com/Toolz-at/toolz-banner-cmp) (clique em "Code > Download ZIP").
2. No painel do WordPress, vá em **Plugins > Adicionar novo**.
3. Clique em **Enviar plugin** e selecione o arquivo ZIP baixado.
4. Clique em **Instalar agora** e depois em **Ativar**.

### Opção 2: Instalar manualmente (FTP)
1. Baixe o plugin pelo [GitHub](https://github.com/Toolz-at/toolz-banner-cmp) (clique em "Code > Download ZIP").
2. Extraia o arquivo ZIP no seu computador.
3. Envie a pasta `toolz-banner-cmp` para o diretório `/wp-content/plugins/` do seu site via FTP.
4. No painel do WordPress, vá em **Plugins** e ative o "Consent Mode Banner CMP (Free) - Toolz".

---

## Como configurar e ativar o banner

1. Gere seu Banner ID em: [https://consentmode.toolz.at/en/generator](https://consentmode.toolz.at/en/generator)
2. No WordPress, acesse o menu **Configurações > Consent Mode Banner CMP (Free) - Toolz**.
3. Marque a opção **Enable Banner** para ativar a exibição do banner.
4. No campo **Banner ID**, cole o ID gerado no site da Toolz.
5. Clique em **Salvar alterações**.
6. Pronto! O banner será exibido no rodapé do seu site.

> **Dica:** Se o ID for inválido ou o banner não aparecer, confira se o tema possui a função `wp_footer` e se o ID está correto.

**WordPress CMP, Consent, Banner, Cookie, Privacy, Compliance, Toolz, Footer Script, Data Attribute**

---

**Version:** 1.0.0
**License:** GPLv2 or later
**Author:** joandysson

---

## Overview

Consent Mode Banner CMP (Free) - Toolz is a lightweight WordPress plugin for cookie compliance and privacy. It injects the [Toolz CMP banner script](https://cdn.toolz.at/banner-cmp.js) in the footer using a unique site ID, only when enabled by the admin. No public links, no branding, no tracking—just safe, opt-in integration for consent mode, LGPD/GDPR, and privacy compliance.

## Recursos (PT-BR)

- Injeta o script CMP da Toolz no rodapé do WordPress
- Só ativa se o admin marcar e informar o ID
- Sem links públicos, sem branding
- Ideal para consentimento, LGPD/GDPR, privacidade e compliance

## Features

- **Safe by default (opt-in)**
- **No public links**
- **Script attribute `data-toolz-banner-id`**

## How it works

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

## Download & Installation

Você pode baixar o plugin diretamente pelo [repositório oficial no GitHub](https://github.com/Toolz-at/toolz-banner-cmp) ou gerar o arquivo ZIP pelo menu "Code > Download ZIP".

**Para instalar no WordPress:**

1. No painel do WordPress, vá em "Plugins > Adicionar novo".
2. Clique em "Enviar plugin" e selecione o arquivo ZIP do plugin.
3. Instale e ative normalmente.

Ou, se preferir:

1. Faça upload dos arquivos para `/wp-content/plugins/toolz-banner-cmp` via FTP.
2. Ative o plugin no painel do WordPress.

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
