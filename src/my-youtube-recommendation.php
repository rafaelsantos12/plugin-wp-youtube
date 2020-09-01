<?php
/**
 * @link             https://github.com/rafaelsantos12/plugin-wp-youtube
 * @since            1.0.0
 * @package          My_Youtube_Recomendation
 * 
 * @wordpress-plugin
 * Plugin Name:      My Youtube Recommendation
 * Plugin URI:       https://github.com/rafaelsantos12/plugin-wp-youtube
 * Description:      Display the last videos from a Youtube channel using Youtube feed and 
 * Version:          1.0.0
 * Author:           Rafael Santos
 * Author URI:       https://devrafaelsantos.com/
 * Lincense:         GPLv3 or later
 * License URI:      https://www.gnu.org/licenses/gpl-3.0.html  
 * Text Domain:      my-youtube-recommendation
 * Domain Path:      /laguages/
*/

if ( ! defined( 'WPINC' ) ){
    wp_die();
}

//Plugin Version 
if ( ! defined('MY_YOUTUBE_RECOMMENDATION_VERSION' ) ){
    defined('MY_YOUTUBE_RECOMMENDATION_VERSION', '1.0.0');
}

//Plugin Name 
if ( ! defined('MY_YOUTUBE_RECOMMENDATION_NAME' ) ){
    defined('MY_YOUTUBE_RECOMMENDATION_NAME', 'My Youtube Recommendation' );
}

//Plugin Slug
if ( ! defined('MY_YOUTUBE_RECOMMENDATION_PLUGIN_SLUG' ) ){
    defined('MY_YOUTUBE_RECOMMENDATION_PLUGIN_SLUG', 'my-youtube-recommendation' );
}

//Plugin Basename
if ( ! defined('MY_YOUTUBE_RECOMMENDATION_BASENAME' ) ){
    defined('MY_YOUTUBE_RECOMMENDATION_BASENAME', plugin_basename(__FILE__) );
}

//Plugin Folder
if ( ! defined('MY_YOUTUBE_RECOMMENDATION_PLUGIN_DIR' ) ){
    defined('MY_YOUTUBE_RECOMMENDATION_PLUGIN_DIR', plugin_dir_path(__FILE__) );
}

//Plugin File Name
if ( ! defined('MY_YOUTUBE_RECOMMENDATION_JSON_FILENAME' ) ){
    defined('MY_YOUTUBE_RECOMMENDATION_JSON_FILENAME', 'my-yt-rec.json' );
}

require_once MY_YOUTUBE_RECOMMENDATION_PLUGIN_DIR . 'includes/class-my-youtube-recommendation.php';
require_once MY_YOUTUBE_RECOMMENDATION_PLUGIN_DIR . 'includes/class-my-youtube-recommendation-json.php';
require_once MY_YOUTUBE_RECOMMENDATION_PLUGIN_DIR . 'includes/class-my-youtube-recommendation-shortcode.php';
require_once MY_YOUTUBE_RECOMMENDATION_PLUGIN_DIR . 'includes/class-my-youtube-recommendation-widget.php';

if (is_admin())
    require_once MY_YOUTUBE_RECOMMENDATION_PLUGIN_DIR . 'includes/class-my-youtube-recommendation-admin.php';