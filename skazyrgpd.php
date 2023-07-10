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

function skazyrgpd_admin_main () {
    require_once "skazyrgpd-admin.php";
}
function skazyrgpd_admin_submenu () {
    require_once "skazyrgpd-db-install.php";
}

function skazyrgpd_init_main_admin_page() { // Hook d'initialisation de la page admin
    add_menu_page('Skazy RGPD - Général','Skazy RGPD','manage_options', "skazyrgpd-admin", "skazyrgpd_admin_main");
}

add_action('admin_menu','skazyrgpd_init_main_admin_page'); // Ajout de la page admin
add_action('wp_head', 'skazyrgpd_init'); // Initialisation du plugin