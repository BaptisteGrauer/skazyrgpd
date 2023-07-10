<div class="wrap">
    <form method="post" action="admin.php?page=skazyrgpd-admin-db">
        <?php submit_button("Installer la base de données")?>
    </form>
<?php

if($_SERVER['REQUEST_METHOD'] == "POST"){
    global $wpdb;
    $sql = "SELECT setting_name FROM ";
    $skazyrgpd_db = $wpdb->prefix."skazyrgpd"; 
    $charset_collate = $wpdb->get_charset_collate();
    // Crée la table dans la BDD de wordpress
    $sql = "CREATE TABLE IF NOT EXISTS $skazyrgpd_db (
        id INT(100) NOT NULL AUTO_INCREMENT,
        setting_name TEXT NOT NULL,
        setting_description TEXT NOT NULL,
        setting_value TEXT NOT NULL,
        setting_default_value TEXT NOT NULL,
        setting_type TEXT NOT NULL,
        setting_enabled TEXT NOT NULL,
        PRIMARY KEY  (id)
        ) $charset_collate ;";
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    if($wpdb->query($sql) === TRUE){
        echo "La base de donnée à été crée avec succès";
        echo "ok";
    }
}

?>
</div>
