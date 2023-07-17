<?php
/**
 * Plugin Name: Skazy RGPD (Tarteaucitron)
 * Description: Plugin de gestion de services/cookies pour respect du RGPD.
 * Author: Skazy
 * Author URI: https://skazy.nc
 * Requires at least: 6.2
 * Requires PHP: 8
 * Version: 1.0
 */

function skazyrgpd_init()
{ // Hook d'initilisation du plugin
    require_once "skazyrgpd-tarteaucitron.php";
}

//

function skazyrgpd_init_main_admin_page()
{ // Hook d'initialisation de la page admin
    add_menu_page('Skazy RGPD - Général', 'Skazy RGPD', 'manage_options', "skazyrgpd-admin", "skazyrgpd_admin_main");
} // ↓ Appele la fonction en dessous ↓
function skazyrgpd_admin_main()
{ // Hook d'initialisation de la page admin
    require_once "skazyrgpd-admin.php";
}

//

function skazyrgpd_admin_head()
{ // Hook d'initialisation des métadonnées da la page admin.
    echo "
    <!-- UIkit CSS -->
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/uikit@3.16.22/dist/css/uikit.min.css' />
    
    <!-- UIkit JS -->
    <script src='https://cdn.jsdelivr.net/npm/uikit@3.16.22/dist/js/uikit.min.js'></script>
    <script src='https://cdn.jsdelivr.net/npm/uikit@3.16.22/dist/js/uikit-icons.min.js'></script>";
}

//

function skazyrgpd_enqueue_styles()
{ // Hook pour la surcharge CSS du plugin
    wp_enqueue_style('override-tarteaucitron', plugins_url('skazyrgpd.css', __FILE__));
}
function css_root_load()
{ // Hook de remplacement des paramètres dans la surcharge CSS
    global $wpdb;
    $skazyrgpd_db = $wpdb->prefix . "skazyrgpd";
    $colors = $wpdb->get_results("SELECT setting_name, setting_value FROM $skazyrgpd_db WHERE setting_category='apparence'", ARRAY_N);

    $bgcolor = $colors[0][1];
    $textcolor = $colors[1][1];

    $primaryColor = "
        <style>
            #tarteaucitronRoot{
                --tac-primary-bg: $bgcolor;
                --tac-primary-txt: $textcolor;
            }
        </style>
        ";
    echo $primaryColor;
}

//

add_action('admin_menu', 'skazyrgpd_init_main_admin_page'); // Ajout de la page admin
add_action('wp_head', 'skazyrgpd_init'); // Initialisation du plugin
add_action('admin_head', 'skazyrgpd_admin_head'); // Ajoute Uikit dans le head de l'admin
add_action('wp_enqueue_scripts', 'skazyrgpd_enqueue_styles'); // Surcharge CSS tarteaucitron
add_action('wp_head', 'css_root_load'); // Ajoute des paramètres à la surcharge CSS de tarteaucitron
?>