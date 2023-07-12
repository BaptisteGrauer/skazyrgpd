<?php

if (isset($_GET['reset'])) {
    skazyrgpd_reset_settings();
}
if (isset($_GET['db-install'])) {
    skazyrgpd_install_db();
}
global $wpdb;
$skazyrgpd_db = $wpdb->prefix . "skazyrgpd";
if ($_SERVER['REQUEST_METHOD'] == "POST") { // MAJ des modifications sur la bdd
    $query = $wpdb->get_results("SELECT setting_name, setting_value FROM $skazyrgpd_db", ARRAY_N);
    foreach ($query as $setting) {
        $name = $setting[0];
        $value = $_POST[$setting[0]];
        $wpdb->get_results("UPDATE $skazyrgpd_db SET setting_value='$value' WHERE setting_name='$name'");
    }
}
function skazyrgpd_display_settings($results)
{ // Prends en paramètre le résultat d'une requête SQL
    foreach ($results as $result) {
        $setting_name = $result[0];
        $setting_description = $result[1];
        $setting_value = $result[2];
        $setting_type = $result[3];
        $setting_select_possible_values = $result[4];
        if ($setting_type == "text") {
            echo "<div><label class='uk-display-block' for='$setting_name'>$setting_description</label>";
            echo "<input type='text' name='$setting_name' value='$setting_value'></div>";
        } elseif ($setting_type == "color") {
            echo "<div><label class='uk-display-block for='$setting_name'>$setting_description</label>";
            echo "<input type='color' name='$setting_name' value='$setting_value'></div>";
        } else if ($setting_type == "select") {
            echo "<div><label class='uk-display-block for='$setting_name'>$setting_description</label>";
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
            echo "</select></div>";
        } else if ($setting_type == "textarea") {
            echo "<div><label class='uk-display-block for='$setting_name'>$setting_description</label>";
            echo "<textarea cols=100 rows=10 name='$setting_name'>$setting_value</textarea></div>";
        } else if ($setting_type == "radio") {
            echo "<div><label class='uk-display-block for='$setting_name'>$setting_description</label><div>";
            if ($setting_value == "true") {
                echo "<input type='radio' name='$setting_name' value='true' checked> <span class='uk-margin-small-right'>Oui</span>";
                echo "<input type='radio' name='$setting_name' value='false'> <span class='uk-margin-small-right'>Non</span></div></div>";
            } else {
                echo "<input type='radio' name='$setting_name' value='true'> <span class='uk-margin-small-right'>Oui</span>";
                echo "<input type='radio' name='$setting_name' value='false' checked> <span class='uk-margin-small-right'>Non</span></div></div>";
            }
        }
        echo "<br>";
    }
}
function skazyrgpd_reset_settings()
{ // Change tout les champs avec leur valeur par défaut
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
function skazyrgpd_install_db()
{ // Supprime et recrée la table {préfixe}skazyrgpd
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
                "Catégorie d'affichage dans l'admin"
            ]
            */
            [
                "backgroundColor",
                "Couleur de fond du bandeau cookie.",
                "#aaaaaa",
                "#aaaaaa",
                "color",
                "",
                "apparence",
                "général"
            ],
            [
                "textColor",
                "Couleur du texte du bandeau cookie.",
                "#000000",
                "#000000",
                "color",
                "",
                "apparence",
                "général"
            ],
            [
                "privacyUrl",
                "URL de la politique de confidentialité.",
                "",
                "",
                "text",
                "",
                "général",
                "général"
            ],
            [
                "bodyPosition",
                "Position sur le corps de la page HTML (body).",
                "bottom",
                "bottom",
                "select",
                ["top", "bottom"],
                "général",
                "avancé"
            ],
            [
                "hashtag",
                "ID CSS du bandeau.",
                "#tarteaucitron",
                "#tarteaucitron",
                "text",
                "",
                "général",
                "avancé"
            ],
            [
                "cookieName",
                "Nom du cookie pour stocker les paramètres de tarteaucitron.",
                "tarteaucitron",
                "tarteaucitron",
                "text",
                "",
                "général",
                "avancé"
            ],
            [
                "orientation",
                "Position du bandeau sur la page.",
                "middle",
                "middle",
                "select",
                ["top", "bottom", "middle", "popup"],
                "général",
                "général"
            ],
            [
                "groupServices",
                "Grouper les services par catégorie dans le bandeau.",
                "false",
                "false",
                "radio",
                "",
                "général",
                "avancé"
            ],
            [
                "serviceDefaultState",
                "État d'activation des services par défaut ('wait' pour demander à l'utilisateur').",
                "wait",
                "wait",
                "select",
                ["true", "wait", "false"],
                "général",
                "avancé"
            ],
            [
                "showAlertSmall",
                "Afficher de la petite bannière d'alertes (en bas à droite de la page).",
                "false",
                "false",
                "radio",
                "",
                "général",
                "avancé"
            ],
            [
                "cookiesList",
                "Afficher la liste des cookies.",
                "true",
                "true",
                "radio",
                "",
                "général",
                "avancé"
            ],
            [
                "showIcon",
                "Afficher l'icône pour faire apparaître le bandeau.",
                "true",
                "true",
                "radio",
                "",
                "général",
                "avancé"
            ],
            [

                "iconSrc",
                "URL de l'icône cookie.",
                "/wp-content/plugins/skazy-rgpd/cookie.png",
                "/wp-content/plugins/skazy-rgpd/cookie.png",
                "text",
                "",
                "général",
                "avancé"
            ],
            [
                "iconPosition",
                "Position de l'icône sur la page.",
                "BottomLeft",
                "BottomLeft",
                "select",
                ["TopLeft", "TopRight", "BottomLeft", "BottomRight"],
                "général",
                "avancé"
            ],
            [
                "adblocker",
                "Afficher une alerte si un bloqueur de publicité est détecté.",
                "false",
                "false",
                "radio",
                "",
                "général",
                "avancé"
            ],
            [
                "denyAllCta",
                "Afficher le bouton 'Tout refuser' sur le bandeau.",
                "true",
                "true",
                "radio",
                "",
                "général",
                "avancé"
            ],
            [
                "acceptAllCta",
                "Afficher le bouton 'Tout accepter' sur le bandeau.",
                "true",
                "true",
                "radio",
                "",
                "général",
                "avancé"
            ],
            [
                "highPrivacy",
                "Désactiver l'auto-consentement/activation des services après être descendu sur la page.",
                "true",
                "true",
                "radio",
                "",
                "général",
                "avancé"
            ],
            [
                "handleBrowserDNTRequest",
                "Refuser automatiquement tout les cookies si les navigateurs envoient une requête 'Do Not Track'.",
                "false",
                "false",
                "radio",
                "",
                "général",
                "avancé"
            ],
            [
                "removeCredit",
                "Retirer le lien menant vers <a href='https://tarteaucitron.io'>tarteaucitron.io</a>.",
                "true",
                "true",
                "radio",
                "",
                "général",
                "avancé"
            ],
            [
                "moreInfoLink",
                "Afficher le lien 'plus d'informations'.",
                "false",
                "false",
                "radio",
                "",
                "général",
                "avancé"
            ],
            [
                "useExternalCss",
                "Utiliser une feuille de style CSS externe.",
                "false",
                "false",
                "radio",
                "",
                "général",
                "avancé"
            ],
            [
                "useExternalJs",
                "Utiliser un script JS externe",
                "false",
                "false",
                "radio",
                "",
                "général",
                "avancé"
            ],
            [
                "cookieDomain",
                "Nom de domaine (pour l'utilisation des cookies partagés).",
                "",
                "",
                "text",
                "",
                "général",
                "avancé"
            ],
            [
                "readmoreLink",
                "URL du lien 'Voir plus'.",
                "",
                "",
                "text",
                "",
                "général",
                "avancé"
            ],
            [
                "mandatory",
                "Afficher les cookies essentiels.",
                "true",
                "true",
                "radio",
                "",
                "général",
                "avancé"
            ],
            [
                "mandatoryCta",
                "Afficher le bouton 'accepter' désactivé quands les cookies essentiels sont affichés.",
                "true",
                "true",
                "radio",
                "",
                "général",
                "avancé"
            ],
            [
                "googleTagManagerEnabled",
                "Utiliser Google Tag Manager",
                "false",
                "false",
                "radio",
                "",
                "service",
                "service"
            ],
            [
                "googleTagManager",
                "Google Tag Manager",
                "GTM-XXXX",
                "GTM-XXXX",
                "text",
                "",
                "service",
                "service"
            ],
            [
                "googleAnalyticsEnabled",
                "Utiliser Google Analytics",
                "false",
                "false",
                "radio",
                "",
                "service",
                "service"
            ],
            [
                "googleAnalytics",
                "Google Analytics",
                "UA-XXXXXXXX-X",
                "UA-XXXXXXXX-X",
                "text",
                "",
                "service",
                "service"
            ],
            [
                "matomoEnabled",
                "Utiliser Matomo",
                "false",
                "false",
                "radio",
                "",
                "service",
                "service"
            ],
            [
                "matomoId",
                "Matomo ID",
                "SITE_ID",
                "SITE_ID",
                "text",
                "",
                "service",
                "service"
            ],
            [
                "matomoUrl",
                "Matomo URL",
                "matomotUrl",
                "matomotUrl",
                "text",
                "",
                "service",
                "service"
            ],
            [
                "matomoJsPath",
                "Matomo chemin JS",
                "JS_PATH",
                "JS_PATH",
                "text",
                "",
                "service",
                "service"
            ],
            [
                "zopimEnabled",
                "Utiliser Zopim",
                "false",
                "false",
                "radio",
                "",
                "service",
                "service"
            ],
            [
                "zopim",
                "Zopim ID",
                "zopim_id",
                "zopim_id",
                "text",
                "",
                "service",
                "service"
            ],
            [
                "youtubeEnabled",
                "Utiliser YouTube",
                "false",
                "false",
                "radio",
                "",
                "service",
                "service"
            ],
            [
                "youtubeApiEnabled",
                "Utiliser YouTube API",
                "false",
                "false",
                "radio",
                "",
                "service",
                "service"
            ],
            [
                "vimeoEnabled",
                "Utiliser Vimeo",
                "false",
                "false",
                "radio",
                "",
                "service",
                "service"
            ],
            [
                "facebookLikeboxEnabled",
                "Utiliser Facebook Likebox",
                "false",
                "false",
                "radio",
                "",
                "service",
                "service"
            ],
            [
                "facebookChatEnabled",
                "Utiliser Facebook Chat",
                "false",
                "false",
                "radio",
                "",
                "service",
                "service"
            ],
            [
                "facebookChatId",
                "Facebook app ID",
                "ID",
                "ID",
                "text",
                "",
                "service",
                "service"
            ],
            [
                "googleMapsEnabled",
                "Utiliser Google Maps",
                "false",
                "false",
                "radio",
                "",
                "service",
                "service"
            ],
            [
                "googleMapsID",
                "Google Maps ID",
                "API KEY",
                "API KEY",
                "text",
                "",
                "service",
                "service"
            ],
            [
                "googleMapsIFrameEnabled",
                "Utiliser Google Maps IFrame",
                "false",
                "false",
                "radio",
                "",
                "service",
                "service"
            ],
            [
                "googleMapsSnazzyEnabled",
                "Utiliser Google Maps via Snazzy Maps",
                "false",
                "false",
                "radio",
                "",
                "service",
                "service"
            ],
            [
                "googleMapsSnazzyID",
                "Snazzy Maps ID",
                "ID",
                "ID",
                "text",
                "",
                "service",
                "service"
            ],
            [
                "googleMapsMapBoxEnabled",
                "Utiliser Google Maps via MapBox",
                "false",
                "false",
                "radio",
                "",
                "service",
                "service"
            ],
            [
                "googleMapsMapBoxToken",
                "Token d'accès MapBox",
                "token",
                "token",
                "text",
                "",
                "service",
                "service"
            ],
            [
                "googleMapsMapBoxJs",
                "JS personnalisé MapBox",
                "js",
                "js",
                "text",
                "",
                "service",
                "service"
            ],
            [
                "addCustomJsEnabled",
                "Utiliser du JS personnalisé pour ajouter des services",
                "false",
                "false",
                "radio",
                "",
                "service",
                "service"
            ],
            [
                "addCustomJs",
                "JS personnalisé pour ajouter des services (sans balise script)",
                "",
                "",
                "textarea",
                "",
                "service",
                "service"
            ]
        ];
    global $wpdb;
    $skazyrgpd_db = $wpdb->prefix . "skazyrgpd";
    // Supprime la table dans la BDD
    $wpdb->query("DROP TABLE IF EXISTS $skazyrgpd_db");
    // Crée la table dans la BDD de wordpress
    $charset_collate = $wpdb->get_charset_collate();
    $sql = $wpdb->get_results("CREATE TABLE IF NOT EXISTS $skazyrgpd_db (
        id INT(100) NOT NULL AUTO_INCREMENT,
        setting_name TEXT NOT NULL,
        setting_description TEXT NOT NULL,
        setting_value TEXT NOT NULL,
        setting_default_value TEXT NOT NULL,
        setting_type TEXT NOT NULL,
        setting_select_possible_values TEXT,
        setting_category TEXT NOT NULL,
        setting_admin_display TEXT NOT NULL,
        PRIMARY KEY  (id)
        ) $charset_collate ;");
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    // Insère les valeurs par défaut dans la BDD
    $query = "INSERT INTO $skazyrgpd_db 
    (setting_name, setting_description, setting_value, setting_default_value, setting_type, setting_select_possible_values, setting_category, setting_admin_display) 
    VALUES ";
    foreach ($Settings as $setting) {
        $settingName = $setting[0];
        $settingDesc = $setting[1];
        $settingVal = $setting[2];
        $settingDef = $setting[3];
        $settingType = $setting[4];
        $settingSelect = $setting[5];
        $settingCategory = $setting[6];
        $settingAdminDisplay = $setting[7];
        $value = "(\"$settingName\", \"$settingDesc\", \"$settingVal\", \"$settingDef\", \"$settingType\", ";
        if (gettype($settingSelect) == "array") {
            $settingPossibleVals = "[";
            for ($i = 0; $i < count($settingSelect); $i++) {
                if (isset($settingSelect[$i + 1])) {
                    $settingPossibleVals .= "'" . $settingSelect[$i] . "', ";
                } else {
                    $settingPossibleVals .= "'" . $settingSelect[$i] . "'";
                }
            }
            $settingPossibleVals .= "]";
            $value .= "\"$settingPossibleVals\", \"$settingCategory\",\"$settingAdminDisplay\")";
        } else {
            $value .= "\"\", \"$settingCategory\",\"$settingAdminDisplay\")";
        }
        $values[] = $value;
    }
    $query .= implode(", ", $values) . ";";
    $wpdb->query($query);
    echo "<script> window.history.replaceState({}, document.title, '/' + 'wp-admin/admin.php?page=skazyrgpd-admin');
    //location.reload(true);</script>";
}
?>
<div class="wrap">
    <h1>Paramètres Tarteaucitron</h1>
    <form method="post" action="<?php echo "admin.php?page=skazyrgpd-admin" ?>">
        <ul uk-accordion="multiple: true">
            <li class="uk-open">
                <a class="uk-accordion-title uk-card uk-card-body uk-card-default uk-card-small" href="#">Général</a>
                <div class="uk-accordion-content uk-card uk-card-body uk-card-default uk-card-small">
                    <div class="skazyrgpd-category">
                        <?php
                        $skazyrgpd_db = $wpdb->prefix . "skazyrgpd";
                        $results = $wpdb->get_results("SELECT setting_name, setting_description, setting_value, setting_type, setting_select_possible_values FROM $skazyrgpd_db WHERE setting_admin_display='général'", ARRAY_N);
                        skazyrgpd_display_settings($results);
                        ?>
                        <input type="submit" class="button button-primary" value="Enregistrer les modifications">
                    </div>
                </div>
            </li>
            <li>
                <a class="uk-accordion-title uk-card uk-card-body uk-card-default uk-card-small" href="#">Avancé</a>
                <div class="uk-accordion-content uk-card uk-card-body uk-card-default uk-card-small">
                    <div class="skazyrgpd-category">
                        <?php
                        $skazyrgpd_db = $wpdb->prefix . "skazyrgpd";
                        $results = $wpdb->get_results("SELECT setting_name, setting_description, setting_value, setting_type, setting_select_possible_values FROM $skazyrgpd_db WHERE setting_admin_display='avancé'", ARRAY_N);
                        skazyrgpd_display_settings($results);
                        ?>
                        <input type="submit" class="button button-primary" value="Enregistrer les modifications">
                    </div>
                </div>
            </li>
            <li>
                <a class="uk-accordion-title uk-card uk-card-body uk-card-default uk-card-small" href="#">Services</a>
                <div class="uk-accordion-content uk-card uk-card-body uk-card-default uk-card-small">
                    <div class="skazyrgpd-category">
                        <?php
                        $skazyrgpd_db = $wpdb->prefix . "skazyrgpd";
                        $results = $wpdb->get_results("SELECT setting_name, setting_description, setting_value, setting_type, setting_select_possible_values FROM $skazyrgpd_db WHERE setting_admin_display='service'", ARRAY_N);
                        skazyrgpd_display_settings($results);
                        ?>
                        <input type="submit" class="button button-primary" value="Enregistrer les modifications">
                    </div>
                </div>
            </li>
            <li>
                <a class="uk-accordion-title uk-card uk-card-body uk-card-default uk-card-small" href="#">Paramètres plugin</a>
                <div class="uk-accordion-content uk-card uk-card-body uk-card-default uk-card-small">
                    <h5>Ces actions ci-dessous demanderont une confirmation avant d'être exécutées.</h5>
                    <p>Applique les paramètres par défaut de la configuration actuelle.</p>
                    <input name='reset' class='button' value='Réinitialiser les paramètres'
                        style="border-color: #f00; color: #f00; text-align:center;"><br><br>
                    <p>Supprime et crée à nouveau la table qu'utilise le plugin sur la base de données. Permet de
                        charger une nouvelle configuration.</p>
                    <input name='db-install' class='button button-primary' value='Installer / Réinitialiser la BDD'
                        style="background-color: #f00; border-color: #f00; text-align:center;">
                </div>
            </li>
        </ul>
        <input type="submit" class="button button-primary" value="Enregistrer les modifications">
    </form>
</div>
<script>
    document.querySelector("input[name='reset']").addEventListener("click", function () {
        if (confirm("Vous êtes sur le point de réinitialiser les paramètre à leur valeur d'origine.\n\nVoulez-vous continuer ?")) {
            window.location.href = "<?= get_site_url() ?>/wp-admin/admin.php?page=skazyrgpd-admin&reset=true";
        }
    });
    document.querySelector("input[name='db-install']").addEventListener("click", function () {
        if (confirm("Vous êtes sur le point d'installer / de réinitialiser les informations dans la base de donnée du plugin.\n\nVoulez-vous continuer ?")) {
            window.location.href = "<?= get_site_url() ?>/wp-admin/admin.php?page=skazyrgpd-admin&db-install=true";
        }
    });
</script>