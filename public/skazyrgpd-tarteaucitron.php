<?php

/*---------------------------------------------------------- Paramètres module ----------------------------------------------------------*/

$options = get_option('skazyrgpd_settings');

?>
<script src='https://cdn.jsdelivr.net/npm/tarteaucitronjs@1.13.0/tarteaucitron.min.js'></script>
<link href='https://cdn.jsdelivr.net/npm/tarteaucitronjs@1.13.0/css/tarteaucitron.min.css' rel='stylesheet'>
<script type='text/javascript'>
tarteaucitronCustomText = { <?php echo $options['languages']?> }; // Messages personnalisés
tarteaucitron.init({
    'privacyUrl': '<?php echo $options['privacyUrl'] ?>', /* Privacy policy url */
    'bodyPosition': '<?php echo $options['bodyPosition'] ?>', /* or top to bring it as first element for accessibility */
    'hashtag': '<?php echo $options['hashtag'] ?>', /* Open the panel with this hashtag */
    'cookieName': '<?php echo $options['cookieName'] ?>', /* Cookie name */
    'orientation': '<?php echo $options['orientation'] ?>', /* Banner position (top - bottom - middle - popup) */
    'groupServices': <?php echo $options['groupServices'] ?> , /* Group services by category */
    'serviceDefaultState': '<?php echo $options['serviceDefaultState'] ?>', /* Default state (true - wait - false) */
    'showAlertSmall': <?php echo $options['showAlertSmall'] ?> , /* Show the small banner on bottom right */
    'cookieslist': <?php echo $options['cookiesList'] ?> , /* Show the cookie list */
    'showIcon': <?php echo $options['showIcon']  ?>, /* Show cookie icon to manage cookies */
    'iconSrc': '<?php echo $options['iconSrc'] ?>', /* Optionnal: URL or base64 encoded image */
    'iconPosition': '<?php echo $options['iconPosition'] ?>', /* Position of the icon between BottomRight, BottomLeft, TopRight and TopLeft */
    'adblocker': <?php echo $options['adblocker'] ?> , /* Show a Warning if an adblocker is detected */
    'DenyAllCta' : <?php echo $options['denyAllCta'] ?> , /* Show the deny all button */
    'AcceptAllCta' : <?php echo $options['acceptAllCta'] ?> , /* Show the accept all button when highPrivacy on */
    'highPrivacy': <?php echo $options['highPrivacy'] ?> , /* HIGHLY RECOMMANDED Disable auto consent */
    'handleBrowserDNTRequest': <?php echo $options['handleBrowserDNTRequest'] ?> , /* If Do Not Track == 1, disallow all */
    'removeCredit': <?php echo $options['removeCredit'] ?> , /* Remove credit link */
    'moreInfoLink': '<?php echo $options['moreInfoLink'] ?>', /* Show more info link */
    'useExternalCss': <?php echo $options['useExternalCss'] ?> , /* If false, the tarteaucitron.css file will be loaded */
    'useExternalJs': <?php echo $options['useExternalJs'] ?> , /* If false, the tarteaucitron.services.js file will be loaded */
    'cookieDomain': '<?php echo $options['cookieDomain'] ?>', /* Shared cookie for subdomain website */
    'readmoreLink': '<?php echo $options['readmoreLink'] ?>', /* Change the default readmore link pointing to tarteaucitron.io */
    'mandatory': <?php echo $options['mandatory'] ?> , /* Show a message about mandatory cookies */
    'mandatoryCta': <?php echo $options['mandatoryCta'] ?> /* Show the disabled accept button when mandatory on */
});

/*---------------------------------------------------------- Paramètres services ----------------------------------------------------------*/

<?php if ($options['googleTagManagerEnabled'] == "true") : ?>
    tarteaucitron.user.googletagmanagerId = '<?php echo $options['gtmId']?>';
    (tarteaucitron.job = tarteaucitron.job || []).push('googletagmanager');
<?php endif;
if ($options['googleAnalyticsEnabled'] == "true") : ?>
    tarteaucitron.user.gajsUa = '<?php echo $options['gajsUa']?>';
    tarteaucitron.user.gajsMore = function () { /* add here your optionnal _ga.push() */ };
    (tarteaucitron.job = tarteaucitron.job || []).push('gajs');
<?php endif;
if ($options['matomoCloudEnabled'] == "true") : ?>
    tarteaucitron.user.matomoId = '<?php echo $options['matomoId']?>';
    (tarteaucitron.job = tarteaucitron.job || []).push('matomocloud');
<?php endif;
if ($options['zopimEnabled'] == "true") : ?>
    tarteaucitron.user.zopimID = '<?php echo $options['zopimId']?>';
    (tarteaucitron.job = tarteaucitron.job || []).push('zopimId');
<?php endif;
if ($options['youtubeEnabled'] == "true") : ?>
    (tarteaucitron.job = tarteaucitron.job || []).push('youtube');
<?php endif;
if ($options['youtubeApiEnabled'] == "true") : ?>
    (tarteaucitron.job = tarteaucitron.job || []).push('youtubeapi');
<?php endif;
if ($options['vimeoEnabled'] == "true") : ?>
    (tarteaucitron.job = tarteaucitron.job || []).push('vimeo');
<?php endif;
if ($options['facebookLikeboxEnabled'] == "true") : ?>
    (tarteaucitron.job = tarteaucitron.job || []).push('facebooklikebox');
<?php endif;
if ($options['facebookChatEnabled'] == "true") : ?>
    tarteaucitron.user.facebookChatID = '<?php echo $options['facebookChatId']?>';
    (tarteaucitron.job = tarteaucitron.job || []).push('facebookcustomerchat');
<?php endif;
if ($options['googleMapsEnabled'] == "true") : ?>
    tarteaucitron.user.googlemapsKey = '<?php echo $options['googleMapsID']?>';
    (tarteaucitron.job = tarteaucitron.job || []).push('googlemaps');
<?php endif;
?>
</script>