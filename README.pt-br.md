
# Consent Mode Banner CMP - Toolz

[Gerador de Banner Toolz CMP](https://consentmode.toolz.at/en/generator) – Gere seu banner personalizado gratuitamente.

## Como instalar o plugin

### Opção 1: Instalar pelo painel do WordPress
1. Baixe o plugin pelo [GitHub](https://github.com/Toolz-at/consent-mode-banner-cmp-toolz) (clique em "Code > Download ZIP").
2. No painel do WordPress, vá em **Plugins > Adicionar novo**.
3. Clique em **Enviar plugin** e selecione o arquivo ZIP baixado.
4. Clique em **Instalar agora** e depois em **Ativar**.

### Opção 2: Instalação manual (FTP)
1. Baixe o plugin pelo [GitHub](https://github.com/Toolz-at/consent-mode-banner-cmp-toolz) (clique em "Code > Download ZIP").
2. Extraia o arquivo ZIP no seu computador.
3. Envie a pasta `consent-mode-banner-cmp-toolz` para o diretório `/wp-content/plugins/` do seu site via FTP.
4. No painel do WordPress, vá em **Plugins** e ative "Consent Mode Banner CMP - Toolz".

---

## Como configurar e ativar o banner

1. Gere seu Banner ID em: [https://consentmode.toolz.at/en/generator](https://consentmode.toolz.at/en/generator)
2. No WordPress, acesse **Configurações > Consent Mode Banner CMP - Toolz**.
3. Marque a opção **Enable Banner** para ativar a exibição do banner.
4. No campo **Banner ID**, cole o ID gerado no site da Toolz.
5. Clique em **Salvar alterações**.
6. Pronto! O banner será exibido no rodapé do seu site.

> **Dica:** Se o ID for inválido ou o banner não aparecer, confira se o tema possui a função `wp_footer` e se o ID está correto.

---

## Visão geral

Consent Mode Banner CMP - Toolz é um plugin WordPress leve para conformidade de cookies e privacidade. Ele injeta o [script do banner Toolz CMP](https://cdn.toolz.at/banner-cmp.js) no rodapé usando um Banner ID único, apenas quando ativado pelo administrador. Sem links públicos, sem branding, sem rastreamento — apenas integração segura e opt-in para consent mode, LGPD/GDPR e privacidade.

## Recursos

- **Seguro por padrão (opt-in)**
- **Sem links públicos**
- **Atributo do script `data-toolz-banner-id`**

## Compatibilidade

- WordPress 5.0–6.6
- PHP 7.4–8.x

## FAQ & Solução de Problemas

- **ID inválido:** O script não será injetado.
- **Tema sem `wp_footer`:** O script pode não aparecer. Use temas compatíveis.

## Segurança & Conformidade

- Sem eval, sem powered-by, sem links públicos
- GPLv2 ou posterior
- Não coleta ou rastreia dados

## Contribuindo

Pull requests são bem-vindos! Veja o arquivo LICENSE para detalhes.

## Licença

GPLv2 ou posterior. Veja o arquivo LICENSE.

## Changelog

- 1.0.1 – Lançamento inicial

---

**Palavras-chave:** WordPress consent banner, cookie compliance, CMP, Toolz, LGPD/GDPR ready, footer injection, data attribute id
