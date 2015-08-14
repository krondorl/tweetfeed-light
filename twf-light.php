<?php

/*
Plugin Name: Tweetfeed Light
Plugin URI: http://wp.tutsplus.com
Description: Show latest Tweets in sidebar for a given Twitter user 
Version: 1.0
Author: Adam Burucs
Author URI: http://wp.tutsplus.com
*/
 
class AB_Tweetfeed_light {
public function __construct() {
    // set plugin path
    $this->pluginUrl = WP_PLUGIN_URL . '/tweetfeed-light';
     
    // set shortcode
    add_shortcode('tweetfeed-light', array($this, 'shortcode'));
     
    // import scripts
    wp_enqueue_script('tweetable-script',   $this->pluginUrl . '/js/jquery.tweetable.min.js', array( 'jquery' ));
     
    // import style
    wp_enqueue_style('tweetable-style',     $this->pluginUrl . '/css/style.css');
}
 
public function loadTweets($user, $limit) {
 
    // render tweets to div element
    echo '<div id="tweets"></div>';
 
    // render javascript code to do the magic
    echo
    '<script type="text/javascript">
    jQuery(function(){
    jQuery("#tweets").tweetable({
    username: "' . $user . '",
    limit: ' . $limit . ',
    replies: true,
    position: "append"});
    });
    </script>';
 
}
 
// render tweets with shortcode
public function shortcode($data) {
    return $this->loadTweets($data['user'], $data['limit']);
}
}
 
// run plugin
$tweetfeed_light = new AB_Tweetfeed_Light();
