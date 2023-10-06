<?php


/*---------------------------------------------------------- Catégories ----------------------------------------------------------*/

/*---------------------------------------------------------- Liste des catégories/sections ----------------------------------------------------------*/

$sections =
    [
        /*[
            // Exemple de catégorie
            "id" => "Nom de la catégorie",
            "title" => "Titre de la catégorie",
            "callback" => "Fonction à rappeler",
            "page" => "Page sur laquelle afficher les paramètres"
        ]*/
        [
            "id" => "skazyrgpd_section_general",
            "title" => "Général",
            "callback" => "skazyrgpd_section_general_render",
            "page" => "skazyrgpd-admin"
        ] ,
        [
            "id" => "skazyrgpd_section_advanced",
            "title" => "Avancé",
            "callback" => "skazyrgpd_section_advanced_render",
            "page" => "skazyrgpd-admin"
        ],
        [
            "id" => "skazyrgpd_section_services",
            "title" => "Services",
            "callback" => "skazyrgpd_section_services_render",
            "page" => "skazyrgpd-admin"
        ],
        [
            "id" => "skazyrgpd_section_langage",
            "title" => "Langage",
            "callback" => "skazyrgpd_section_langage_render",
            "page" => "skazyrgpd-admin"
        ]
    ];

/*---------------------------------------------------------- Fonctions des catégories ----------------------------------------------------------*/

// Permet d'afficher des descriptions juste en dessous des titres des catégories
// Ces fonctions sont nécessaires mais ne font rien pour le moment et ne sont pas appelées
// Elle le sont quand do_settings_section(  ) est utilisé

function skazyrgpd_section_general_render()
{
    echo 'Paramètres généraux';
}
function skazyrgpd_section_advanced_render()
{
    echo 'Paramètres avancés';
}
function skazyrgpd_section_services_render()
{
    echo 'Paramètres de services';
}
function skazyrgpd_section_langage_render()
{
    echo 'Paramètres de langue';
}

/*---------------------------------------------------------- Paramètres ----------------------------------------------------------*/

/*---------------------------------------------------------- Liste complète des paramètres ----------------------------------------------------------*/

$settings =
    [
        /*
        [
            // Exemple de paramètre
            "id" => "Id du paramètre",
            "description" => "Description/label du paramètre",
            "section" => "Catégorie du paramètre",
            "callback" => "Fonction à appeler pour afficher les champs",
        ]*/
        [
            "id" => "backgroundColor",
            "section" => "skazyrgpd_section_general",
            "callback" => "backgroundColor_render",
            "page" => "skazyrgpd-admin"
        ],
        [
            "id" => "textColor",
            "section" => "skazyrgpd_section_general",
            "callback" => "textColor_render",
            "page" => "skazyrgpd-admin"
        ],
        [
            "id" => "privacyUrl",
            "section" => "skazyrgpd_section_general",
            "callback" => "privacyUrl_render",
            "page" => "skazyrgpd-admin"
        ],
        [
            "id" => "bodyPosition",
            "section" => "skazyrgpd_section_advanced",
            "callback" => "bodyPosition_render",
            "page" => "skazyrgpd-admin"
        ],
        [
            "id" => "hashtag",
            "section" => "skazyrgpd_section_advanced",
            "callback" => "hashtag_render",
            "page" => "skazyrgpd-admin"
        ],
        [
            "id" => "cookieName",
            "section" => "skazyrgpd_section_advanced",
            "callback" => "cookieName_render",
            "page" => "skazyrgpd-admin"
        ],
        [
            "id" => "orientation",
            "section" => "skazyrgpd_section_general",
            "callback" => "orientation_render",
            "page" => "skazyrgpd-admin"
        ],
        [
            "id" => "groupServices",
            "section" => "skazyrgpd_section_advanced",
            "callback" => "groupServices_render",
            "page" => "skazyrgpd-admin"
        ],
        [
            "id" => "serviceDefaultState",
            "section" => "skazyrgpd_section_advanced",
            "callback" => "serviceDefaultState_render",
            "page" => "skazyrgpd-admin"
        ],
        [
            "id" => "showAlertSmall",
            "section" => "skazyrgpd_section_advanced",
            "callback" => "showAlertSmall_render",
            "page" => "skazyrgpd-admin"
        ],
        [
            "id" => "cookiesList",
            "section" => "skazyrgpd_section_advanced",
            "callback" => "cookiesList_render",
            "page" => "skazyrgpd-admin"
        ],
        [
            "id" => "showIcon",
            "section" => "skazyrgpd_section_advanced",
            "callback" => "showIcon_render",
            "page" => "skazyrgpd-admin"
        ],
        [
            "id" => "iconSrc",
            "section" => "skazyrgpd_section_advanced",
            "callback" => "iconSrc_render",
            "page" => "skazyrgpd-admin"
        ],
        [
            "id" => "iconPosition",
            "section" => "skazyrgpd_section_advanced",
            "callback" => "iconPosition_render",
            "page" => "skazyrgpd-admin"
        ],
        [
            "id" => "adblocker",
            "section" => "skazyrgpd_section_advanced",
            "callback" => "adblocker_render",
            "page" => "skazyrgpd-admin"
        ],
        [
            "id" => "denyAllCta",
            "section" => "skazyrgpd_section_advanced",
            "callback" => "denyAllCta_render",
            "page" => "skazyrgpd-admin"
        ],
        [
            "id" => "acceptAllCta",
            "section" => "skazyrgpd_section_advanced",
            "callback" => "acceptAllCta_render",
            "page" => "skazyrgpd-admin"
        ],
        [
            "id" => "highPrivacy",
            "section" => "skazyrgpd_section_advanced",
            "callback" => "highPrivacy_render",
            "page" => "skazyrgpd-admin"
        ],
        [
            "id" => "handleBrowserDNTRequest",
            "section" => "skazyrgpd_section_advanced",
            "callback" => "handleBrowserDNTRequest_render",
            "page" => "skazyrgpd-admin"
        ],
        [
            "id" => "removeCredit",
            "section" => "skazyrgpd_section_advanced",
            "callback" => "removeCredit_render",
            "page" => "skazyrgpd-admin"
        ],
        [
            "id" => "moreInfoLink",
            "section" => "skazyrgpd_section_advanced",
            "callback" => "moreInfoLink_render",
            "page" => "skazyrgpd-admin"
        ],
        [
            "id" => "useExternalCss",
            "section" => "skazyrgpd_section_advanced",
            "callback" => "useExternalCss_render",
            "page" => "skazyrgpd-admin"
        ],
        [
            "id" => "useExternalJs",
            "section" => "skazyrgpd_section_advanced",
            "callback" => "useExternalJs_render",
            "page" => "skazyrgpd-admin"
        ],
        [
            "id" => "cookieDomain",
            "section" => "skazyrgpd_section_advanced",
            "callback" => "cookieDomain_render",
            "page" => "skazyrgpd-admin"
        ],
        [
            "id" => "readmoreLink",
            "section" => "skazyrgpd_section_advanced",
            "callback" => "readmoreLink_render",
            "page" => "skazyrgpd-admin"
        ],
        [
            "id" => "mandatory",
            "section" => "skazyrgpd_section_advanced",
            "callback" => "mandatory_render",
            "page" => "skazyrgpd-admin"
        ],
        [
            "id" => "mandatoryCta",
            "section" => "skazyrgpd_section_advanced",
            "callback" => "mandatoryCta_render",
            "page" => "skazyrgpd-admin"
        ],
        [
            "id" => "languages",
            "section" => "skazyrgpd_section_langage",
            "callback" => "languages_render",
            "page" => "skazyrgpd-admin"
        ],
        [
            "id" => "googleTagManagerEnabled",
            "section" => "skazyrgpd_section_services",
            "callback" => "googleTagManagerEnabled_render",
            "page" => "skazyrgpd-admin"
        ],
        [
            "id" => "gtmId",
            "section" => "skazyrgpd_section_services",
            "callback" => "googleTagManager_render",
            "page" => "skazyrgpd-admin"
        ],
        [
            "id" => "googleAnalyticsEnabled",
            "section" => "skazyrgpd_section_services",
            "callback" => "googleAnalyticsEnabled_render",
            "page" => "skazyrgpd-admin"
        ],
        [
            "id" => "gajsUa",
            "section" => "skazyrgpd_section_services",
            "callback" => "googleAnalytics_render",
            "page" => "skazyrgpd-admin"
        ],
        [
            "id" => "matomoCloudEnabled",
            "section" => "skazyrgpd_section_services",
            "callback" => "matomoCloudEnabled_render",
            "page" => "skazyrgpd-admin"
        ],
        [
            "id" => "matomoId",
            "section" => "skazyrgpd_section_services",
            "callback" => "matomoId_render",
            "page" => "skazyrgpd-admin"
        ],
        [
            "id" => "zopimEnabled",
            "section" => "skazyrgpd_section_services",
            "callback" => "zopimEnabled_render",
            "page" => "skazyrgpd-admin"
        ],
        [
            "id" => "zopimId",
            "section" => "skazyrgpd_section_services",
            "callback" => "zopim_render",
            "page" => "skazyrgpd-admin"
        ],
        [
            "id" => "youtubeEnabled",
            "section" => "skazyrgpd_section_services",
            "callback" => "youtubeEnabled_render",
            "page" => "skazyrgpd-admin"
        ],
        [
            "id" => "youtubeApiEnabled",
            "section" => "skazyrgpd_section_services",
            "callback" => "youtubeApiEnabled_render",
            "page" => "skazyrgpd-admin"
        ],
        [
            "id" => "vimeoEnabled",
            "section" => "skazyrgpd_section_services",
            "callback" => "vimeoEnabled_render",
            "page" => "skazyrgpd-admin"
        ],
        [
            "id" => "facebookLikeboxEnabled",
            "section" => "skazyrgpd_section_services",
            "callback" => "facebookLikeboxEnabled_render",
            "page" => "skazyrgpd-admin"
        ],
        [
            "id" => "facebookChatEnabled",
            "section" => "skazyrgpd_section_services",
            "callback" => "facebookChatEnabled_render",
            "page" => "skazyrgpd-admin"
        ],
        [
            "id" => "facebookChatId",
            "section" => "skazyrgpd_section_services",
            "callback" => "facebookChatId_render",
            "page" => "skazyrgpd-admin"
        ],
        [
            "id" => "googleMapsEnabled",
            "section" => "skazyrgpd_section_services",
            "callback" => "googleMapsEnabled_render",
            "page" => "skazyrgpd-admin"
        ],
        [
            "id" => "googleMapsID",
            "section" => "skazyrgpd_section_services",
            "callback" => "googleMapsID_render",
            "page" => "skazyrgpd-admin"
        ]
    ];

/*---------------------------------------------------------- Paramètres par défaut ----------------------------------------------------------*/

$defaults =
    [
        "backgroundColor" => "#aaaaaa",
        "textColor" => "#ffffff",
        "privacyUrl" => "",
        "bodyPosition" => "top",
        "hashtag" => "#tarteaucitron",
        "cookieName" => "tarteaucitron",
        "orientation" => "middle",
        "groupServices" => "false",
        "serviceDefaultState" => "wait",
        "showAlertSmall" => "false",
        "cookiesList" => "true",
        "showIcon" => "true",
        "iconSrc" => "/wp-content/plugins/skazy-rgpd/includes/cookie.png",
        "iconPosition" => "BottomLeft",
        "adblocker" => "false",
        "denyAllCta" => "true",
        "acceptAllCta" => "true",
        "highPrivacy" => "true",
        "handleBrowserDNTRequest" => "false",
        "removeCredit" => "true",
        "moreInfoLink" => "false",
        "useExternalCss" => "false",
        "useExternalJs" => "false",
        "cookieDomain" => "",
        "readmoreLink" => "",
        "mandatory" => "true",
        "mandatoryCta" => "true",
        "languages" => '"alertBigPrivacy":"Des cookies sont utilisés pour conserver vos informations de connexion et réaliser des statistiques en vue d’optimiser les services du site et d’adapter nos contenus et nos campagnes publicitaires pour personnaliser et améliorer votre expérience. Pour en savoir plus, consultez la politique de confidentialité.","alertBig":"Des cookies sont utilisés pour conserver vos informations de connexion et réaliser des statistiques en vue d’optimiser les services du site et d’adapter nos contenus et nos campagnes publicitaires pour personnaliser et améliorer votre expérience. Pour en savoir plus, consultez la politique de confidentialité.","acceptAll":"Accepter","allowAll":"Accepter","denyAll":"Refuser","middleBarHead":"Utilisation des cookies","close":"×","title":"Gestion des Cookies"',
        "googleTagManagerEnabled" => "false",
        "gtmId" => "",
        "googleAnalyticsEnabled" => "false",
        "gajsUa" => "",
        "matomoCloudEnabled" => "false",
        "matomoId" => "",
        "zopimEnabled" => "false",
        "zopimId" => "",
        "youtubeEnabled" => "false",
        "youtubeApiEnabled" => "false",
        "vimeoEnabled" => "false",
        "facebookLikeboxEnabled" => "false",
        "facebookChatEnabled" => "false",
        "facebookChatId" => "",
        "googleMapsEnabled" => "false",
        "googleMapsID" => "",
    ];

/*---------------------------------------------------------- Affichages des champs ----------------------------------------------------------*/

function backgroundColor_render()
{
    $option = get_option('skazyrgpd_settings');
    ?>
    <label class='uk-margin-small uk-display-block'>Couleur principale (bordure, fond) du bandeau cookie : </label>
    <input name="skazyrgpd_settings[backgroundColor]" type="color" value="<?php echo $option['backgroundColor']; ?>" />
    <?php
}
function textColor_render()
{
    $option = get_option('skazyrgpd_settings');
    ?><label class='uk-margin-small uk-display-block'>Couleur secondaire (texte) du bandeau cookie : </label>
    <input name="skazyrgpd_settings[textColor]" type="color" value="<?php echo $option['textColor'] ?>" />
    <?php
}
function privacyUrl_render()
{
    $option = get_option('skazyrgpd_settings');
    ?>
    <label class='uk-margin-small uk-display-block'>URL de la politique de confidentialité : </label>
    <input name="skazyrgpd_settings[privacyUrl]" type="text" value="<?php echo $option['privacyUrl'] ?>" placeholder="URL politique de confidentialité" />
    <?php
}
function bodyPosition_render()
{
    $option = get_option('skazyrgpd_settings');
    ?>
    <label class='uk-margin-small uk-display-block'>Position sur le corps de la page HTML (body) : </label>
    <select name="skazyrgpd_settings[bodyPosition]">
        <option value="top" <?php selected($option['bodyPosition'], "top") ?>>Haut</option>
        <option value="bottom" <?php selected($option['bodyPosition'], "bottom") ?>>Bas</option>
    </select>
    <?php
}
function hashtag_render()
{
    $option = get_option('skazyrgpd_settings');
    ?>
    <label class='uk-margin-small uk-display-block'>ID CSS du bandeau : </label>
    <input name="skazyrgpd_settings[hashtag]" type="text" value="<?php echo $option['hashtag'] ?>" placeholder="ID CSS" />
    <?php
}
function cookieName_render()
{
    $option = get_option('skazyrgpd_settings');
    ?>
    <label class='uk-margin-small uk-display-block'>Nom du cookie pour stocker les paramètres de tarteaucitron : </label>
    <input name="skazyrgpd_settings[cookieName]" type="text" value="<?php echo $option['cookieName'] ?>" placeholder="Nom du cookie" />
    <?php
}
function orientation_render()
{
    $option = get_option('skazyrgpd_settings');
    ?>
    <label class='uk-margin-small uk-display-block'>Position du bandeau sur la page : </label>
    <select name="skazyrgpd_settings[orientation]">
        <option value="top" <?php selected($option['orientation'], "top") ?>>Haut</option>
        <option value="middle" <?php selected($option['orientation'], "middle") ?>>Milieu</option>
        <option value="bottom" <?php selected($option['orientation'], "bottom") ?>>Bas</option>
        <option value="popup" <?php selected($option['orientation'], "popup") ?>>Pop-up</option>
    </select>
    <?php

}
function groupServices_render()
{
    $option = get_option('skazyrgpd_settings');
    ?>
    <label class='uk-margin-small uk-display-block'>Grouper les services par catégorie dans le bandeau : </label>
    <input name="skazyrgpd_settings[groupServices]" type="radio" value="true" <?php checked($option['groupServices'], "true") ?>>
    <span class="uk-margin-small-right">Oui</span>
    <input name="skazyrgpd_settings[groupServices]" type="radio" value="false" <?php checked($option['groupServices'], "false") ?>>
    <span class="uk-margin-small-right">Non</span>
    <?php
}
function serviceDefaultState_render()
{
    $option = get_option('skazyrgpd_settings');
    ?>
    <label class='uk-margin-small uk-display-block'>État d'activation des services par défaut ('Attendre' pour demander à l'utilisateur) : </label>
    <select name="skazyrgpd_settings[serviceDefaultState]">
        <option value="true" <?php selected($option['serviceDefaultState'], "true") ?>>Activer</option>
        <option value="wait" <?php selected($option['serviceDefaultState'], "wait") ?>>Attendre</option>
        <option value="false" <?php selected($option['serviceDefaultState'], "false") ?>>Désactiver</option>
    </select>
    <?php
}
function showAlertSmall_render()
{
    $option = get_option('skazyrgpd_settings');
    ?>
    <label class='uk-margin-small uk-display-block'>Afficher de la petite bannière d'alertes (en bas à droite de la page) : </label>
    <input name="skazyrgpd_settings[showAlertSmall]" type="radio" value="true" <?php checked($option['showAlertSmall'], "true") ?>>
    <span class="uk-margin-small-right">Oui</span>
    <input name="skazyrgpd_settings[showAlertSmall]" type="radio" value="false" <?php checked($option['showAlertSmall'], "false") ?>>
    <span class="uk-margin-small-right">Non</span>
    <?php
}
function cookiesList_render()
{
    $option = get_option('skazyrgpd_settings');
    ?>
    <label class='uk-margin-small uk-display-block'>Afficher la liste des cookies : </label>
    <input name="skazyrgpd_settings[cookiesList]" type="radio" value="true" <?php checked($option['cookiesList'], "true") ?>>
    <span class="uk-margin-small-right">Oui</span>
    <input name="skazyrgpd_settings[cookiesList]" type="radio" value="false" <?php checked($option['cookiesList'], "false") ?>>
    <span class="uk-margin-small-right">Non</span>
    <?php
}
function showIcon_render()
{
    $option = get_option('skazyrgpd_settings');
    ?>
    <label class='uk-margin-small uk-display-block'>Afficher l'icône pour faire apparaître le bandeau : </label>
    <input name="skazyrgpd_settings[showIcon]" type="radio" value="true" <?php checked($option['showIcon'], "true") ?>>
    <span class="uk-margin-small-right">Oui</span>
    <input name="skazyrgpd_settings[showIcon]" type="radio" value="false" <?php checked($option['showIcon'], "false") ?>>
    <span class="uk-margin-small-right">Non</span>
    <?php
}
function iconSrc_render()
{
    $option = get_option('skazyrgpd_settings');
    ?>
    <label class='uk-margin-small uk-display-block'>URL de l'icône cookie : </label>
    <input name="skazyrgpd_settings[iconSrc]" type="text" value="<?php echo $option["iconSrc"] ?>" placeholder="URL de l'icône" />
    <?php
}
function iconPosition_render()
{
    $option = get_option('skazyrgpd_settings');
    ?>
    <label class='uk-margin-small uk-display-block'>Position de l'icône sur la page : </label>
    <select name="skazyrgpd_settings[iconPosition]">
        <option value="TopLeft" <?php selected($option['iconPosition'], "TopLeft") ?>>Haut gauche</option>
        <option value="TopRight" <?php selected($option['iconPosition'], "TopRight") ?>>Haut droite</option>
        <option value="BottomLeft" <?php selected($option['iconPosition'], "BottomLeft") ?>>Bas gauche</option>
        <option value="BottomRight" <?php selected($option['iconPosition'], "BottomRight") ?>>Bas Droite</option>
    </select>
    <?php
}
function adblocker_render()
{
    $option = get_option('skazyrgpd_settings');
    ?>
    <label class='uk-margin-small uk-display-block'>Afficher une alerte si un bloqueur de publicité est détecté : </label>
    <input name="skazyrgpd_settings[adblocker]" type="radio" value="true" <?php checked($option['adblocker'], "true") ?>>
    <span class="uk-margin-small-right">Oui</span>
    <input name="skazyrgpd_settings[adblocker]" type="radio" value="false" <?php checked($option['adblocker'], "false") ?>>
    <span class="uk-margin-small-right">Non</span>
    <?php
}
function denyAllCta_render()
{
    $option = get_option('skazyrgpd_settings');
    ?>
    <label class='uk-margin-small uk-display-block'>Afficher le bouton 'Tout refuser' sur le bandeau : </label>
    <input name="skazyrgpd_settings[denyAllCta]" type="radio" value="true" <?php checked($option['denyAllCta'], "true") ?>>
    <span class="uk-margin-small-right">Oui</span>
    <input name="skazyrgpd_settings[denyAllCta]" type="radio" value="false" <?php checked($option['denyAllCta'], "false") ?>>
    <span class="uk-margin-small-right">Non</span>
    <?php
}
function acceptAllCta_render()
{
    $option = get_option('skazyrgpd_settings');
    ?>
    <label class='uk-margin-small uk-display-block'>Afficher le bouton 'Tout accepter' sur le bandeau : </label>
    <input name="skazyrgpd_settings[acceptAllCta]" type="radio" value="true" <?php checked($option['acceptAllCta'], "true") ?>>
    <span class="uk-margin-small-right">Oui</span>
    <input name="skazyrgpd_settings[acceptAllCta]" type="radio" value="false" <?php checked($option['acceptAllCta'], "false") ?>>
    <span class="uk-margin-small-right">Non</span>
    <?php
}
function highPrivacy_render()
{
    $option = get_option('skazyrgpd_settings');
    ?>
    <label class='uk-margin-small uk-display-block'>Désactiver l'auto-consentement/activation des services après être descendu sur la page : </label>
    <input name="skazyrgpd_settings[highPrivacy]" type="radio" value="true" <?php checked($option['highPrivacy'], "true") ?>>
    <span class="uk-margin-small-right">Oui</span>
    <input name="skazyrgpd_settings[highPrivacy]" type="radio" value="false" <?php checked($option['highPrivacy'], "false") ?>>
    <span class="uk-margin-small-right">Non</span>
    <?php
}
function handleBrowserDNTRequest_render()
{
    $option = get_option('skazyrgpd_settings');
    ?>
    <label class='uk-margin-small uk-display-block'>Refuser automatiquement tout les cookies si les navigateurs envoient une requête 'Do Not Track'.</label>
    <input name="skazyrgpd_settings[handleBrowserDNTRequest]" type="radio" value="true" <?php checked($option['handleBrowserDNTRequest'], "true") ?>>
    <span class="uk-margin-small-right">Oui</span>
    <input name="skazyrgpd_settings[handleBrowserDNTRequest]" type="radio" value="false" <?php checked($option['handleBrowserDNTRequest'], "false") ?>>
    <span class="uk-margin-small-right">Non</span>
    <?php
}
function removeCredit_render()
{
    $option = get_option('skazyrgpd_settings');
    ?>
    <label class='uk-margin-small uk-display-block'>Retirer le lien menant vers <a href='https://tarteaucitron.io'>tarteaucitron.io</a> : </label>
    <input name="skazyrgpd_settings[removeCredit]" type="radio" value="true" <?php checked($option['removeCredit'], "true") ?>>
    <span class="uk-margin-small-right">Oui</span>
    <input name="skazyrgpd_settings[removeCredit]" type="radio" value="false" <?php checked($option['removeCredit'], "false") ?>>
    <span class="uk-margin-small-right">Non</span>
    <?php
}
function moreInfoLink_render()
{
    $option = get_option('skazyrgpd_settings');
    ?>
    <label class='uk-margin-small uk-display-block'>Afficher le lien 'plus d'informations' : </label>
    <input name="skazyrgpd_settings[moreInfoLink]" type="radio" value="true" <?php checked($option['moreInfoLink'], "true") ?>>
    <span class="uk-margin-small-right">Oui</span>
    <input name="skazyrgpd_settings[moreInfoLink]" type="radio" value="false" <?php checked($option['moreInfoLink'], "false") ?>>
    <span class="uk-margin-small-right">Non</span>
    <?php
}
function useExternalCss_render()
{
    $option = get_option('skazyrgpd_settings');
    ?>
    <label class='uk-margin-small uk-display-block'>Utiliser une feuille de style CSS externe : </label>
    <input name="skazyrgpd_settings[useExternalCss]" type="radio" value="true" <?php checked($option['useExternalCss'], "true") ?>>
    <span class="uk-margin-small-right">Oui</span>
    <input name="skazyrgpd_settings[useExternalCss]" type="radio" value="false" <?php checked($option['useExternalCss'], "false") ?>>
    <span class="uk-margin-small-right">Non</span>
    <?php
}
function useExternalJs_render()
{
    $option = get_option('skazyrgpd_settings');
    ?>
    <label class='uk-margin-small uk-display-block'>Utiliser un script JS externe : </label>
    <input name="skazyrgpd_settings[useExternalJs]" type="radio" value="true" <?php checked($option['useExternalJs'], "true") ?>>
    <span class="uk-margin-small-right">Oui</span>
    <input name="skazyrgpd_settings[useExternalJs]" type="radio" value="false" <?php checked($option['useExternalJs'], "false") ?>>
    <span class="uk-margin-small-right">Non</span>
    <?php
}
function cookieDomain_render()
{
    $option = get_option('skazyrgpd_settings');
    ?>
    <label class='uk-margin-small uk-display-block'>Nom de domaine (pour l'utilisation des cookies partagés) : </label>
    <input name="skazyrgpd_settings[cookieDomain]" type="text" value="<?php echo $option["cookieDomain"] ?>" placeholder="Nom de domaine" />
    <?php
}
function readmoreLink_render()
{
    $option = get_option('skazyrgpd_settings');
    ?>
    <label class='uk-margin-small uk-display-block'>URL du lien 'Voir plus' : </label>
    <input name="skazyrgpd_settings[readmoreLink]" type="text" value="<?php echo $option["readmoreLink"] ?>" placeholder="URL 'voir plus'" />
    <?php
}
function mandatory_render()
{
    $option = get_option('skazyrgpd_settings');
    ?>
    <label class='uk-margin-small uk-display-block'>Afficher les cookies essentiels : </label>
    <input name="skazyrgpd_settings[mandatory]" type="radio" value="true" <?php checked($option['mandatory'], "true") ?>>
    <span class="uk-margin-small-right">Oui</span>
    <input name="skazyrgpd_settings[mandatory]" type="radio" value="false" <?php checked($option['mandatory'], "false") ?>>
    <span class="uk-margin-small-right">Non</span>
    <?php
}
function mandatoryCta_render()
{
    $option = get_option('skazyrgpd_settings');
    ?>
    <label class='uk-margin-small uk-display-block'>Afficher le bouton 'accepter' désactivé quands les cookies essentiels sont affichés : </label>
    <input name="skazyrgpd_settings[mandatoryCta]" type="radio" value="true" <?php checked($option['mandatoryCta'], "true") ?>>
    <span class="uk-margin-small-right">Oui</span>
    <input name="skazyrgpd_settings[mandatoryCta]" type="radio" value="false" <?php checked($option['mandatoryCta'], "false") ?>>
    <span class="uk-margin-small-right">Non</span>
    <?php
}
function languages_render()
{
    $option = get_option('skazyrgpd_settings');
    ?>
    <label class='uk-margin-small uk-display-block'>Texte personnalisé de tarteaucitron : (Veuillez éviter d'utiliser ces guillemets <strong>"</strong> car ils sont utilisés pour délimiter les messages)</label>
    <textarea style="font-family: 'monospace'" name="skazyrgpd_settings[languages]" rows="15" cols="150"><?php echo $option['languages'] ?></textarea>
<?php

}
function googleTagManagerEnabled_render()
{
    $option = get_option('skazyrgpd_settings');
    ?>
    <label class='uk-margin-small uk-display-block'>Utiliser Google Tag Manager :</label>
    <input name="skazyrgpd_settings[googleTagManagerEnabled]" type="radio" value="true" <?php checked($option['googleTagManagerEnabled'], "true") ?>>
    <span class="uk-margin-small-right">Oui</span>
    <input name="skazyrgpd_settings[googleTagManagerEnabled]" type="radio" value="false" <?php checked($option['googleTagManagerEnabled'], "false") ?>>
    <span class="uk-margin-small-right">Non</span>
    <?php
}
function googleTagManager_render()
{
    $option = get_option('skazyrgpd_settings');
    ?>
    <label class='uk-margin-small uk-display-block'>ID Google Tag Manager</label>
    <input name="skazyrgpd_settings[gtmId]" type="text" value="<?php echo $option["gtmId"] ?>"placeholder="GTM-XXXX" />
    <?php
}
function googleAnalyticsEnabled_render()
{
    $option = get_option('skazyrgpd_settings');
    ?>
    <label class='uk-margin-small uk-display-block'>Utiliser Google Analytics : </label>
    <input name="skazyrgpd_settings[googleAnalyticsEnabled]" type="radio" value="true" <?php checked($option['googleAnalyticsEnabled'], "true") ?>>
    <span class="uk-margin-small-right">Oui</span>
    <input name="skazyrgpd_settings[googleAnalyticsEnabled]" type="radio" value="false" <?php checked($option['googleAnalyticsEnabled'], "false") ?>>
    <span class="uk-margin-small-right">Non</span>
    <?php
}
function googleAnalytics_render()
{
    $option = get_option('skazyrgpd_settings');
    ?>
    <label class='uk-margin-small uk-display-block'>Google Analytics UA : </label>
    <input name="skazyrgpd_settings[gajsUa]" type="text" value="<?php echo $option["gajsUa"] ?>" placeholder="UA-XXXXXXXX-X" />
    <?php
}
function matomoCloudEnabled_render()
{
    $option = get_option('skazyrgpd_settings');
    ?>
    <label class='uk-margin-small uk-display-block'>Utiliser Matomo Cloud : </label>
    <input name="skazyrgpd_settings[matomoCloudEnabled]" type="radio" value="true" <?php checked($option['matomoCloudEnabled'], "true") ?>>
    <span class="uk-margin-small-right">Oui</span>
    <input name="skazyrgpd_settings[matomoCloudEnabled]" type="radio" value="false" <?php checked($option['matomoCloudEnabled'], "false") ?>>
    <span class="uk-margin-small-right">Non</span>
    <?php
}
function matomoId_render()
{
    $option = get_option('skazyrgpd_settings');
    ?>
    <label class='uk-margin-small uk-display-block'>Matomo ID</label>
    <input name="skazyrgpd_settings[matomoId]" type="text" value="<?php echo $option["matomoId"] ?>" placeholder="SITE_ID" />
    <?php
}
function zopimEnabled_render()
{
    $option = get_option('skazyrgpd_settings');
    ?>
    <label class='uk-margin-small uk-display-block'>Utiliser Zopim : </label>
    <input name="skazyrgpd_settings[zopimEnabled]" type="radio" value="true" <?php checked($option['zopimEnabled'], "true") ?>>
    <span class="uk-margin-small-right">Oui</span>
    <input name="skazyrgpd_settings[zopimEnabled]" type="radio" value="false" <?php checked($option['zopimEnabled'], "false") ?>>
    <span class="uk-margin-small-right">Non</span>
    <?php
}
function zopim_render()
{
    $option = get_option('skazyrgpd_settings');
    ?>
    <label class='uk-margin-small uk-display-block'>ID Zopim</label>
    <input name="skazyrgpd_settings[zopimId]" type="text" value="<?php echo $option["zopimId"] ?>" placeholder="ID Zopim" />
    <?php
}
function youtubeEnabled_render()
{
    $option = get_option('skazyrgpd_settings');
    ?>
    <label class='uk-margin-small uk-display-block'>Utiliser YouTube : </label>
    <input name="skazyrgpd_settings[youtubeEnabled]" type="radio" value="true" <?php checked($option['youtubeEnabled'], "true") ?>>
    <span class="uk-margin-small-right">Oui</span>
    <input name="skazyrgpd_settings[youtubeEnabled]" type="radio" value="false" <?php checked($option['youtubeEnabled'], "false") ?>>
    <span class="uk-margin-small-right">Non</span>
    <?php
}
function youtubeApiEnabled_render()
{
    $option = get_option('skazyrgpd_settings');
    ?>
    <label class='uk-margin-small uk-display-block'>Utiliser YouTube API : </label>
    <input name="skazyrgpd_settings[youtubeApiEnabled]" type="radio" value="true" <?php checked($option['youtubeApiEnabled'], "true") ?>>
    <span class="uk-margin-small-right">Oui</span>
    <input name="skazyrgpd_settings[youtubeApiEnabled]" type="radio" value="false" <?php checked($option['youtubeApiEnabled'], "false") ?>>
    <span class="uk-margin-small-right">Non</span>
    <?php
}
function vimeoEnabled_render()
{
    $option = get_option('skazyrgpd_settings');
    ?>
    <label class='uk-margin-small uk-display-block'>Utiliser Vimeo : </label>
    <input name="skazyrgpd_settings[vimeoEnabled]" type="radio" value="true" <?php checked($option['vimeoEnabled'], "true") ?>>
    <span class="uk-margin-small-right">Oui</span>
    <input name="skazyrgpd_settings[vimeoEnabled]" type="radio" value="false" <?php checked($option['vimeoEnabled'], "false") ?>>
    <span class="uk-margin-small-right">Non</span>
    <?php
}
function facebookLikeboxEnabled_render()
{
    $option = get_option('skazyrgpd_settings');
    ?>
    <label class='uk-margin-small uk-display-block'>Utiliser Facebook Likebox : </label>
    <input name="skazyrgpd_settings[facebookLikeboxEnabled]" type="radio" value="true" <?php checked($option['facebookLikeboxEnabled'], "true") ?>>
    <span class="uk-margin-small-right">Oui</span>
    <input name="skazyrgpd_settings[facebookLikeboxEnabled]" type="radio" value="false" <?php checked($option['facebookLikeboxEnabled'], "false") ?>>
    <span class="uk-margin-small-right">Non</span>
    <?php
}
function facebookChatEnabled_render()
{
    $option = get_option('skazyrgpd_settings');
    ?>
    <label class='uk-margin-small uk-display-block'>Utiliser Facebook Chat : </label>
    <input name="skazyrgpd_settings[facebookChatEnabled]" type="radio" value="true" <?php checked($option['facebookChatEnabled'], "true") ?>>
    <span class="uk-margin-small-right">Oui</span>
    <input name="skazyrgpd_settings[facebookChatEnabled]" type="radio" value="false" <?php checked($option['facebookChatEnabled'], "false") ?>>
    <span class="uk-margin-small-right">Non</span>
    <?php
}
function facebookChatId_render()
{
    $option = get_option('skazyrgpd_settings');
    ?>
    <label class='uk-margin-small uk-display-block'>ID Facebook app : </label>
    <input name="skazyrgpd_settings[facebookChatId]" type="text" value="<?php echo $option["facebookChatId"] ?>" placeholder="ID" />
    <?php
}
function googleMapsEnabled_render()
{
    $option = get_option('skazyrgpd_settings');
    ?>
    <label class='uk-margin-small uk-display-block'>Utiliser Google Maps : </label>
    <input name="skazyrgpd_settings[googleMapsEnabled]" type="radio" value="true" <?php checked($option['googleMapsEnabled'], "true") ?>>
    <span class="uk-margin-small-right">Oui</span>
    <input name="skazyrgpd_settings[googleMapsEnabled]" type="radio" value="false" <?php checked($option['googleMapsEnabled'], "false") ?>>
    <span class="uk-margin-small-right">Non</span>
    <?php
}
function googleMapsID_render()
{
    $option = get_option('skazyrgpd_settings');
    ?>
    <label class='uk-margin-small uk-display-block'>ID Google Maps : </label>
    <input name="skazyrgpd_settings[googleMapsID]" type="text" value="<?php echo $option["googleMapsID"] ?>" placeholder="Clé d'API" />
    <?php
}
?>