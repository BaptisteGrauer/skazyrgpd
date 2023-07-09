<!-- Initialisation du bandeau cookie -->

<?php require_once 'skazyrgpd-settings.php'; ?>

<script src="wp-content/plugins/skazy-rgpd/tarteaucitron.js"></script>

<script>
tarteaucitron.init({
    'privacyUrl': '<?php echo $tarteaucitron_privacyUrl ?>', /* Privacy policy url */
    'bodyPosition': '<?php echo $tarteaucitron_bodyPosition ?>', /* or top to bring it as first element for accessibility */

    'hashtag': '<?php echo $tarteaucitron_hashtag ?>', /* Open the panel with this hashtag */
    'cookieName': '<?php echo $tarteaucitron_cookieName ?>', /* Cookie name */

    'orientation': '<?php echo $tarteaucitron_orientation ?>', /* Banner position (top - bottom - middle - popup) */

    'groupServices': <?php echo $tarteaucitron_groupServices ?>, /* Group services by category */
    'serviceDefaultState': '<?php echo $tarteaucitron_serviceDefaultState ?>', /* Default state (true - wait - false) */

    'showAlertSmall': <?php echo $tarteaucitron_showAlertSmall ?>, /* Show the small banner on bottom right */
    'cookieslist': <?php echo $tarteaucitron_cookieslist ?>, /* Show the cookie list */
    
    'showIcon': <?php echo $tarteaucitron_showIcon ?>, /* Show cookie icon to manage cookies */
    // 'iconSrc': '<?php echo $tarteaucitron_iconSrc ?>', /* Optionnal: URL or base64 encoded image */
    'iconPosition': '<?php echo $tarteaucitron_iconPosition ?>', /* Position of the icon between BottomRight, BottomLeft, TopRight and TopLeft */

    'adblocker': <?php echo $tarteaucitron_adblocker ?>, /* Show a Warning if an adblocker is detected */

    'DenyAllCta' : <?php echo $tarteaucitron_denyAllCta ?>, /* Show the deny all button */
    'AcceptAllCta' : <?php echo $tarteaucitron_acceptAllCta ?>, /* Show the accept all button when highPrivacy on */
    'highPrivacy': <?php echo $tarteaucitron_highPrivacy ?>, /* HIGHLY RECOMMANDED Disable auto consent */

    'handleBrowserDNTRequest': <?php echo $tarteaucitron_handleBrowserDNTRequest ?>, /* If Do Not Track == 1, disallow all */

    'removeCredit': <?php echo $tarteaucitron_removeCredit ?>, /* Remove credit link */
    'moreInfoLink': '<?php echo $tarteaucitron_moreInfoLink ?>', /* Show more info link */
    'useExternalCss': <?php echo $tarteaucitron_useExternalCss ?>, /* If false, the tarteaucitron.css file will be loaded */
    'useExternalJs': <?php echo $tarteaucitron_useExternalJs ?>, /* If false, the tarteaucitron.services.js file will be loaded */

    //'cookieDomain': '<?php echo $tarteaucitron_cookieDomain ?>', /* Shared cookie for subdomain website */

    'readmoreLink': '<?php echo $tarteaucitron_readmoreLink ?>', /* Change the default readmore link pointing to tarteaucitron.io */
    
    'mandatory': <?php echo $tarteaucitron_mandatory ?>, /* Show a message about mandatory cookies */
    'mandatoryCta': <?php echo $tarteaucitron_mandatoryCta ?> /* Show the disabled accept button when mandatory on */
});
</script>

<!--<script>
// Google Analytics



// Matomo



</script>-->