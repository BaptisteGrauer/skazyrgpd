<?php


/*global $wpdb;
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
$wpdb->query($sql);*/
// Ajoute tous les paramètres dans la bdd
//header("location: skazyrgpd-admin.php");
echo "ok"; 
[
    /*
    [
        "nomDuParamètre"
        "Description du paramètre"
        "Paramètre actuel (valeur par défaut utilisée)"
        "Valeur par défaut"
        "Type de paramètre"
        "Valeurs possibles si type 'select'"
    ]
    */
    [
        "backgroundColor",
        "Couleur de fond du bandeau cookie",
        "#aaaaaa",
        "#aaaaaa",
        "color",
        ""
    ],
    [
        "textColor",
        "Couleur du texte",
        "#000000",
        "#000000",
        "color",
        ""
    ],
    [
        "privacyUrl",
        "URL Politique de confidentialité",
        "" ,
        "", 
        "text", 
        ""
    ],
    [
        "bodyPosition",
        "Position sur le corps de la page",
        "bottom",
        "bottom",
        "select",
        ["top","bottom"]
    ],
    [
        "hashtag",
        "Hashtag (pour ouvrir le panneau)",
        "#tarteaucitron",
        "#tarteaucitron",
        "text", 
        ""
    ],
    [
        "cookieName",
        "Nom du cookie pour stocker les paramètres de tarteaucitron" ,
        "tarteaucitron",
        "tarteaucitron",
        "text",
        ""
    ],
    [
        "orientation",
        "Position du bandeau",
        "middle",
        "middle",
        "select",
        ["top", "bottom", "middle", "popup"]
    ],
    [
        "groupServices",
        "Grouper les service par catégorie",
        "false",
        "false",
        "checkbox",
        ""
    ],
    [
        "serviceDefaultState",
        "Etat par défaut",
        "wait",
        "wait",
        "select",
        ["true", "wait", "false"]
    ],
    [
        "showAlertSmall",
        "Affichages de la petite bannière d'alertes",
        "false",
        "false",
        "checkbox",
        ""
    ],
    [
        "cookieslist ",
        "Affiche la liste des cookies",
        "false",
        "false",
        "checkbox",
        ""
    ],
    [
        "showIcon",
        "Affiche l'icône pour gérer les cookies",
        "true",
        "true",
        "checkbox",
        ""
    ],
    [

        "iconSrc",
        "URL/base64 de l'image (inutilisé)",
        "",
        "",
        "text",
        ""
    ],
    [
        "iconPosition",
        "Position de l'icône",
        "BottomLeft",
        "BottomLeft",
        "select",
        ["TopLeft","TopRight","BottomLeft","BottomRight"]
    ],
    [
        "adblocker",
        "Alerte de détection de bloqueur de pub",
        "false",
        "false",
        "checkbox",
        ""
    ],
    [
        "denyAllCta",
        "Afficher le bouton 'Tout refuser'" ,
        "true",
        "true",
        "checkbox",
        ""
    ],
    [
        "acceptAllCta",
        "Afficher le bouton 'Tout accepter",
        "true",
        "true",
        "checkbox",
        ""
    ],
    [
        "highPrivacy",
        "Activer le consentement automatique",
        "true",
        "true",
        "checkbox",
        ""
    ],
    [
        "handleBrowserDNTRequest",
        "Refuser tout les cookies si requête Do Not Track",
        "false",
        "false",
        "checkbox",
        ""
    ],
    [
        "removeCredit ",
        "Retirer le lien de crédit",
        "false",
        "false",
        "checkbox",
        ""
    ],
    [
        "moreInfoLink",
        "Afficher le lien 'plus d'informations'",
        "true",
        "true",
        "checkbox",
        ""
    ],
    [
        "useExternalCss",
        "Utiliser le CSS externe",
        "false",
        "false",
        "checkbox",
        ""
    ],
    [
        "useExternalJs ",
        "Utiliser le JS externe",
        "false",
        "false",
        "checkbox",
        ""
    ],
    [
        "cookieDomain",
        "Nom de domaine pour les cookies partagés (inutilisé)",
        "",
        "",
        "text",
        ""
    ],
    [
        "readmoreLink",
        "Lien 'voir plus'",
        "",
        "",
        "text",
        ""
    ],
    [
        "mandatory",
        "Afficher le message pour les cookies essentiels",
        "true",
        "true",
        "checkbox",
        ""
    ],
    [
        "mandatoryCta",
        "Afficher le message pour les cookies non-essentiels",
        "true",
        "true",
        "checkbox",
        ""
    ],
];
