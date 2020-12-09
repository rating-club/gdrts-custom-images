<?php

/*
Plugin Name:       GD Rating System Pro: Custom Images
Plugin URI:        https://rating.dev4press.com/
Description:       This is a demo plugin showing how to add a custom images for use with GD Rating System Pro plugin.
Author:            Milan Petrovic
Author URI:        https://www.dev4press.com/
Text Domain:       gdrts-ascii-font
Version:           3.1
Requires at least: 5.0
Tested up to:      5.6
Requires PHP:      7.0
License:           GPLv3 or later
License URI:       https://www.gnu.org/licenses/gpl-3.0.html

== Copyright ==
Copyright 2008 - 2020 Milan Petrovic (email: milan@gdragon.info)

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program. If not, see <http://www.gnu.org/licenses/>
*/

class gdrts_custom_images {
    /* whenever you make changes, modify the version number */
    public $version = '3.1.0';

    public function __construct() {
        /* hook into main plugin init point */
        add_action('gdrts_load', array($this, 'load'));
    }

    public function load() {
        require_once('emoji-shine.php');

        /* load CSS file that will load actual images */
        add_action('gdrts_register_enqueue_files', array($this, 'register_enqueue_files'), 10, 4);
        add_action('gdrts_enqueue_core_files', array($this, 'enqueue_core_files'));

        /* add filters for all four types of images */
        add_filter('gdrts_list_stars_styles_images', array($this, 'list_stars_images'));
        add_filter('gdrts_list_thumbs_styles_images', array($this, 'list_thumbs_images'));
        add_filter('gdrts_list_likes_styles_images', array($this, 'list_likes_images'));
        add_filter('gdrts_list_emote_styles_images', array($this, 'list_emote_images'));

        /* add filters for getting emoticon objects */
        add_filter('gdrts_get_emoticons_object_emoji-shine', array($this, 'object_emoji_shine'));
    }

    public function register_enqueue_files($js_full, $css_full, $js_dep, $css_dep) {
        $url = plugins_url('/gdrts-custom-images/css/custom-images.css');

        wp_register_style('gdrts-images-custom', $url, $css_dep, $this->version);
    }

    public function enqueue_core_files() {
        wp_enqueue_style('gdrts-images-custom');
    }

    public function list_stars_images($list) {
        /* add custom stars image sets to the list.
         * list key is the code for each set, with 
         * value set to be set label */
        $list['star-alt'] = __("Star Alternative (512px)", "gdrts-custom-images");
        $list['oxygen-alt'] = __("Oxygen Star Alternative (256px)", "gdrts-custom-images");

        return $list;
    }

    public function list_thumbs_images($list) {
        /* add custom thumbs image sets to the list.
         * list key is the code for each set, with 
         * value set to be set label */
        $list['thumb-alt'] = __("Thumbs Alternative (256px)", "gdrts-custom-images");

        return $list;
    }

    public function list_likes_images($list) {
        /* add custom likes image sets to the list.
         * list key is the code for each set, with 
         * value set to be set label */
        $list['like-alt'] = __("Likes Alternative (256px)", "gdrts-custom-images");

        return $list;
    }

    public function list_emote_images($list) {
        /* add custom emote image sets to the list.
         * list key is the code for each set, with 
         * value set to be set label */
        $list['emoji-shine'] = __("Emoji Shine (128px)", "gdrts-custom-images");

        return $list;
    }

    public function object_emoji_shine($obj) {
        return new gdrts_emoticons_emoji_shine();
    }
}

$__gdrts_custom_images = new gdrts_custom_images();
