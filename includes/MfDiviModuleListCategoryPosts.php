<?php

class MFDIVI_MfDiviModuleListCategoryPosts extends DiviExtension {

	/**
	 * The gettext domain for the extension's translations.
	 *
	 * @since 1.0.0
	 *
	 * @var string
	 */
	public $gettext_domain = 'mfdivi-mf-divi-module-list-category-posts';

	/**
	 * The extension's WP Plugin name.
	 *
	 * @since 1.0.0
	 *
	 * @var string
	 */
	public $name = 'mf-divi-module-list-category-posts';

	/**
	 * The extension's version
	 *
	 * @since 1.0.0
	 *
	 * @var string
	 */
	public $version = '1.0.0';

	/**
	 * MFDIVI_MfDiviModuleListCategoryPosts constructor.
	 *
	 * @param string $name
	 * @param array  $args
	 */
	public function __construct( $name = 'mf-divi-module-list-category-posts', $args = array() ) {
		$this->plugin_dir     = plugin_dir_path( __FILE__ );
		$this->plugin_dir_url = plugin_dir_url( $this->plugin_dir );

		parent::__construct( $name, $args );
	}
}

new MFDIVI_MfDiviModuleListCategoryPosts;
