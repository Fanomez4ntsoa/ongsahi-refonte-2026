<?php
/*
Plugin Name: SAHI Platform
Description: Plateforme d'inscription SAHI
Version: 1.0
Author: Fanoela
*/

if (!defined('ABSPATH')) {
    exit;
}

define('SAHI_PLUGIN_PATH', plugin_dir_path(__FILE__));

require_once SAHI_PLUGIN_PATH . 'includes/database.php';
require_once SAHI_PLUGIN_PATH . 'includes/register-form.php';
/*require_once SAHI_PLUGIN_PATH . 'includes/login-form.php';
require_once SAHI_PLUGIN_PATH . 'includes/dashboard.php';
require_once SAHI_PLUGIN_PATH . 'includes/admin-panel.php';*/

register_activation_hook(__FILE__, 'sahi_create_tables');

function sahi_load_tailwind() {
    wp_enqueue_script(
        'tailwind-cdn',
        'https://cdn.tailwindcss.com',
        [],
        null,
        false
    );
}

add_action('wp_enqueue_scripts', 'sahi_load_tailwind');

function sahi_enqueue_scripts(){

    wp_enqueue_script(
        'sahi-form-js', // nom
        plugin_dir_url(__FILE__) . 'assets/js/form.js', // chemin
        [], // dépendances
        false,
        true // charger dans le footer
    );

}

add_action('wp_enqueue_scripts', 'sahi_enqueue_scripts');