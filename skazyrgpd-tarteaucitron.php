<?php
global $wpdb;
$skazyrgpd_db = $wpdb->prefix . "skazyrgpd";
$result = $wpdb->get_results("SELECT setting_name, setting_value FROM $skazyrgpd_db WHERE setting_category='général'", ARRAY_N);

$tarteaucitron_privacyUrl = $result[0][1]; // string -> URL personnalisée
$tarteaucitron_bodyPosition = $result[1][1]; // string -> top, bottom
$tarteaucitron_hashtag = $result[2][1]; // string -> # personnalisé
$tarteaucitron_cookieName = $result[3][1]; // string -> nom du cookie
$tarteaucitron_orientation = $result[4][1];// string -> top, bottom, middle, popup
$tarteaucitron_groupServices = $result[5][1]; // bool
$tarteaucitron_serviceDefaultState = $result[6][1]; // bool, string -> true, wait, false
$tarteaucitron_showAlertSmall = $result[7][1]; // bool
$tarteaucitron_cookieslist = $result[8][1]; // bool
$tarteaucitron_showIcon = $result[9][1]; // bool
$tarteaucitron_iconSrc = $result[10][1]; // bool
$tarteaucitron_iconPosition = $result[11][1]; // string -> TopLeft, TopRight, BottomLeft, BottomRight
$tarteaucitron_adblocker = $result[12][1]; // bool
$tarteaucitron_denyAllCta = $result[13][1]; // bool
$tarteaucitron_acceptAllCta = $result[14][1]; // bool
$tarteaucitron_highPrivacy = $result[15][1]; // bool
$tarteaucitron_handleBrowserDNTRequest = $result[16][1]; // bool
$tarteaucitron_removeCredit = $result[17][1]; // bool
$tarteaucitron_moreInfoLink = $result[18][1]; // bool
$tarteaucitron_useExternalCss = $result[19][1]; // bool
$tarteaucitron_useExternalJs = $result[20][1]; // bool
$tarteaucitron_cookieDomain = $result[21][1]; // string -> nom de domaine personnalisé
$tarteaucitron_readmoreLink = $result[22][1]; // string -> page en savoir plus personnalisé
$tarteaucitron_mandatory = $result[23][1]; // bool
$tarteaucitron_mandatoryCta = $result[24][1]; // bool

echo "
<script src='wp-content/plugins/skazyrgpd/tarteaucitron.js'></script>
<script>
tarteaucitron.init({
     'privacyUrl': '$tarteaucitron_privacyUrl ', /* Privacy policy url */
     'bodyPosition': '$tarteaucitron_bodyPosition ', /* or top to bring it as first element for accessibility */

     'hashtag': '$tarteaucitron_hashtag ', /* Open the panel with this hashtag */
     'cookieName': '$tarteaucitron_cookieName ', /* Cookie name */

     'orientation': '$tarteaucitron_orientation ', /* Banner position (top - bottom - middle - popup) */

     'groupServices': $tarteaucitron_groupServices , /* Group services by category */
     'serviceDefaultState': '$tarteaucitron_serviceDefaultState ', /* Default state (true - wait - false) */

     'showAlertSmall': $tarteaucitron_showAlertSmall , /* Show the small banner on bottom right */
     'cookieslist': $tarteaucitron_cookieslist , /* Show the cookie list */
    
     'showIcon': $tarteaucitron_showIcon , /* Show cookie icon to manage cookies */
     // 'iconSrc': '$tarteaucitron_iconSrc ', /* Optionnal: URL or base64 encoded image */
     'iconPosition': '$tarteaucitron_iconPosition ', /* Position of the icon between BottomRight, BottomLeft, TopRight and TopLeft */

     'adblocker': $tarteaucitron_adblocker , /* Show a Warning if an adblocker is detected */

     'DenyAllCta' : $tarteaucitron_denyAllCta , /* Show the deny all button */
     'AcceptAllCta' : $tarteaucitron_acceptAllCta , /* Show the accept all button when highPrivacy on */
     'highPrivacy': $tarteaucitron_highPrivacy , /* HIGHLY RECOMMANDED Disable auto consent */

     'handleBrowserDNTRequest': $tarteaucitron_handleBrowserDNTRequest , /* If Do Not Track == 1, disallow all */

     'removeCredit': $tarteaucitron_removeCredit , /* Remove credit link */
     'moreInfoLink': '$tarteaucitron_moreInfoLink ', /* Show more info link */
     'useExternalCss': $tarteaucitron_useExternalCss , /* If false, the tarteaucitron.css file will be loaded */
     'useExternalJs': $tarteaucitron_useExternalJs , /* If false, the tarteaucitron.services.js file will be loaded */

     //'cookieDomain': '$tarteaucitron_cookieDomain ', /* Shared cookie for subdomain website */

     'readmoreLink': '$tarteaucitron_readmoreLink ', /* Change the default readmore link pointing to tarteaucitron.io */
    
     'mandatory': $tarteaucitron_mandatory , /* Show a message about mandatory cookies */
     'mandatoryCta': $tarteaucitron_mandatoryCta /* Show the disabled accept button when mandatory on */
});
</script>";
?>