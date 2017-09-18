<?php
/**
 * @since 1.0.0
 * @author R4c00n <marcel.kempf93@gmail.com>
 * @licence MIT
 */
namespace Lib;


use MagicAdminPage\MagicAdminPage;
use MBVMedia\BambeeWebsite;

/**
 * The class representing the website (user frontend).
 *
 * @since 1.0.0
 * @author R4c00n <marcel.kempf93@gmail.com>
 * @licence MIT
 */
class CustomWebsite extends BambeeWebsite {

    /**
     * @since 1.0.0
     * @return void
     */
    protected function __construct() {
        parent::__construct();
    }

    /**
     * Add custom actions to this method or override predefined actions
     */
    public function addActions() {
        parent::addActions();
    }

    /**
     * Add custom filters to this method or override predefined actions
     */
    public function addFilters() {
        parent::addFilters();

	    add_filter( 'nav_menu_link_attributes', array( $this, 'menuItemAddAttributes'), 10, 3 );
    }

    /**
     * This is where the magic begins.
     *
     * @since 1.4.2
     *
     * @param CustomBambee $bambee
     */
    public static function run() {

        CustomBambee::self()->getShortcodeManager()->addShortcodes();

        $bambeeWebsite = self::self();
        $bambeeWebsite->addActions();
        $bambeeWebsite->addFilters();
        $bambeeWebsite->addScripts();
        $bambeeWebsite->addStyles();
    }

	/**
	 * Custom Nav Menu Class For Page ID
	 */
	public function menuItemAddAttributes( $atts, $item, $args ) {
		if( isset( $item->object_id ) ) {
			$atts['data-page-id'] = $item->object_id;
		}

		return $atts;
	}
}