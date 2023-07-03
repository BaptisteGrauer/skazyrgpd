<?php
/**
 * Plugin Name: Skazy RGPD
 * Description: Module de gestion des Cookies Skazy
 * Author: Skazy
 */

function skazyrgpd_init() { // Hook d'initilisation du plugin
    include "skazyrgpd-init.php";
}

function skazyrgpd_admin_page() { // Hook d'initialisation du menu des paramètres du plugin
    add_menu_page('Paramètres Skazy RGPD','Skazy RGPD','manage_options', plugin_dir_path(__FILE__) . "skazyrgpd-settings.php");
}


add_action('admin_menu','skazyrgpd_admin_page'); // Ajout du menu des paramètres du plugin
add_action('wp_head', 'skazyrgpd_init'); // Initialisation du plugin