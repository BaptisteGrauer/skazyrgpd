<?php
/**
 * Plugin Name: Skazy RGPD (Tarteaucitron)
 * Description: Module de gestion des cookies Skazy
 * Author: Skazy
 */

function skazyrgpd_init() { // Hook d'initilisation du plugin
    require_once "skazyrgpd-init.php";
}

function skazyrgpd_init_admin_page() { // Hook d'initialisation de la page admin
add_menu_page('Paramètres Skazy RGPD','Skazy RGPD','manage_options', plugin_dir_path(__FILE__) . "skazyrgpd-settings.php"/*, null, plugin_dir_url(__FILE__) . 'tarteaucitron.png'*/);
}


add_action('admin_menu','skazyrgpd_init_admin_page'); // Ajout de la page admin
add_action('wp_head', 'skazyrgpd_init'); // Initialisation du plugin