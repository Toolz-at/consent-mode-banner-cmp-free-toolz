# Consent Mode Banner CMP - Toolz

[Toolz CMP Banner Generator](https://consentmode.toolz.at/en/generator) – Generate your personalized banner.

## How to Install the Plugin

### Option 1: Install via WordPress Dashboard
1. Download the plugin from [GitHub](https://github.com/Toolz-at/consent-mode-banner-cmp-toolz) (click "Code > Download ZIP").
2. In your WordPress dashboard, go to **Plugins > Add New**.
3. Click **Upload Plugin** and select the downloaded ZIP file.
4. Click **Install Now** and then **Activate**.

### Option 2: Manual Installation (FTP)
1. Download the plugin from [GitHub](https://github.com/Toolz-at/consent-mode-banner-cmp-toolz) (click "Code > Download ZIP").
2. Extract the ZIP file on your computer.
3. Upload the `consent-mode-banner-cmp-toolz` folder to your site's `/wp-content/plugins/` directory via FTP.
4. In your WordPress dashboard, go to **Plugins** and activate "Consent Mode Banner CMP - Toolz".

---

## How to Configure and Activate the Banner

1. Generate your Banner ID at: [https://consentmode.toolz.at/en/generator](https://consentmode.toolz.at/en/generator)
2. In WordPress, go to **Settings > Consent Mode Banner CMP - Toolz**.
3. Check the **Enable Banner** option to activate the banner display.
4. In the **Banner ID** field, paste the ID generated on the Toolz site.
5. Click **Save Changes**.
6. Done! The banner will appear in your site's footer.

> **Tip:** If the ID is invalid or the banner does not appear, make sure your theme includes the `wp_footer` function and the ID is correct.

---

## Overview

Consent Mode Banner CMP - Toolz is a lightweight WordPress plugin for cookie compliance and privacy. It injects the [Toolz CMP banner script](https://cdn.toolz.at/banner-cmp.js) in the footer using a unique Banner ID, only when enabled by the admin. No public links, no branding, no tracking—just safe, opt-in integration for consent mode, LGPD/GDPR, and privacy compliance.

## Features

- **Safe by default (opt-in)**
- **No public links**
- **Script attribute `data-toolz-banner-id`**

## Compatibility

- WordPress 5.0–6.6
- PHP 7.4–8.x

## FAQ & Troubleshooting

- **Invalid ID:** The script will not be injected.
- **Theme without `wp_footer`:** The script may not appear. Use compatible themes.

## Security & Compliance

- No eval, no powered-by, no public links
- GPLv2 or later
- Does not collect or track data

## Contributing

Pull requests welcome! See LICENSE for details.

## License

GPLv2 or later. See LICENSE file.

## Changelog

- 1.0.1 – Initial release

---

**Keywords:** WordPress consent banner, cookie compliance, CMP, Toolz, LGPD/GDPR ready, footer injection, data attribute id
