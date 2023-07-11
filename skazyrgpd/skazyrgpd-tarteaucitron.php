<?php
global $wpdb;
$skazyrgpd_db = $wpdb->prefix . "skazyrgpd";
$result = $wpdb->get_results("SELECT setting_name, setting_value FROM $skazyrgpd_db WHERE setting_category='général'", ARRAY_N);

$tarteaucitron_privacyUrl = $result[0][1];
$tarteaucitron_bodyPosition = $result[1][1];
$tarteaucitron_hashtag = $result[2][1];
$tarteaucitron_cookieName = $result[3][1];
$tarteaucitron_orientation = $result[4][1];
$tarteaucitron_groupServices = $result[5][1];
$tarteaucitron_serviceDefaultState = $result[6][1];
$tarteaucitron_showAlertSmall = $result[7][1];
$tarteaucitron_cookieslist = $result[8][1];
$tarteaucitron_showIcon = $result[9][1];
$tarteaucitron_iconSrc = $result[10][1];
$tarteaucitron_iconPosition = $result[11][1];
$tarteaucitron_adblocker = $result[12][1];
$tarteaucitron_denyAllCta = $result[13][1];
$tarteaucitron_acceptAllCta = $result[14][1];
$tarteaucitron_highPrivacy = $result[15][1];
$tarteaucitron_handleBrowserDNTRequest = $result[16][1];
$tarteaucitron_removeCredit = $result[17][1];
$tarteaucitron_moreInfoLink = $result[18][1];
$tarteaucitron_useExternalCss = $result[19][1];
$tarteaucitron_useExternalJs = $result[20][1];
$tarteaucitron_cookieDomain = $result[21][1];
$tarteaucitron_readmoreLink = $result[22][1];
$tarteaucitron_mandatory = $result[23][1];
$tarteaucitron_mandatoryCta = $result[24][1];

// Initialisation du module

$url = get_site_url();
echo "
<script src='$url/wp-content/plugins/skazyrgpd/tarteaucitron.js'></script>
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

$enabledServices = $wpdb->get_results("SELECT setting_name, setting_value FROM $skazyrgpd_db WHERE setting_type='radio' AND setting_category='service'", ARRAY_N);

$skazyrgpd_gtmEnabled = $enabledServices[0][1];
$skazyrgpd_gajsEnabled = $enabledServices[1][1];
$skazyrgpd_matomoEnabled = $enabledServices[2][1];
$skazyrgpd_zopimEnabled = $enabledServices[3][1];
$skazyrgpd_youtubeEnabled = $enabledServices[4][1];
$skazyrgpd_youtubeapiEnabled = $enabledServices[5][1];
$skazyrgpd_vimeoEnabled = $enabledServices[6][1];
$skazyrgpd_facebooklikeboxEnabled = $enabledServices[7][1];
$skazyrgpd_facebookchatEnabled = $enabledServices[8][1];
$skazyrgpd_googlemapsEnabled = $enabledServices[9][1];
$skazyrgpd_googlemapsiframeEnabled = $enabledServices[10][1];
$skazyrgpd_googlemapssnazzyEnabled = $enabledServices[11][1];
$skazyrgpd_googlemapsmapboxEnabled = $enabledServices[12][1];

$services = $wpdb->get_results("SELECT setting_name, setting_value FROM $skazyrgpd_db WHERE setting_type='text' AND setting_category='service'",ARRAY_N);

$skazyrgpd_gtm = $services[0][1];
$skazyrgpd_gajs = $services[1][1];
$skazyrgpd_matomoID = $services[2][1];
$skazyrgpd_matomoURL = $services[3][1];
$skazyrgpd_zopimID = $services[4][1];
$skazyrgpd_facebookchatID = $services[5][1];
$skazyrgpd_googlemapsID = $services[6][1];
$skazyrgpd_googlemapsSnazzyID = $services[7][1];
$skazyrgpd_googlemapsmapboxToken = $services[8][1];
$skazyrgpd_googlemapsmapboxJs = $services[9][1];

if($skazyrgpd_gtmEnabled == "true"){
    echo "<script type='text/javascript'>
    tarteaucitron.user.googletagmanagerId = '$skazyrgpd_gtm';
    (tarteaucitron.job = tarteaucitron.job || []).push('googletagmanager');
    </script>";
}

if($skazyrgpd_gajsEnabled == "true"){
    echo "<script type='text/javascript'>
    tarteaucitron.user.gajsUa = '$skazyrgpd_gajs';
    tarteaucitron.user.gajsMore = function () { /* add here your optionnal _ga.push() */ };
    (tarteaucitron.job = tarteaucitron.job || []).push('gajs');
    </script>";
}

if($skazyrgpd_matomoEnabled == "true"){
    echo "<script type='text/javascript'>
    tarteaucitron.user.matomoId = $skazyrgpd_matomoID;
    (tarteaucitron.job = tarteaucitron.job || []).push('matomo');
    tarteaucitron.user.matomotmUrl = '$skazyrgpd_matomoURL';
    (tarteaucitron.job = tarteaucitron.job || []).push('matomotm');
    </script>";
}

if($skazyrgpd_zopimEnabled == "true"){
    echo "<script type='text/javascript'>
    tarteaucitron.user.zopimID = '$skazyrgpd_zopimID';
    (tarteaucitron.job = tarteaucitron.job || []).push('zopim');
    </script>";
}

if($skazyrgpd_youtubeEnabled == "true"){
    echo "<script type='text/javascript'>
    (tarteaucitron.job = tarteaucitron.job || []).push('youtube');
    </script>";
}

if($skazyrgpd_youtubeapiEnabled == "true"){
    echo "<script type='text/javascript'>
    (tarteaucitron.job = tarteaucitron.job || []).push('youtubeapi');
    </script>";
}

if($skazyrgpd_vimeoEnabled == "true"){
    echo "<script type='text/javascript'>
    (tarteaucitron.job = tarteaucitron.job || []).push('vimeo');
    </script>";
}

if($skazyrgpd_facebooklikeboxEnabled == "true"){
    echo "<script type='text/javascript'>
    (tarteaucitron.job = tarteaucitron.job || []).push('facebooklikebox');
    </script>";
}

if($skazyrgpd_facebookchatEnabled == "true"){
    echo "<script type='text/javascript'>
    tarteaucitron.user.facebookChatID = '$skazyrgpd_facebookchatID';
    (tarteaucitron.job = tarteaucitron.job || []).push('facebookcustomerchat');
    </script>";
}

if($skazyrgpd_googlemapsEnabled == "true"){
    echo "<script type='text/javascript'>
    tarteaucitron.user.googlemapsKey = '$skazyrgpd_googlemapsID';
    (tarteaucitron.job = tarteaucitron.job || []).push('googlemaps');
    </script>";
}

if($skazyrgpd_googlemapsiframeEnabled == "true"){
    echo "<script>
    tarteaucitron.services.googlemapsembed = {
        'key': 'googlemapsembed',
        'type': 'api',
        'name': 'Google Maps Embed',
        'uri': 'https://policies.google.com/privacy',
        'needConsent': true,
        'cookies': ['apisid', 'hsid', 'nid', 'sapisid', 'sid', 'sidcc', 'ssid', '1p_jar'],
        'js': function () {
            'use strict';
            tarteaucitron.fallback(['googlemapsembed'], function (x) {
                var frame_title = tarteaucitron.fixSelfXSS(x.getAttribute('title') || 'Google maps iframe'),
                    width = tarteaucitron.getElemWidth(x),
                    height = tarteaucitron.getElemHeight(x),
                    url = x.getAttribute('data-url');
    
                return '<iframe title='' + frame_title + '' src='' + url + '' width='' + width + '' height='' + height + '' scrolling='no' allowtransparency allowfullscreen></iframe>';
            });
        },
        'fallback': function () {
            'use strict';
            var id = 'googlemapsembed';
            tarteaucitron.fallback(['googlemapsembed'], function (elem) {
                elem.style.width = tarteaucitron.getElemWidth(elem) + 'px';
                elem.style.height = tarteaucitron.getElemHeight(elem) + 'px';
                return tarteaucitron.engage(id);
            });
        }
    }
    </script>";
}

if($skazyrgpd_googlemapssnazzyEnabled == "true"){
    echo "";
}

if($skazyrgpd_googlemapsmapboxEnabled== "true"){
    echo "";
}
?>