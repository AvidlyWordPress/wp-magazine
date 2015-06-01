<?php
/**
 * Plugin Name: WordPress Magazine
 * Plugin URI: https://github.com/H1FI/wp-magazine
 * Description: Template for WordPress magazines.
 * Version: 1.0.3
 * Author: Tomi Mäenpää / H1
 * Author URI: https://h1.fi
 * License: GPL2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Domain Path: /languages
 * Text Domain: wp-magazine
 */

/*  Copyright 2015  Tomi Mäenpää / H1  (email : tomi@h1.fi)

	This program is free software; you can redistribute it and/or modify
	it under the terms of the GNU General Public License, version 2, as
	published by the Free Software Foundation.

	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with this program; if not, write to the Free Software
	Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

if ( ! defined( 'ABSPATH' ) ) exit;

add_action( 'plugins_loaded', 'wpm_load_textdomain' );
if ( ! function_exists( 'wpm_load_textdomain' ) ) {
	/**
	 * Load plugin textdomain.
	 *
	 * @since 0.1
	 */
	function wpm_load_textdomain() {
		load_plugin_textdomain( 'wp-magazine', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
	}
}

require_once( 'includes/wp-magazine-post-type.php' );
require_once( 'includes/wp-magazine-taxonomy.php' );
require_once( 'includes/wp-magazine-actions-filters.php' );
require_once( 'includes/wp-magazine-functions.php' );
