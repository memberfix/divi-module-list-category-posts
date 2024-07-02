<?php
/*
Plugin Name: Mf Divi Module List Category Posts
Plugin URI:  https://memberfix.rocks/
Description: Adds a new module to Divi Builder which generates a list of posts for one category or multiple categories. 
Version:     1.1.2
Author:      MemberFix
Author URI:  https://memberfix.rocks/
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: mfdivi-mf-divi-module-list-category-posts
Domain Path: /languages

Mf Divi Module List Category Posts is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.

Mf Divi Module List Category Posts is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with Mf Divi Module List Category Posts. If not, see https://www.gnu.org/licenses/gpl-2.0.html.
*/


if ( ! function_exists( 'mfdivi_initialize_extension' ) ):
/**
 * Creates the extension's main class instance.
 *
 * @since 1.0.0
 */
function mfdivi_initialize_extension() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/MfDiviModuleListCategoryPosts.php';
}
add_action( 'divi_extensions_init', 'mfdivi_initialize_extension' );
endif;
