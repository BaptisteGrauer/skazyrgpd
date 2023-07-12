<?php 
// NE PAS TOUCHER AU NOM DU FICHIER !!11!!1!11!1!! merci :)

if(!defined('WP_UNINSTALL_PLUGIN')){ // Evite de d'exécuter le processus de désinstallation en cas d'appel direct
    die();
}

// Si le processus de désinstallation est appelé

global $wpdb;
$skazyrgpd_db = $wpdb->prefix."skazyrgpd"; 
$sql = "DROP TABLE IF EXISTS $skazyrgpd_db;";
$wpdb->query($sql);
?>