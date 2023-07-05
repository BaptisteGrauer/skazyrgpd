<div class="wrap">
    <h1>Paramètres Tarteaucitron</h1>
    <?php 

$tarteaucitron_privacyUrl = "";
$tarteaucitron_bodyPosition = "bottom";
$tarteaucitron_hashtag = "#tarteaucitron";
$tarteaucitron_cookiename = "tarteaucitron";
$tarteaucitron_orientation = "middle";
$tarteaucitron_groupServices = "false";
$tarteaucitron_serviceDefaultState = "wait";
$tarteaucitron_showAlertSmall = "false";
$tarteaucitron_cookieslist = "false";
$tarteaucitron_showIcon = "true";
$tarteaucitron_iconSrc = "";
$tarteaucitron_iconPosition = "BottomRight";
$tarteaucitron_adblocker = "false";
$tarteaucitron_DenyAllCta = "true";
$tarteaucitron_AcceptAllCta = "true";
$tarteaucitron_highPrivacy = "true";
$tarteaucitron_handleBrowserDNTRequest = "false";
$tarteaucitron_removeCredit = "false";
$tarteaucitron_moreInfoLink = "true";
$tarteaucitron_useExternalCss = "false";
$tarteaucitron_useExternalJs = "false";
$tarteaucitron_cookieDomain = "";
$tarteaucitron_readmoreLink = "";
$tarteaucitron_mandatory = "true";
$tarteaucitron_mandatoryCta = "true";

$SettingsName = [
$tarteaucitron_privacyUrl => "URL Politique de confidentialité",
$tarteaucitron_bodyPosition => "Position sur le corps de la page",
$tarteaucitron_hashtag => "Hashtag (pour ouvrir le panneau)",
$tarteaucitron_cookiename => "Nom du cookie pour stocker les paramètres de tarteaucitron",
$tarteaucitron_orientation => "Position du bandeau",
$tarteaucitron_groupServices => "Grouper les service par catégorie",
$tarteaucitron_serviceDefaultState => "Etat par défaut",
$tarteaucitron_showAlertSmall => "Affichages de la petite bannière d'alertes",
$tarteaucitron_cookieslist => "Affiche la liste des cookies",
$tarteaucitron_showIcon => "Affiche l'icône pour gérer les cookies",
$tarteaucitron_iconSrc => "URL/base64 de l'image",
$tarteaucitron_iconPosition => "Position de l'icône",
$tarteaucitron_adblocker => "Alerte de détection de bloqueur de pub",
$tarteaucitron_DenyAllCta => "Afficher le bouton 'Tout refuser'",
$tarteaucitron_AcceptAllCta => "Afficher le bouton 'Tout accepter",
$tarteaucitron_highPrivacy => "Activer le consentement automatique",
$tarteaucitron_handleBrowserDNTRequest => "Refuser tout les cookies si requête DNT",
$tarteaucitron_removeCredit => "Retirer le lien de crédit",
$tarteaucitron_moreInfoLink => "Afficher le lien 'plus d'informations'",
$tarteaucitron_useExternalCss => "Utiliser le CSS externe",
$tarteaucitron_useExternalJs => "Utiliser le JS externe",
$tarteaucitron_cookieDomain => "Nom de domaine pour les cookies partagés",
$tarteaucitron_readmoreLink => "Lien 'voir plus'",
$tarteaucitron_mandatory => "Afficher le message pour les cookies essentiels",
$tarteaucitron_mandatoryCta => "Afficher le message pour les cookies non-essentiels" 
];

?>
<p>Paramètres par défaut</p>
<ul>
<?php
foreach($SettingsName as $setting){
    if($setting == ""){
        $setting = null;
    }
    echo "<li>" . $setting . "</li>";
}
?>
</ul>
    <br />
    <form method="post" action="">
        <input type="text" placeholder="Entrer du texte">
    </form>
</div>