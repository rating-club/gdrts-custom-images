<?php

if (!defined('ABSPATH')) exit;

class gdrts_emoticons_emoji_shine extends gdrts_core_emoticons {
    public $class_prefix = 'gdrts-emoji-shine gdrts-emoji-shine-';

    public $default = array(
        'happy' => 'happy-4',
        'funny' => 'laughing-2',
        'love' => 'in-love',
        'great' => 'surprised',
        'sad' => 'sad-2',
        'angry' => 'angry-2'
    );

    public function __construct() {
        $this->name = 'emoji-shine';
        $this->label = 'Emoji Shine';
        $this->size = 128;

        parent::__construct();
    }

    public function enqueue() {
        $url = plugins_url('css/emote/'.$this->name.'/set'.(gdrts_plugin()->is_debug ? '' : '.min').'.css', __FILE__);

        wp_enqueue_style('gdrts-emoticons-'.$this->name, $url, array(), gdrts_settings()->file_version());
    }

    public function sprites() {
        $this->icons = array(
            'angel',
            'angry-1',
            'angry-2',
            'arrogant',
            'bored',
            'confused',
            'cool-1',
            'cool-2',
            'crying-1',
            'crying-2',
            'cute',
            'emoji',
            'happy-1',
            'happy-2',
            'happy-3',
            'happy-4',
            'in-love',
            'kiss-1',
            'kiss-2',
            'laughing-1',
            'laughing-2',
            'muted',
            'nerd',
            'sad-1',
            'sad-2',
            'scare',
            'serious',
            'shocked',
            'sick',
            'sleepy',
            'sprites',
            'surprised',
            'suspicious',
            'tongue',
            'vain',
            'wink-1',
            'wink-2'
        );
    }
}
