<?php 
// Laissez le nom de fichier tel quel

if(!defined('WP_UNINSTALL_PLUGIN')){ // Evite de d'exécuter le processus de désinstallation en cas d'appel direct
    die();
}

// Si le processus de désinstallation est appelé

delete_option('skazyrgpd_settings'); // Supprime les paramètres

?>