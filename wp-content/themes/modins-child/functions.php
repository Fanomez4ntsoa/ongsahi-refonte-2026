<?php
/**
 * Modins Child — functions.php
 *
 * Point d'entrée PHP du thème enfant. Tout ce que tu ajoutes ici
 * est chargé APRÈS le functions.php du parent (modins), donc tu peux
 * surcharger des hooks ou en enregistrer de nouveaux sans toucher
 * au code du thème parent (qui sera écrasé à la prochaine mise à jour).
 *
 * Convention projet (cf. CLAUDE.md) :
 *   - Toutes les fonctions sont préfixées `ongsahi_`
 *     pour éviter toute collision avec le parent ou un plugin.
 *   - Les champs custom passent par Meta Box (PAS ACF).
 *   - Les composants visuels récurrents passent par des widgets
 *     Elementor custom, déclarés dans includes/widgets/.
 *
 * @package ModinsChild
 */

// Sécurité : on bloque l'accès direct au fichier hors du contexte WP.
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Charge la feuille de style du parent puis celle du child.
 *
 * Méthode moderne (depuis WP 5.0+) : on enqueue les deux feuilles
 * via wp_enqueue_scripts plutôt que d'utiliser @import dans style.css
 * (plus performant, parallélisable par le navigateur).
 *
 * Ordre important : on déclare le child comme dépendant du parent
 * pour garantir que le CSS du child est chargé APRÈS celui du parent
 * → ses règles peuvent l'overrider sans avoir à jouer sur la spécificité.
 */
function ongsahi_enqueue_styles() {
    $parent_handle = 'modins-parent-style';
    $theme         = wp_get_theme(); // objet WP_Theme du child courant

    // 1) Feuille du parent.
    wp_enqueue_style(
        $parent_handle,
        get_template_directory_uri() . '/style.css',
        array(),
        $theme->parent() ? $theme->parent()->get( 'Version' ) : null
    );

    // 2) Feuille du child, dépendante de celle du parent.
    wp_enqueue_style(
        'modins-child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_handle ),
        $theme->get( 'Version' ) // cache-buster basé sur la version du child
    );
}
add_action( 'wp_enqueue_scripts', 'ongsahi_enqueue_styles' );

/**
 * Enregistre les widgets Elementor custom du projet SAHI.
 *
 * Hook prêt à l'emploi : dès que tu déposes une classe widget dans
 * includes/widgets/class-ongsahi-mon-widget.php (qui étend
 * \Elementor\Widget_Base), tu pourras l'enregistrer ici via :
 *
 *     $widgets_manager->register( new \ONGSAHI\Widgets\Mon_Widget() );
 *
 * Le hook `elementor/widgets/register` est le point d'entrée officiel
 * d'Elementor 3.5+ (l'ancien `elementor/widgets/widgets_registered`
 * est déprécié). Il n'est appelé que si Elementor est actif, donc
 * pas besoin de tester la présence du plugin avant d'attacher le hook.
 *
 * @param \Elementor\Widgets_Manager $widgets_manager Instance du gestionnaire de widgets Elementor.
 */
function ongsahi_register_elementor_widgets( $widgets_manager ) {
    // Auto-load des fichiers de widgets : tout fichier .php déposé dans
    // includes/widgets/ sera inclus automatiquement. Pratique tant que le
    // nombre de widgets reste modeste ; à remplacer par un autoloader
    // PSR-4 (Composer) le jour où ça grossit.
    $widgets_dir = trailingslashit( get_stylesheet_directory() ) . 'includes/widgets/';

    if ( is_dir( $widgets_dir ) ) {
        foreach ( glob( $widgets_dir . '*.php' ) as $widget_file ) {
            require_once $widget_file;
        }
    }

    // TODO SAHI : enregistrer ici chaque widget custom au fur et à mesure.
    // Exemple :
    // $widgets_manager->register( new \ONGSAHI\Widgets\Hero_Section() );
}
add_action( 'elementor/widgets/register', 'ongsahi_register_elementor_widgets' );
