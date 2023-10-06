<?php
/**
 * Plugin Name: Skazy RGPD (Tarteaucitron)
 * Description: Plugin de gestion de services/cookies pour respect du RGPD. (Tarteaucitron)
 * Author: Baptiste GRAUER, pour Skazy
 * Requires at least: 6.2
 * Requires PHP: 8
 * Version: 2.0.0
 */

/*---------------------------------------------------------- Général ----------------------------------------------------------*/

// Importe de Tarteaucitron et applique la surcharge CSS.
function skazyrgpd_tarteaucitron()
{
    // Import de tarteaucitron
    require_once "public/skazyrgpd-tarteaucitron.php";
    // Préparation de la surcharge CSS.
    $options = get_option('skazyrgpd_settings');
    wp_enqueue_style('override-tarteaucitron', plugin_dir_url(__FILE__) . '/includes/skazyrgpd.css');
    $style = "
        #tarteaucitronRoot{
            --tac-primary-bg: " . $options['backgroundColor'] . ";
            --tac-primary-txt: " . $options['textColor'] . ";
        }";
    // Application de la surcharge.
    wp_add_inline_style('override-tarteaucitron', $style);
}

/*---------------------------------------------------------- Admin ----------------------------------------------------------*/

/*---------------------------------------------------------- Paramètres ----------------------------------------------------------*/

// Initialisation des paramètres
function skazyrgpd_settings_init()
{
    // Signale à WordPress que cette option sera utilisée.
    register_setting('skazyrgpd-admin', 'skazyrgpd_settings');
    // Récupère les variables du fichier skazyrgpd-settings.php.
    global $settings;
    global $sections;
    // Parcours et crée toutes les catégories (mais ne les affiche pas).
    foreach ($sections as $section) {
        add_settings_section($section['id'], $section['title'], $section['callback'], $section['page']);
    }
    // Parcours et crée tous les champs (mais ne les affiche pas).
    foreach ($settings as $setting) {
        add_settings_field($setting['id'], ''/*Vide car inutilisé*/, $setting['callback'], $setting['page'], $setting['section']);
    }
}

/*---------------------------------------------------------- Page Admin ----------------------------------------------------------*/

// Import de UIkit pour la page admin.
function skazyrgpd_admin_head()
{
    echo "
    <!-- UIkit CSS -->
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/uikit@3.16.22/dist/css/uikit.min.css' />
    
    <!-- UIkit JS -->
    <script src='https://cdn.jsdelivr.net/npm/uikit@3.16.22/dist/js/uikit.min.js'></script>
    <script src='https://cdn.jsdelivr.net/npm/uikit@3.16.22/dist/js/uikit-icons.min.js'></script>
    ";
}

// Affichage de la page admin 'Skazy RGPD'.
function skazyrgpd_admin_menu()
{
    ?>
    <div class="wrap">
        <h1>Paramètres Tarteaucitron</h1>
        <form action="options.php" method="post">
            <?php
            // Champs cachés utilisés par WordPress contenant des mesures de sécurités
            settings_fields('skazyrgpd-admin');
            // Ajout les paramètres par défaut s'ils n'ont pas encore été créés.
            global $defaults;
            add_option('skazyrgpd_settings', $defaults);
            ?>
            <ul uk-accordion>
                <?php // Affiche tout les champs de chaque catégorie
                global $sections;
                foreach ($sections as $section): ?>
                    <!-- Pour ouvrir automatiquement la 1ère catégorie de la liste -->
                    <li <?php if ($section['id'] == 'skazyrgpd_section_general'): ?>class="uk-open" <?php endif; ?>>
                        <!-- Titre de la catégorie -->
                        <a class="uk-accordion-title uk-card uk-card-body uk-card-default uk-card-small" href="#">
                            <?php echo $section['title'] ?>
                        </a>
                        <!-- Contenu de la catégorie -->
                        <div class="uk-accordion-content uk-card uk-card-body uk-card-default uk-card-small">
                            <?php do_settings_fields($section['page'], $section['id']); // Affichages des champs par catégorie  ?>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
            <?php submit_button() ?>
        </form>
        <!-- Note -->
        <h4 style="margin-top:5px; margin-bottom: 5px;">Note :</h4>
        <p>Lors de l'activation d'un service, veuillez vérifier sur <a href="https://tarteaucitron.io" target="blank_">Tarteaucitron</a> quels éléments doivent être retirés du site pour que le module puisse fonctionner comme prévu.</p>
    </div>
    <?php
}

// Ajoute la page 'Skazy RGPD' à l'admin WordPress.
function skazyrgpd_add_admin_menu()
{
    add_menu_page('Skazy RGPD - Général', 'Skazy RGPD', 'manage_options', "skazyrgpd-admin", "skazyrgpd_admin_menu");
}

/*---------------------------------------------------------- Initialisation du plugin ----------------------------------------------------------*/
// Exécute toutes les fonctions de ce fichier

require_once "settings/skazyrgpd-settings.php"; // Récupération des paramètres.

// Initialisation

add_action('wp_head', 'skazyrgpd_tarteaucitron'); // Tarteaucitron + Surcharge CSS.

// Admin

add_action('admin_head', 'skazyrgpd_admin_head'); // Uikit (pour le menu admin).
add_action('admin_init', 'skazyrgpd_settings_init'); // Menu page admin.
add_action('admin_menu', 'skazyrgpd_add_admin_menu'); // Page admin.

?>