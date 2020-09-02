<?php

if (! class_exists('My_Youtube_Recommendation')){

    private $options;
    private $plugin_basename;
    private $plugin_slug;
    private $json_filename;
    private $plugin_version;


    public function __construct ($basename, $slug, $json_filename, $version){

        $this->options = get_option('my_yt_rec');
        $this->plugin_basename = $basename;
        $this->$plugin_slug = $slug;
        $this->$json_filename = $json_filename;
        $this->$plugin_version = $version;

        add_action('admin_menu', array ( $this, 'add_plugin_page'));
        add_action('admin_init', array ( $this, 'page_init'));
        add_action('admin_footer_text', array ( $this, 'page_footer'));
        add_action('admin_notices', array ( $this, 'show_notices'));
        add_filter("plugin_action_links_" . $this->plugin_basename, array( $this, 'add_setting_links');
    }

    public function add_plugin_page (){
        
        add_options_page(
            __('Settings', 'my-youtube-recommendation'),
            __('My Youtube Recomendation', 'my-youtube-recommendation'),
            'My Youtube Recommendation',
            'manage_options',
            $this->plugin_slug,
            array( $this, 'create_admin_page')
        );
    }

    public function create_admin_page (){
        ?>
        <div class="wrap">
            <h1><?php echo _('My Youtube Recomendation', 'my-youtube-recommendation'); ?></h1>
            <form method="post" action="options.php">
            <?php
                settings_fields( 'my_yt_rec_options' );
                do_settings_sections( 'my-yt-rec-admin' );
                submit_button();
            ?>
            </form>
        </div>

        <?php
    }

    public function page_init (){

        register_settings(
            'my_yt_rec_options',
            'my_yt_rec',
            array ($this, 'sanitize')
        );

        add_settings_section(
            'setting_section_id_1',
            __('General Settings', 'my-youtube-recommendation'),
            null,
            'my-yt-rec-admin'
        );

        add_setting_field(
            'channel_id', //ID
            __('Channel Id', 'my-youtube-recomendation'), //TITLE
            array ( $this, 'channel_id_callback' ), //CALLBACK
            'my-yt-rec-admin', //PAGE
            'setting_section_id_1' //SECTION
        );

        add_setting_field(
            'cache_expiration',
            __('Cache Expiration', 'my-youtube-recomendation'),
            array ( $this, 'cache_expiration_callback' ),
            'my-yt-rec-admin',
            'setting_section_id_1'
        );

        add_setting_section(
            'setting_section_id_2',
            __('Post Settings', 'my-youtube-recomendation'),
            null,
            'my-yt-rec-admin'
        );

        add_setting_field(
            'show_position',
            __('Show in Posts', 'my-youtube-recomendation'),
            array ( $this, 'cshow_position_callback' ),
            'my-yt-rec-admin',
            'setting_section_id_2'
        );

        add_setting_field(
            'layout',
            __('Layout', 'my-youtube-recomendation'),
            array ( $this, 'show_layout_callback' ),
            'my-yt-rec-admin',
            'setting_section_id_2'
        );

        add_setting_field(
            'limit',
            __('Videos in List', 'my-youtube-recomendation'),
            array ( $this, 'limit_callback' ),
            'my-yt-rec-admin',
            'setting_section_id_2'
        );

        add_setting_section(
            'setting_section_id_3',
            __('Customize Style', 'my-youtube-recomendation'),
            null,
            'my-yt-rec-admin'
        );

        add_setting_field(
            'custom_css',
            __('Your CSS', 'my-youtube-recomendation'),
            array ( $this, 'custom_css_callback' ),
            'my-yt-rec-admin',
            'setting_section_id_3'
        );
    }

    public function channel_id_callback (){
        $value = isset( $this->options['channel_id']) ? esc_attr( $this->options['channel_id'] ) : '';
        ?>

        <input type="text" id="my_yt_rec[channel_id]" valeu="<?php echo $value ?>" class="regular-text">
        <p class="description"><?php echoo __('sample', 'my-youtube-recommendation')?>: U</p>
    }

}