<?php 
// Lors de la désinstallation du plugin

// Retirer tout les hooks qui ont été créés 
/*
remove_action('wp_head','skazyrgpd_init');
remove_action('admin_menu','skazyrgpd_admin_page');