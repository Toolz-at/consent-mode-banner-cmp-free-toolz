=== Consent Mode Banner CMP (Free) - Toolz ===
Contributors: joandysson
Tags: footer, script, id, tracking, consent, cmp, banner, cookie, compliance, privacy, analytics, integration, injection
Requires at least: 5.0
Tested up to: 6.6
Requires PHP: 7.4
Stable tag: 1.0.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

== Description ==

Injects the Toolz CMP banner script in the footer with a unique Banner ID, only when enabled and configured by the admin. No public links or branding are added. Typical use: display and control the Toolz CMP banner for consent/privacy compliance using a unique ID.

Injeta o script do banner CMP da Toolz no rodapé com um ID único para o Banner, apenas quando ativado e configurado pelo administrador. Não adiciona links públicos ou branding. Uso típico: exibir/comandar o banner CMP da Toolz para consentimento/privacidade/compliance usando um ID único.

== Installation ==

1. Upload the plugin files to the `/wp-content/plugins/toolz-banner-cmp` directory, or install the plugin through the WordPress plugins screen directly.
2. Activate the plugin through the 'Plugins' screen in WordPress.
3. Go to Settings → Banner ID Footer, check "Enable footer injection" and enter your Banner ID.

== Frequently Asked Questions ==

= Does it inject anything without an ID? =
No.

= Does it change the script URL? =
No. The URL is fixed (https://cdn.toolz.at/banner-cmp.js); the identifier is set in the data-toolz-banner-id attribute.

= Compatible with cache/CDN? =
Yes. The plugin only injects the script when enabled and does not send data by itself.

== Screenshots ==
1. Settings page for Banner ID.

== Changelog ==
= 1.0.0 =
* Initial release.

== Privacy ==
This plugin only injects an external script when configured. Privacy policy and user communication are the responsibility of the site administrator.
