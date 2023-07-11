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

function skazyrgpd_init()
{ // Hook d'initilisation du plugin
    require_once "skazyrgpd-tarteaucitron.php";
}

function skazyrgpd_admin_main()
{
    require_once "skazyrgpd-admin.php";
}
function skazyrgpd_admin_head()
{
    $url = plugins_url('skazyrgpd.css', __FILE__);
    echo "
    <!-- UIkit CSS -->
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/uikit@3.16.22/dist/css/uikit.min.css' />
    
    <!-- UIkit JS -->
    <script src='https://cdn.jsdelivr.net/npm/uikit@3.16.22/dist/js/uikit.min.js'></script>
    <script src='https://cdn.jsdelivr.net/npm/uikit@3.16.22/dist/js/uikit-icons.min.js'></script>
    
    <!-- CSS skazyrgpd -->
    <link rel='stylesheet' href='$url' />";
}

function skazyrgpd_enqueue_styles()
{
    wp_enqueue_style('override-tarteaucitron', plugins_url('skazyrgpd-tarteaucitron.css', __FILE__));
}

function skazyrgpd_init_main_admin_page()
{ // Hook d'initialisation de la page admin
    add_menu_page('Skazy RGPD - Général', 'Skazy RGPD', 'manage_options', "skazyrgpd-admin", "skazyrgpd_admin_main");
}

function css_root_load()
{
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

add_action('admin_menu', 'skazyrgpd_init_main_admin_page'); // Ajout de la page admin
add_action('wp_head', 'skazyrgpd_init'); // Initialisation du plugin
add_action('admin_head', 'skazyrgpd_admin_head'); // Ajoute Uikit dans le head de l'admin
add_action('wp_enqueue_scripts', 'skazyrgpd_enqueue_styles'); // CSS tarteaucitron
add_action('wp_head', 'css_root_load'); // Ajoute le css du plugin
?>