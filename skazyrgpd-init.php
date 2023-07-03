<!-- Initialisation du bandeau cookie -->

<script src="wp-content/plugins/skazy-rgpd/tarteaucitron.js"></script>

<script>
tarteaucitron.init({
    "privacyUrl": "", /* Privacy policy url */
    "bodyPosition": "bottom", /* or top to bring it as first element for accessibility */

    "hashtag": "#tarteaucitron", /* Open the panel with this hashtag */
    "cookieName": "tarteaucitron", /* Cookie name */

    "orientation": "middle", /* Banner position (top - bottom - middle - popup) */

    "groupServices": false, /* Group services by category */
    "serviceDefaultState": "wait", /* Default state (true - wait - false) */

    "showAlertSmall": false, /* Show the small banner on bottom right */
    "cookieslist": false, /* Show the cookie list */
    
    "showIcon": true, /* Show cookie icon to manage cookies */
    // "iconSrc": "", /* Optionnal: URL or base64 encoded image */
    "iconPosition": "BottomLeft", /* Position of the icon between BottomRight, BottomLeft, TopRight and TopLeft */

    "adblocker": false, /* Show a Warning if an adblocker is detected */

    "DenyAllCta" : true, /* Show the deny all button */
    "AcceptAllCta" : true, /* Show the accept all button when highPrivacy on */
    "highPrivacy": true, /* HIGHLY RECOMMANDED Disable auto consent */

    "handleBrowserDNTRequest": false, /* If Do Not Track == 1, disallow all */

    "removeCredit": false, /* Remove credit link */
    "moreInfoLink": true, /* Show more info link */
    "useExternalCss": false, /* If false, the tarteaucitron.css file will be loaded */
    "useExternalJs": false, /* If false, the tarteaucitron.services.js file will be loaded */

    //"cookieDomain": ".my-multisite-domaine.fr", /* Shared cookie for subdomain website */

    "readmoreLink": "", /* Change the default readmore link pointing to tarteaucitron.io */
    
    "mandatory": true, /* Show a message about mandatory cookies */
    "mandatoryCta": true /* Show the disabled accept button when mandatory on */
});

// Google Analytics

tarteaucitron.user.gtagUa = 'G-XXXXXXXXX'; // A modifier avec le tag correspondant
// tarteaucitron.user.gtagCrossdomain = ['example.com', 'example2.com'];
tarteaucitron.user.gtagMore = function () { /* add here your optionnal gtag() */ };
(tarteaucitron.job = tarteaucitron.job || []).push('gtag');

/* Enlever ce marqueur HTML

window.dataLayer = window.dataLayer || [];
function gtag(){dataLayer.push(arguments);}
gtag('js', new Date());

gtag('config', 'G-XXXXXXXXX');

// your optionnal gtag()
*/

// Matomo

tarteaucitron.user.matomoId = SITE_ID; // A remplacer avec l'ID correspondant
(tarteaucitron.job = tarteaucitron.job || []).push('matomo');
tarteaucitron.user.matomoHost = 'YOUR_MATOMO_URL'; // A remplacer avc l'URL correspondant


/* Enlever ce marqueur HTML

var _paq = _paq || [];
_paq.push(['trackPageView']);
_paq.push(['enableLinkTracking']);
(function() {
var u="YOUR_MATOMO_URL";
_paq.push(['setTrackerUrl', u+'piwik.php']);
_paq.push(['setSiteId', SITE_ID]);
var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
g.type='text/javascript'; g.async=true; g.defer=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(g,s);
})();
*/

</script>