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


Easily make your WordPress site compliant with privacy laws (GDPR, LGPD, CCPA) by injecting the Toolz CMP consent banner in your footer. No public links, no branding, no tracking, and 100% privacy-first.

**How it works:**
- The admin generates a Banner ID at: https://consentmode.toolz.at/en/generator
- The plugin only injects the banner if enabled and a valid ID is provided.
- No data is collected, no external branding, and no public links are added.

Injeta o script do banner CMP da Toolz no rodapé com um ID único, apenas quando ativado e configurado pelo administrador. Não adiciona links públicos, branding ou rastreamento. Ideal para consentimento, privacidade e compliance.

== Installation ==

1. Download the plugin from [GitHub](https://github.com/Toolz-at/toolz-banner-cmp) (Code > Download ZIP) or install via the WordPress plugins screen.
2. Activate the plugin through the 'Plugins' screen in WordPress.
3. Go to Settings → Consent Mode Banner CMP (Free) - Toolz.
4. Check "Enable Banner" and enter your Banner ID (get it at https://consentmode.toolz.at/en/generator).
5. Save changes. The banner will appear in your site's footer if the ID is valid.

== Frequently Asked Questions ==

= Does it inject anything without an ID? =
No. The script is only injected if you enable the banner and provide a valid Banner ID.

= Where do I get my Banner ID? =
Go to https://consentmode.toolz.at/en/generator and generate your free Banner ID.

= Does it change the script URL? =
No. The script URL is always https://cdn.toolz.at/banner-cmp.js and your ID is set in the data-toolz-banner-id attribute.

= Is it compatible with cache/CDN? =
Yes. The script is only injected when enabled and does not send data by itself.

= Is there any branding or tracking? =
No. The plugin is 100% white-label and privacy-first.

== Screenshots ==
1. Settings page for Consent Mode Banner CMP (Free) - Toolz.
2. Example of the consent banner in the site footer.

== Changelog ==
= 1.0.0 =
* Initial release.

== Privacy ==
This plugin only injects an external script when enabled and configured. No data is collected or tracked by this plugin. Privacy policy and user communication are the responsibility of the site administrator.
