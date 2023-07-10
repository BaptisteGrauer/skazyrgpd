<?php 

// Paramètres actuels

$tarteaucitron_privacyUrl = "https://skazy.nc/protection-des-donnees"; // string -> URL personnalisée
$tarteaucitron_bodyPosition = "bottom"; // string -> top, bottom
$tarteaucitron_hashtag = "#tarteaucitron"; // string -> # personnalisé
$tarteaucitron_cookieName = "mag-skazy"; // string -> nom du cookie
$tarteaucitron_orientation = "middle"; // string -> top, bottom, middle, popup
$tarteaucitron_groupServices = "false"; // bool
$tarteaucitron_serviceDefaultState = "wait"; // bool, string -> true, wait, false
$tarteaucitron_showAlertSmall = "false"; // bool
$tarteaucitron_cookieslist = "false"; // bool
$tarteaucitron_showIcon = "true"; // bool
$tarteaucitron_iconSrc = ""; // bool
$tarteaucitron_iconPosition = "BottomLeft"; // string -> TopLeft, TopRight, BottomLeft, BottomRight
$tarteaucitron_adblocker = "false"; // bool
$tarteaucitron_denyAllCta = "true"; // bool
$tarteaucitron_acceptAllCta = "true"; // bool
$tarteaucitron_highPrivacy = "true"; // bool
$tarteaucitron_handleBrowserDNTRequest = "false"; // bool
$tarteaucitron_removeCredit = "false"; // bool
$tarteaucitron_moreInfoLink = "true"; // bool
$tarteaucitron_useExternalCss = "false"; // bool
$tarteaucitron_useExternalJs = "false"; // bool
$tarteaucitron_cookieDomain = ""; // string -> nom de domaine personnalisé
$tarteaucitron_readmoreLink = ""; // string -> page en savoir plus personnalisé
$tarteaucitron_mandatory = "true"; // bool
$tarteaucitron_mandatoryCta = "true"; // bool

// Affichage des paramètres sur l'admin

$SettingsTo = [
    "URL Politique de confidentialité" => $tarteaucitron_privacyUrl,
    "Position sur le corps de la page" => $tarteaucitron_bodyPosition,
    "Hashtag (pour ouvrir le panneau)" => $tarteaucitron_hashtag,
    "Nom du cookie pour stocker les paramètres de tarteaucitron" => $tarteaucitron_cookieName,
    "Position du bandeau" => $tarteaucitron_orientation,
    "Grouper les service par catégorie" => $tarteaucitron_groupServices,
    "Etat par défaut" => $tarteaucitron_serviceDefaultState,
    "Affichages de la petite bannière d'alertes" => $tarteaucitron_showAlertSmall,
    "Affiche la liste des cookies" => $tarteaucitron_cookieslist,
    "Affiche l'icône pour gérer les cookies" => $tarteaucitron_showIcon,
    "URL/base64 de l'image (inutilisé)" => $tarteaucitron_iconSrc,
    "Position de l'icône" => $tarteaucitron_iconPosition,
    "Alerte de détection de bloqueur de pub" => $tarteaucitron_adblocker,
    "Afficher le bouton 'Tout refuser'" => $tarteaucitron_denyAllCta,
    "Afficher le bouton 'Tout accepter" => $tarteaucitron_acceptAllCta,
    "Activer le consentement automatique" => $tarteaucitron_highPrivacy,
    "Refuser tout les cookies si requête Do Not Track" => $tarteaucitron_handleBrowserDNTRequest,
    "Retirer le lien de crédit" => $tarteaucitron_removeCredit,
    "Afficher le lien 'plus d'informations'" => $tarteaucitron_moreInfoLink,
    "Utiliser le CSS externe" => $tarteaucitron_useExternalCss,
    "Utiliser le JS externe" => $tarteaucitron_useExternalJs,
    "Nom de domaine pour les cookies partagés (inutilisé)" => $tarteaucitron_cookieDomain,
    "Lien 'voir plus'" => $tarteaucitron_readmoreLink,
    "Afficher le message pour les cookies essentiels" => $tarteaucitron_mandatory,
    "Afficher le message pour les cookies non-essentiels" => $tarteaucitron_mandatoryCta];

// Affichage des paramètres par défaut

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
                    "Position sur le corps de la page",
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
                    "checkbox",
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
                    "checkbox",
                    "",
                    "général"
                ],
                [
                    "cookieslist ",
                    "Affiche la liste des cookies",
                    "false",
                    "false",
                    "checkbox",
                    "",
                    "général"
                ],
                [
                    "showIcon",
                    "Affiche l'icône pour gérer les cookies",
                    "true",
                    "true",
                    "checkbox",
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
                    "checkbox",
                    "",
                    "général"
                ],
                [
                    "denyAllCta",
                    "Afficher le bouton 'Tout refuser'" ,
                    "true",
                    "true",
                    "checkbox",
                    "",
                    "général"
                ],
                [
                    "acceptAllCta",
                    "Afficher le bouton 'Tout accepter",
                    "true",
                    "true",
                    "checkbox",
                    "",
                    "général"
                ],
                [
                    "highPrivacy",
                    "Activer le consentement automatique",
                    "true",
                    "true",
                    "checkbox",
                    "",
                    "général"
                ],
                [
                    "handleBrowserDNTRequest",
                    "Refuser tout les cookies si requête Do Not Track",
                    "false",
                    "false",
                    "checkbox",
                    "",
                    "général"
                ],
                [
                    "removeCredit ",
                    "Retirer le lien de crédit",
                    "false",
                    "false",
                    "checkbox",
                    "",
                    "général"
                ],
                [
                    "moreInfoLink",
                    "Afficher le lien 'plus d'informations'",
                    "true",
                    "true",
                    "checkbox",
                    "",
                    "général"
                ],
                [
                    "useExternalCss",
                    "Utiliser le CSS externe",
                    "false",
                    "false",
                    "checkbox",
                    "",
                    "général"
                ],
                [
                    "useExternalJs ",
                    "Utiliser le JS externe",
                    "false",
                    "false",
                    "checkbox",
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
                    "checkbox",
                    "",
                    "général"
                ],
                [
                    "mandatoryCta",
                    "Afficher le message pour les cookies non-essentiels",
                    "true",
                    "true",
                    "checkbox",
                    "",
                    "général"
                ],
            ];

            

global $wpdb;
$skazyrgpd_db = $wpdb->prefix . "skazyrgpd";
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