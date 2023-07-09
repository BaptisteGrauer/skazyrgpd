<?php
/**
 * Plugin Name: Skazy RGPD (Tarteaucitron)
 * Description: Module de gestion des cookies pour Skazy
 * Author: Skazy
 * Author URI: https://skazy.nc
 * Requires at least: 6.2
 * Requires PHP: 8.2
 * Version: 1.0 dev
 */

function skazyrgpd_init() { // Hook d'initilisation du plugin
    require_once "skazyrgpd-tarteaucitron.php";
}

function skazyrgpd_init_admin_page() { // Hook d'initialisation de la page admin
    add_menu_page('Paramètres Skazy RGPD','Skazy RGPD','manage_options', plugin_dir_path(__FILE__) . "skazyrgpd-admin.php");
}

add_action('admin_menu','skazyrgpd_init_admin_page'); // Ajout de la page admin
add_action('wp_head', 'skazyrgpd_init'); // Initialisation du plugin