<?php
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) exit;

delete_option( 'site_id_footer_id' );
delete_option( 'site_id_footer_enable' );
