<?php 

if (isset($_GET['reset'])) {
    skazyrgpd_reset_settings();
}
if (isset($_GET['db-install'])){
    skazyrgpd_install_db();
}
global $wpdb;
$skazyrgpd_db = $wpdb->prefix . "skazyrgpd";
if($_SERVER['REQUEST_METHOD'] == "POST"){ // MAJ des modifications sur la bdd
    $query = $wpdb->get_results("SELECT setting_name, setting_value FROM $skazyrgpd_db", ARRAY_N);
    foreach($query as $setting){
        $name = $setting[0];
        $value = $_POST[$setting[0]];
        $wpdb->get_results("UPDATE $skazyrgpd_db SET setting_value='$value' WHERE setting_name='$name'");
    }
}
function skazyrgpd_display_settings($results){ // Prends en paramètre le résultat d'une requête SQL
    foreach ($results as $result) {
        $setting_name = $result[0];
        $setting_description = $result[1];
        $setting_value = $result[2];
        $setting_type = $result[3];
        $setting_select_possible_values = $result[4];
        if ($setting_type == "text") {
            echo "<label for='$setting_name'>$setting_description</label><br>";
            echo "<input type='text' name='$setting_name' value='$setting_value'><br>";
            }
        elseif ($setting_type == "color") {
            echo "<label for='$setting_name'>$setting_description</label><br>";
            echo "<input type='color' name='$setting_name' value='$setting_value'><br>";
        } else if ($setting_type == "select") {
            echo "<label for='$setting_name'>$setting_description</label><br>";
            echo "<select name='$setting_name'>";
            $setting_select_possible_values = explode(",", $setting_select_possible_values);
            $setting_select_possible_values = str_replace("'", "", $setting_select_possible_values);
            $setting_select_possible_values = str_replace("[", "", $setting_select_possible_values);
            $setting_select_possible_values = str_replace("]", "", $setting_select_possible_values);
            $setting_select_possible_values = str_replace(" ", "", $setting_select_possible_values); // à retirer s'il y aurait des espaces dans les paramètres
            foreach ($setting_select_possible_values as $setting_select_possible_value) {
                if ($setting_select_possible_value == $setting_value) {
                    echo "<option value='$setting_select_possible_value' selected>$setting_select_possible_value</option>";
                } else {
                    echo "<option value='$setting_select_possible_value'>$setting_select_possible_value</option>";
                }
            }
            echo "</select><br>";
        } else if ($setting_type == "textarea") {
            echo "<label for='$setting_name'>$setting_description</label><br>";
            echo "<textarea name='$setting_name'>$setting_value</textarea><br>";
        } else if ($setting_type == "radio") {
            echo "<label for='$setting_name'>$setting_description</label><br><div>";
            if ($setting_value == "true") {
                echo "<input type='radio' name='$setting_name' value='true' checked> Oui<br>";
                echo "<input type='radio' name='$setting_name' value='false'> Non</div>";
            } else {
                echo "<input type='radio' name='$setting_name' value='true'> Oui<br>";
                echo "<input type='radio' name='$setting_name' value='false' checked> Non</div>";
            }
        }
        echo "<br>";
    }
}
function skazyrgpd_reset_settings(){ // Change tout les champs avec leur valeur par défaut
    global $wpdb;
    $skazyrgpd_db = $wpdb->prefix . "skazyrgpd";
    $results = $wpdb->get_results("SELECT setting_name, setting_default_value FROM $skazyrgpd_db", ARRAY_N);
    foreach ($results as $result) {
        $setting_name = $result[0];
        $setting_default_value = $result[1];
        $wpdb->update(
            $skazyrgpd_db,
            array(
                'setting_value' => $setting_default_value
            ),
            array(
                'setting_name' => $setting_name
            )
        );
    }

    echo "<script> window.history.replaceState({}, document.title, '/' + 'wp-admin/admin.php?page=skazyrgpd-admin');
    
    //location.reload(true);</script>";
}
function skazyrgpd_install_db(){ // Supprime et recrée la table {préfixe}skazyrgpd
    $Settings = 
        [
            /*
            [
                "nomDuParamètre"
                "Description du paramètre"
                "Paramètre actuel (valeur par défaut utilisée)"
                "Valeur par défaut"
                "Type de paramètre"
                "Valeurs possibles si type 'select'"
                "Catégorie du paramètre"
            ]
            */
            [
                "backgroundColor",
                "Couleur de fond du bandeau cookie",
                "#aaaaaa",
                "#aaaaaa",
                "color",
                "",
                "apparence"
            ],
            [
                "textColor",
                "Couleur du texte",
                "#000000",
                "#000000",
                "color",
                "",
                "apparence"
            ],
            [
                "privacyUrl",
                "URL Politique de confidentialité",
                "" ,
                "", 
                "text", 
                "",
                "général"
            ],
            [
                "bodyPosition",
                "Position sur le corps de la page (body)",
                "bottom",
                "bottom",
                "select",
                ["top","bottom"],
                "général"
            ],
            [
                "hashtag",
                "Hashtag (pour ouvrir le panneau)",
                "#tarteaucitron",
                "#tarteaucitron",
                "text", 
                "",
                "général"
            ],
            [
                "cookieName",
                "Nom du cookie pour stocker les paramètres de tarteaucitron" ,
                "tarteaucitron",
                "tarteaucitron",
                "text",
                "",
                "général"
            ],
            [
                "orientation",
                "Position du bandeau",
                "middle",
                "middle",
                "select",
                ["top", "bottom", "middle", "popup"],
                "général"
            ],
            [
                "groupServices",
                "Grouper les service par catégorie",
                "false",
                "false",
                "radio",
                "",
                "général"
            ],
            [
                "serviceDefaultState",
                "Etat par défaut",
                "wait",
                "wait",
                "select",
                ["true", "wait", "false"],
                "général"
            ],
            [
                "showAlertSmall",
                "Affichages de la petite bannière d'alertes",
                "false",
                "false",
                "radio",
                "",
                "général"
            ],
            [
                "cookiesList",
                "Affiche la liste des cookies",
                "true",
                "true",
                "radio",
                "",
                "général"
            ],
            [
                "showIcon",
                "Affiche l'icône pour gérer les cookies",
                "true",
                "true",
                "radio",
                "",
                "général"
            ],
            [

                "iconSrc",
                "URL/base64 de l'image (inutilisé)",
                "",
                "",
                "text",
                "",
                "général"
            ],
            [
                "iconPosition",
                "Position de l'icône",
                "BottomLeft",
                "BottomLeft",
                "select",
                ["TopLeft","TopRight","BottomLeft","BottomRight"],
                "général"
            ],
            [
                "adblocker",
                "Alerte de détection de bloqueur de pub",
                "false",
                "false",
                "radio",
                "",
                "général"
            ],
            [
                "denyAllCta",
                "Afficher le bouton 'Tout refuser'" ,
                "true",
                "true",
                "radio",
                "",
                "général"
            ],
            [
                "acceptAllCta",
                "Afficher le bouton 'Tout accepter",
                "true",
                "true",
                "radio",
                "",
                "général"
            ],
            [
                "highPrivacy",
                "Accepter automatiquement tout les cookies",
                "false",
                "false",
                "radio",
                "",
                "général"
            ],
            [
                "handleBrowserDNTRequest",
                "Refuser tout les cookies si requête Do Not Track",
                "false",
                "false",
                "radio",
                "",
                "général"
            ],
            [
                "removeCredit",
                "Retirer le lien de crédit",
                "false",
                "false",
                "radio",
                "",
                "général"
            ],
            [
                "moreInfoLink",
                "Afficher le lien 'plus d'informations'",
                "true",
                "true",
                "radio",
                "",
                "général"
            ],
            [
                "useExternalCss",
                "Utiliser le CSS externe",
                "false",
                "false",
                "radio",
                "",
                "général"
            ],
            [
                "useExternalJs",
                "Utiliser le JS externe",
                "false",
                "false",
                "radio",
                "",
                "général"
            ],
            [
                "cookieDomain",
                "Nom de domaine pour les cookies partagés (inutilisé)",
                "",
                "",
                "text",
                "",
                "général"
            ],
            [
                "readmoreLink",
                "Lien 'voir plus'",
                "",
                "",
                "text",
                "",
                "général"
            ],
            [
                "mandatory",
                "Afficher le message pour les cookies essentiels",
                "true",
                "true",
                "radio",
                "",
                "général"
            ],
            [
                "mandatoryCta",
                "Afficher le message pour les cookies non-essentiels",
                "true",
                "true",
                "radio",
                "",
                "général"
            ],
            [
                "googleTagManagerEnabled",
                "Utiliser Google Tag Manager",
                "false",
                "false",
                "radio",
                "",
                "service"
            ],
            [
                "googleTagManager",
                "Google Tag Manager",
                "GTM-XXXX",
                "GTM-XXXX",
                "text",
                "",
                "service"
            ],
            [
                "googleAnalyticsEnabled",
                "Utiliser Google Analytics",
                "false",
                "false",
                "radio",
                "",
                "service"
            ],
            [
                "googleAnalytics",
                "Google Analytics",
                "UA-XXXXXXXX-X",
                "UA-XXXXXXXX-X",
                "text",
                "",
                "service"
            ],
            [
                "matomoEnabled",
                "Utiliser Matomo",
                "false",
                "false",
                "radio",
                "",
                "service"
            ],
            [
                "matomoId",
                "Matomo ID",
                "SITE_ID",
                "SITE_ID",
                "text",
                "",
                "service"
            ],
            [
                "matomoUrl",
                "Matomo URL",
                "matomomtUrl",
                "matomomtUrl",
                "text",
                "",
                "service"
            ],
            [
                "zopimEnabled",
                "Utiliser Zopim",
                "false",
                "false",
                "radio",
                "",
                "service"
            ],
            [
                "zopim",
                "Zopim ID",
                "zopim_id",
                "zopim_id",
                "text",
                "",
                "service"
            ],
            [
                "youtubeEnabled",
                "Utiliser YouTube",
                "false",
                "false",
                "radio",
                "",
                "service"
            ],
            [
                "youtubeApiEnabled",
                "Utiliser YouTube API",
                "false",
                "false",
                "radio",
                "",
                "service"
            ],
            [
                "vimeoEnabled",
                "Utiliser Vimeo",
                "false",
                "false",
                "radio",
                "",
                "service"
            ],
            [
                "facebookLikeboxEnabled",
                "Utiliser Facebook Likebox",
                "false",
                "false",
                "radio",
                "",
                "service"
            ],
            [
                "facebookChatEnabled",
                "Utiliser Facebook Chat",
                "false",
                "false",
                "radio",
                "",
                "service"
            ],
            [
                "facebookChatId",
                "Facebook app ID",
                "ID",
                "ID",
                "text",
                "",
                "service"
            ],
            [
                "googleMapsEnabled",
                "Utiliser Google Maps",
                "false",
                "false",
                "radio",
                "",
                "service"
            ],
            [
                "googleMapsID",
                "Google Maps ID",
                "API KEY",
                "API KEY",
                "text",
                "",
                "service"
            ],
            [
                "googleMapsIFrameEnabled",
                "Utiliser Google Maps IFrame",
                "false",
                "false",
                "radio",
                "",
                "service"
            ],
            [
                "googleMapsSnazzyEnabled",
                "Utiliser Google Maps via Snazzy Maps",
                "false",
                "false",
                "radio",
                "",
                "service"
            ],
            [
                "googleMapsSnazzyID",
                "Snazzy Maps ID",
                "ID",
                "ID",
                "text",
                "",
                "service"
            ],
            [
                "googleMapsMapBoxEnabled",
                "Utiliser Google Maps via MapBox",
                "false",
                "false",
                "radio",
                "",
                "service"
            ],
            [
                "googleMapsMapBoxToken",
                "Token d'accès MapBox",
                "token",
                "token",
                "text",
                "",
                "service"
            ],
            [
                "googleMapsMapBoxJs",
                "JS personnalisé MapBox",
                "js",
                "js",
                "text",
                "",
                "service"
            ],
        ];
    global $wpdb;
    $skazyrgpd_db = $wpdb->prefix."skazyrgpd"; 
    // Supprime la table dans la BDD
    $wpdb->query("DROP TABLE IF EXISTS $skazyrgpd_db");
    // Crée la table dans la BDD de wordpress
    $charset_collate = $wpdb->get_charset_collate();
    $sql = $wpdb-> get_results("CREATE TABLE IF NOT EXISTS $skazyrgpd_db (
        id INT(100) NOT NULL AUTO_INCREMENT,
        setting_name TEXT NOT NULL,
        setting_description TEXT NOT NULL,
        setting_value TEXT NOT NULL,
        setting_default_value TEXT NOT NULL,
        setting_type TEXT NOT NULL,
        setting_select_possible_values TEXT,
        setting_category TEXT NOT NULL,
        PRIMARY KEY  (id)
        ) $charset_collate ;");
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    // Insère les valeurs par défaut dans la BDD
    $query = "INSERT INTO $skazyrgpd_db 
    (setting_name, setting_description, setting_value, setting_default_value, setting_type, setting_select_possible_values, setting_category) 
    VALUES ";
    foreach($Settings as $setting){
        $settingName = $setting[0];
        $settingDesc = $setting[1];
        $settingVal = $setting[2];
        $settingDef = $setting[3];
        $settingType = $setting[4];
        $settingSelect = $setting[5];
        $settingCategory = $setting[6];
        $value = "(\"$settingName\", \"$settingDesc\", \"$settingVal\", \"$settingDef\", \"$settingType\", ";
        if (gettype($settingSelect) == "array") {
            $settingPossibleVals =  "[";
            for($i = 0; $i < count($settingSelect); $i++) {
                if(isset($settingSelect[$i +1])){
                    $settingPossibleVals .= "'" . $settingSelect[$i] . "', ";
                }
                else {
                    $settingPossibleVals .= "'" .$settingSelect[$i] . "'";
                }
            }
            $settingPossibleVals .= "]";
            $value .= "\"$settingPossibleVals\", \"$settingCategory\")";
        } else {
            $value .= "\"\", \"$settingCategory\")";
        }
        $values[] = $value;
    }
    $query .= implode(", ", $values). ";";
    $wpdb->query($query);
    echo "<script> window.history.replaceState({}, document.title, '/' + 'wp-admin/admin.php?page=skazyrgpd-admin');
    //location.reload(true);</script>";
}
?>
<div class="wrap">
    <h1>Paramètres Tarteaucitron</h1>
    <form method="post" action="<?php echo "admin.php?page=skazyrgpd-admin"?>">
        <input type='submit' class='button button-primary' value='Enregistrer les modifications'><br>
        <h2>Général</h2>
        <div class="skazyrgpd-category">
            <?php
                $skazyrgpd_db = $wpdb->prefix . "skazyrgpd";
                $results = $wpdb->get_results("SELECT setting_name, setting_description, setting_value, setting_type, setting_select_possible_values FROM $skazyrgpd_db WHERE setting_category='général'", ARRAY_N);
                skazyrgpd_display_settings($results);
            ?>
        </div>
        <input type='submit' class='button button-primary' value='Enregistrer les modifications'>
        <h2>Apparence</h2>
        <div class="skazyrgpd-category">
            <?php 
                $skazyrgpd_db = $wpdb->prefix . "skazyrgpd";
                $results = $wpdb->get_results("SELECT setting_name, setting_description, setting_value, setting_type, setting_select_possible_values FROM $skazyrgpd_db WHERE setting_category='apparence'", ARRAY_N);
                skazyrgpd_display_settings($results);
            ?>
        </div>
        <input type='submit' class='button button-primary' value='Enregistrer les modifications'>
        <h2>Services</h2>
        <div class="skazyrgpd-category">
            <?php 
                $skazyrgpd_db = $wpdb->prefix . "skazyrgpd";
                $results = $wpdb->get_results("SELECT setting_name, setting_description, setting_value, setting_type, setting_select_possible_values FROM $skazyrgpd_db WHERE setting_category='service'", ARRAY_N);
                skazyrgpd_display_settings($results);
            ?>
        </div>
        <input type='submit' class='button button-primary' value='Enregistrer les modifications'>
    </form>
    <h2 style="color: #f00;">Zone (pas très) dangereuse</h2>
    <h4>Ces actions ci-dessous demanderont une confirmation avant d'être exécutées.</h4>
    <p>Applique les paramètres par défaut de la configuration actuelle.</p>
    <input name='reset' class='button' value='Réinitialiser les paramètres' style="border-color: #f00; color: #f00;"><br><br>
    <p>Supprime et crée à nouveau la table qu'utilise le plugin sur la base de données. Permet de charger une nouvelle configuration.</p>
    <input name='db-install' class='button button-primary' value='Installer / Réinitialiser la BDD' style="background-color: #f00; border-color: #f00;">
    <br>
    <?php
    //echo $query; //affiche la requête SQL pour créer la base de données
    ?>
</div>
<script>
    document.querySelector("input[name='reset']").addEventListener("click", function(){
        if(confirm("Vous êtes sur le point de réinitialiser les paramètre à leur valeur d'origine.\n\nVoulez-vous continuer ?")){
            window.location.href = "<?= get_site_url() ?>/wp-admin/admin.php?page=skazyrgpd-admin&reset=true";
        }
    });
    document.querySelector("input[name='db-install']").addEventListener("click", function(){
        if(confirm("Vous êtes sur le point d'installer / de réinitialiser les informations dans la base de donnée du plugin.\n\nVoulez-vous continuer ?")){
            window.location.href = "<?= get_site_url() ?>/wp-admin/admin.php?page=skazyrgpd-admin&db-install=true";
        }
    });
</script>