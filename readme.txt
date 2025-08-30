=== Consent Mode Banner CMP - Toolz ===
Contributors: joandysson
Tags: consent mode, cmp, banner, cookie, compliance
Requires at least: 5.0
Tested up to: 6.8
Requires PHP: 7.4
Stable tag: 1.0.2
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Easily display the Toolz CMP banner in your site footer using a unique ID. GDPR, LGPD & CCPA ready cookie consent solution.

== Description ==

Easily make your WordPress site compliant with privacy laws (GDPR, LGPD, CCPA) by enabling the Toolz CMP consent banner in your footer. No public links, no branding, no tracking, and 100% privacy-first.

**How it works:**
- The admin generates a Banner ID at: https://consentmode.toolz.at/en/generator
- The plugin only enables the banner if you activate it and provide a valid ID.
- No data is collected, no external branding, and no public links are added.

Ativa o banner CMP da Toolz no rodapé com um ID único, apenas quando ativado e configurado pelo administrador. Não adiciona links públicos, branding ou rastreamento. Ideal para consentimento, privacidade e compliance.

== Installation ==

1. Download the plugin from [GitHub](https://github.com/Toolz-at/consent-mode-banner-cmp-toolz) (Code > Download ZIP) or install via the WordPress plugins screen.
2. Activate the plugin through the 'Plugins' screen in WordPress.
3. Go to Settings → Consent Mode Banner CMP - Toolz.
4. Check "Enable Banner" and enter your Banner ID (get it at https://consentmode.toolz.at/en/generator).
5. Save changes. The banner will appear in your site's footer if the ID is valid.

== Frequently Asked Questions ==

= Does the plugin enable anything without a Banner ID? =
No. The script is only enabled if you activate the banner and provide a valid Banner ID.

= Where do I get my Banner ID? =
Go to https://consentmode.toolz.at/en/generator and generate your free Banner ID.

= Does it change the script URL? =
No. The script URL is always https://cdn.toolz.at/banner-cmp.js and your ID is set in the data-toolz-banner-id attribute.

= Is it compatible with cache/CDN? =
Yes. The script is only enabled when you activate the banner and does not send data by itself.

= Is there any branding or tracking? =
No. The plugin is 100% white-label and privacy-first.

= Is this plugin free? =
Yes. It is free and open source (GPLv2 or later).

= Does it work with any theme? =
Yes, as long as your theme supports the standard `wp_footer` hook.

= Can I use it for LGPD/GDPR/CCPA compliance? =
Yes, the banner is designed for privacy and consent compliance in multiple jurisdictions.

== External services ==

This plugin uses an external service (Toolz Consent Mode) to display and manage the cookie/consent banner.

Why: The script is loaded from Toolz’s servers to simplify the setup process directly from WordPress, so you don’t need to manually copy and configure code on your site.

Alternative: If you prefer, you can generate and add the banner script manually using the official generator at: https://consentmode.toolz.at/en/generator

What data is sent and when:
- Every time a page is loaded, the browser requests the banner script and configuration from Toolz servers.
- Only standard technical information is transmitted (such as IP address, browser type, and referer), which happens with any normal web request.
- No personal data is collected by the plugin itself.

Service provider: Toolz.at
- [Terms of Service](https://consentmode.toolz.at/en/terms)
- [Privacy Policy](https://consentmode.toolz.at/en/politics-privacy)

== Screenshots ==
1. Settings page for Consent Mode Banner CMP - Toolz.
2. Example of the consent banner in the site footer.

== Changelog ==
= 1.0.2 =
* Minor text updates.
= 1.0.1 =
* Bug fixes and minor improvements.
= 1.0.0 =
* Initial release.

== Privacy ==
This plugin only enables an external script when activated and configured. No data is collected or tracked by this plugin. Privacy policy and user communication are the responsibility of the site administrator.
