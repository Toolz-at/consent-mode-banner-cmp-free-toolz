<?php
/**
 * Plugin Name: Consent Mode Banner CMP - Toolz
 * Description: Consent Mode Banner for GDPR, CCPA, LGPD with conditional cookie notice and customizable cookie policy.
 * Version: 1.0.4
 * Author: Toolz
 * License: GPL-2.0-or-later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: consent-mode-banner-cmp-free-toolz
 * Domain Path: /languages
 * Requires at least: 5.0
 * Tested up to: 6.8
 * Requires PHP: 7.4
 */

if ( ! defined( 'ABSPATH' ) ) exit;

define( 'TOOLZCMPFT_VERSION', '1.0.4' );
define( 'TOOLZCMPFT_OPTION_KEY', 'toolzcmpft_banner_id' );
define( 'TOOLZCMPFT_ENABLE_KEY', 'toolzcmpft_banner_enable' );
define( 'TOOLZCMPFT_SCRIPT_SRC', 'https://cdn.toolz.at/banner-cmp.js' );

add_action( 'init', function () {
    load_plugin_textdomain(
        'consent-mode-banner-cmp-free-toolz',
        false,
        dirname( plugin_basename( __FILE__ ) ) . '/languages'
    );
} );

class ToolzCMPFT_Plugin {
    public function __construct() {
        add_action( 'admin_menu', [ $this, 'add_settings_page' ] );
        add_action( 'admin_init', [ $this, 'register_settings' ] );
        add_action( 'wp_enqueue_scripts', [ $this, 'maybe_enqueue_script' ] );
        add_filter( 'script_loader_tag', [ $this, 'add_data_attribute' ], 10, 3 );
        add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), [ $this, 'settings_link' ] );
        add_action( 'admin_notices', [ $this, 'admin_notice' ] );
    }

    public function add_settings_page() {
        add_options_page(
            __( 'Consent Mode Banner CMP - Toolz', 'consent-mode-banner-cmp-free-toolz' ),
            __( 'Consent Mode Banner CMP - Toolz', 'consent-mode-banner-cmp-free-toolz' ),
            'manage_options',
            'consent-mode-banner-cmp-free-toolz',
            [ $this, 'settings_page_html' ]
        );
    }

    public function register_settings() {
    register_setting( 'toolzcmpft_settings', TOOLZCMPFT_ENABLE_KEY, [
            'type' => 'boolean',
            'sanitize_callback' => [ $this, 'sanitize_enable' ],
            'default' => 0,
        ] );

    register_setting( 'toolzcmpft_settings', TOOLZCMPFT_OPTION_KEY, [
            'type' => 'string',
            'sanitize_callback' => [ $this, 'sanitize_id' ],
            'default' => '',
        ] );

        add_settings_section(
            'toolzcmpft_section',
            __( 'Banner CMP Settings', 'consent-mode-banner-cmp-free-toolz' ),
            '__return_false',
            'consent-mode-banner-cmp-free-toolz'
        );

        add_settings_field(
            TOOLZCMPFT_ENABLE_KEY,
            __( 'Enable Banner', 'consent-mode-banner-cmp-free-toolz' ),
            [ $this, 'field_enable' ],
            'consent-mode-banner-cmp-free-toolz',
            'toolzcmpft_section'
        );

        add_settings_field(
            TOOLZCMPFT_OPTION_KEY,
            sprintf(
                '%s <span style="color:red">*</span>',
                esc_html__( 'Banner ID', 'consent-mode-banner-cmp-free-toolz' )
            ),
            [ $this, 'field_id' ],
            'consent-mode-banner-cmp-free-toolz',
            'toolzcmpft_section'
        );
    }

    public function sanitize_enable( $value ) {
    return $value ? 1 : 0;
    }

    public function sanitize_id( $value ) {
        $value = trim( (string) $value );
        if ( $value === '' ) return '';
        if ( preg_match( '/^[A-Za-z0-9_-]{3,64}$/', $value ) ) {
            return $value;
        }
    $old = get_option( TOOLZCMPFT_OPTION_KEY, '' );
    add_settings_error( TOOLZCMPFT_OPTION_KEY, 'invalid_id', __( 'Invalid Banner ID. Use 3-64 letters, numbers, dash or underscore.', 'consent-mode-banner-cmp-free-toolz' ) );
        return $old;
    }

    public function field_enable() {
    $value = (int) get_option( TOOLZCMPFT_ENABLE_KEY, 0 );
    echo '<label><input type="checkbox" id="' . esc_attr( TOOLZCMPFT_ENABLE_KEY ) . '" name="' . esc_attr( TOOLZCMPFT_ENABLE_KEY ) . '" value="1" ' . checked( 1, $value, false ) . ' /> ';
    echo esc_html__( 'After enabling the banner it will start to be displayed', 'consent-mode-banner-cmp-free-toolz' ) . '</label>';
    }

    public function field_id() {
    $value = get_option( TOOLZCMPFT_OPTION_KEY, '' );
    echo '<input type="text" id="' . esc_attr( TOOLZCMPFT_OPTION_KEY ) . '" name="' . esc_attr( TOOLZCMPFT_OPTION_KEY ) . '" value="' . esc_attr( $value ) . '" maxlength="64" pattern="[A-Za-z0-9_-]{3,64}" class="regular-text" required /> ';
        echo '<br /><small>';
        $generator_link = '<a href="' . esc_url( 'https://consentmode.toolz.at/en/generator' ) . '" target="_blank" rel="noopener noreferrer">' . esc_html__( 'Consent Mode', 'consent-mode-banner-cmp-free-toolz' ) . '</a>';
        echo wp_kses(
            sprintf(
                /* translators: %s: Toolz Banner CMP generator link */
                __( 'Get your Banner ID at %s', 'consent-mode-banner-cmp-free-toolz' ),
                $generator_link
            ),
            [
                'a' => [
                    'href'   => [],
                    'target' => [],
                    'rel'    => [],
                ],
            ]
        );
        echo '</small>';
    }

    public function settings_page_html() {
        if ( ! current_user_can( 'manage_options' ) ) return;
        echo '<div class="wrap">';
    echo '<h1>' . esc_html__( 'Consent (Toolz Banner CMP)', 'consent-mode-banner-cmp-free-toolz' ) . '</h1>';
        echo '<form method="post" action="options.php">';
    settings_fields( 'toolzcmpft_settings' );
    do_settings_sections( 'consent-mode-banner-cmp-free-toolz' );
        submit_button();
        echo '</form>';
        echo '</div>';
    }

    public function maybe_enqueue_script() {
        $enabled   = (int) get_option( TOOLZCMPFT_ENABLE_KEY, 0 );
        $banner_id = (string) get_option( TOOLZCMPFT_OPTION_KEY, '' );

        if ( $enabled && preg_match( '/^[A-Za-z0-9_-]{3,64}$/', $banner_id ) ) {
            wp_enqueue_script( 'toolzcmpft-banner', TOOLZCMPFT_SCRIPT_SRC, [], TOOLZCMPFT_VERSION, true );
        }
    }

    public function add_data_attribute( $tag, $handle, $src ) {
        if ( 'toolzcmpft-banner' === $handle ) {
            $banner_id = (string) get_option( TOOLZCMPFT_OPTION_KEY, '' );
            if ( preg_match( '/^[A-Za-z0-9_-]{3,64}$/', $banner_id ) ) {
                $tag = str_replace( '<script ', '<script data-toolz-banner-id="' . esc_attr( $banner_id ) . '" ', $tag );
            }
        }
        return $tag;
    }

    public function settings_link( $links ) {
    $url = admin_url( 'options-general.php?page=consent-mode-banner-cmp-free-toolz' );
    $links[] = '<a href="' . esc_url( $url ) . '">' . esc_html__( 'Settings', 'consent-mode-banner-cmp-free-toolz' ) . '</a>';
        return $links;
    }

    public function admin_notice() {
        if ( ! current_user_can( 'manage_options' ) ) return;
        $enabled   = (int) get_option( TOOLZCMPFT_ENABLE_KEY, 0 );
        $banner_id = (string) get_option( TOOLZCMPFT_OPTION_KEY, '' );

        if ( $enabled && ! preg_match( '/^[A-Za-z0-9_-]{3,64}$/', $banner_id ) ) {
            echo '<div class="notice notice-warning is-dismissible"><p>' . esc_html__( 'Consent: Banner is enabled, but the Banner ID is missing or invalid.', 'consent-mode-banner-cmp-free-toolz' ) . '</p></div>';
        }
    }
}

new ToolzCMPFT_Plugin();
