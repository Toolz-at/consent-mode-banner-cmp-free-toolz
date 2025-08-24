<?php
/**
 * Plugin Name: Consent Mode Banner CMP (Free) - Toolz
 * Description: Consent Mode Banner for GDPR, CCPA, LGPD with conditional cookie notice and customizable cookie policy.
 * Version: 1.0.0
 * Author: Toolz
 * License: GPL-2.0-or-later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: toolz-banner-cmp
 * Domain Path: /languages
 * Requires at least: 5.0
 * Tested up to: 6.8
 * Requires PHP: 7.4
 */

if ( ! defined( 'ABSPATH' ) ) exit;

define( 'SIF_VERSION', '1.0.0' );
define( 'SIF_OPTION_KEY', 'toolz_banner_cmp_id' );
define( 'SIF_ENABLE_KEY', 'toolz_banner_cmp_enable' );
define( 'SIF_SCRIPT_SRC', 'https://cdn.toolz.at/banner-cmp.js' );

class Toolz_Banner_CMP_Plugin {
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
            __( 'Consent Mode Banner CMP (Free) - Toolz', 'toolz-banner-cmp' ),
            __( 'Consent Mode Banner CMP (Free) - Toolz', 'toolz-banner-cmp' ),
            'manage_options',
            'toolz-banner-cmp',
            [ $this, 'settings_page_html' ]
        );
    }

    public function register_settings() {
        register_setting( 'sif_settings', SIF_ENABLE_KEY, [
            'type' => 'boolean',
            'sanitize_callback' => [ $this, 'sanitize_enable' ],
            'default' => 0,
        ] );

        register_setting( 'sif_settings', SIF_OPTION_KEY, [
            'type' => 'string',
            'sanitize_callback' => [ $this, 'sanitize_id' ],
            'default' => '',
        ] );

        add_settings_section(
            'sif_section',
            __( 'Banner CMP Settings', 'toolz-banner-cmp' ),
            '__return_false',
            'toolz-banner-cmp'
        );

        add_settings_field(
            SIF_ENABLE_KEY,
            __( 'Enable Banner', 'toolz-banner-cmp' ),
            [ $this, 'field_enable' ],
            'toolz-banner-cmp',
            'sif_section'
        );

        add_settings_field(
            SIF_OPTION_KEY,
            __( 'Banner ID', 'toolz-banner-cmp' ) . ' <span style="color:red">*</span>',
            [ $this, 'field_id' ],
            'toolz-banner-cmp',
            'sif_section'
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
        $old = get_option( SIF_OPTION_KEY, '' );
        add_settings_error( SIF_OPTION_KEY, 'invalid_id', __( 'Invalid Banner ID. Use 3-64 letters, numbers, dash or underscore.', 'toolz-banner-cmp' ) );
        return $old;
    }

    public function field_enable() {
        $value = (int) get_option( SIF_ENABLE_KEY, 0 );
        echo '<label><input type="checkbox" id="' . esc_attr( SIF_ENABLE_KEY ) . '" name="' . esc_attr( SIF_ENABLE_KEY ) . '" value="1" ' . checked( 1, $value, false ) . ' /> ';
        echo esc_html__( 'After enabling the banner it will start to be displayed', 'toolz-banner-cmp' ) . '</label>';
    }

    public function field_id() {
        $value = get_option( SIF_OPTION_KEY, '' );
        echo '<input type="text" id="' . esc_attr( SIF_OPTION_KEY ) . '" name="' . esc_attr( SIF_OPTION_KEY ) . '" value="' . esc_attr( $value ) . '" maxlength="64" pattern="[A-Za-z0-9_-]{3,64}" class="regular-text" required /> ';
        echo '<br /><small>';
        printf(
            /* translators: %s: Toolz Banner CMP site URL */
            esc_html__( 'Get your Banner ID at %s', 'toolz-banner-cmp' ),
            '<a href="https://consentmode.toolz.at/en/generator" target="_blank" rel="noopener noreferrer">Consent Mode</a>'
        );
        echo '</small>';
    }

    public function settings_page_html() {
        if ( ! current_user_can( 'manage_options' ) ) return;
        echo '<div class="wrap">';
        echo '<h1>' . esc_html__( 'Consent (Toolz Banner CMP)', 'toolz-banner-cmp' ) . '</h1>';
        echo '<form method="post" action="options.php">';
        settings_fields( 'sif_settings' );
        do_settings_sections( 'toolz-banner-cmp' );
        submit_button();
        echo '</form>';
        echo '</div>';
    }

    public function maybe_enqueue_script() {
        $enabled   = (int) get_option( SIF_ENABLE_KEY, 0 );
        $banner_id = (string) get_option( SIF_OPTION_KEY, '' );

        if ( $enabled && preg_match( '/^[A-Za-z0-9_-]{3,64}$/', $banner_id ) ) {
            wp_enqueue_script( 'sif-banner', SIF_SCRIPT_SRC, [], SIF_VERSION, true );
        }
    }

    public function add_data_attribute( $tag, $handle, $src ) {
        if ( 'sif-banner' === $handle ) {
            $banner_id = (string) get_option( SIF_OPTION_KEY, '' );
            if ( preg_match( '/^[A-Za-z0-9_-]{3,64}$/', $banner_id ) ) {
                $tag = '<script src="' . esc_url( $src ) . '" data-toolz-banner-id="' . esc_attr( $banner_id ) . '"></script>';
            }
        }
        return $tag;
    }

    public function settings_link( $links ) {
        $url = admin_url( 'options-general.php?page=toolz-banner-cmp' );
        $links[] = '<a href="' . esc_url( $url ) . '">' . esc_html__( 'Settings', 'toolz-banner-cmp' ) . '</a>';
        return $links;
    }

    public function admin_notice() {
        if ( ! current_user_can( 'manage_options' ) ) return;
        $enabled   = (int) get_option( SIF_ENABLE_KEY, 0 );
        $banner_id = (string) get_option( SIF_OPTION_KEY, '' );

        if ( $enabled && ! preg_match( '/^[A-Za-z0-9_-]{3,64}$/', $banner_id ) ) {
            echo '<div class="notice notice-warning is-dismissible"><p>' . esc_html__( 'Consent: Banner is enabled, but the Banner ID is missing or invalid.', 'toolz-banner-cmp' ) . '</p></div>';
        }
    }
}

new Toolz_Banner_CMP_Plugin();
