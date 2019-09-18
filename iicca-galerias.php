<?php

/**
 * Plugin Name: IICCA GALERIAS
 * Plugin URI: http://www.enteractive.com.bo/
 * Description: Plugin de galerias de fotos
 * Version: 1.0.0
 * Author: Josh Zulett
 * Author URI: http://www.joshzulett.com/
 * Requires at least: 5.0
 * Tested up to: 5.2
 * Text Domain: IICCA ROLES
 */

defined( 'ABSPATH' ) or die( 'All Die!' );

define('IICCA_GALERIAS', plugin_dir_path( __FILE__ ));

define('IICCA_GALERIAS_URL', plugin_dir_url( __FILE__ ));

/**
 * Llama al objeto que carga todo el contenido del plugin
 */
require_once 'loader.php';

/**
 * Instancia el objeto de carga
 */
$loader = new IiccaGalerias();

?>