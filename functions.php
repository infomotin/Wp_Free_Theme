 
<?php 
//this file is private file , control html file data 
// loade css file calling
    function theme_files(){
        wp_enqueue_script( 'dazzle-main-js', get_theme_file_uri('/js/scripts-bundled.js'),NULL,microtime(),true );
        wp_enqueue_style( 'google-font', '//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i' );
        wp_enqueue_style( 'font-awsam', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
        wp_enqueue_style( 'dazzle_css_main', get_stylesheet_uri(),null,microtime());
    }
    add_action('wp_enqueue_scripts','theme_files' );//when wp_enqueue_scripts is call then theme_files are call 

    // //add_actions is wp func
    // //tow paramittet 
    // first is wp_fun second fun name
    /*
     * Make theme available for translation.
     * Translations can be filed in the /languages/ directory.
     * If you're building a theme based on twentyfifteen, use a find and replace
     * to change 'twentyfifteen' to the name of your theme in all the template files
     */
    function dazzle_feature(){
        /*
     * Make theme available for translation.
     * Translations can be filed in the /languages/ directory.
     * If you're building a theme based on twentyfifteen, use a find and replace
     * to change 'twentyfifteen' to the name of your theme in all the template files
     */
    load_theme_textdomain( 'twentyfifteen', get_template_directory() . '/languages' );
    // Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );
 

        // this is for munu
        register_nav_menu('HeaderMenuLocations','Heade Menu Locations');
        register_nav_menu('footer1','footer 1');
        register_nav_menu('footer2','footer 2');
        register_nav_menus( array(
            'primary' => __( 'Primary Menu',      'dazzle_feature' ),
            'social'  => __( 'Social Links Menu', 'dazzle_feature' ),
        ) );
        
        //for theme support options
        /*
     * Switch default core markup for search form, comment form, and comments
     * to output valid HTML5.
     */
        add_theme_support( 'html5', array(
            'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
        ) );
        /*
     * Enable support for Post Formats.
     *
     * See: https://codex.wordpress.org/Post_Formats
     */
        add_theme_support( 'post-formats', array(
            'aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio', 'chat'
        ) );
        // $color_scheme  = twentyfifteen_get_color_scheme();
        // $default_color = trim( $color_scheme[0], '#' );


        // Setup the WordPress core custom background feature.
        add_theme_support( 'custom-background', apply_filters( 'twentyfifteen_custom_background_args', array(
            'default-color'      => $default_color,
            'default-attachment' => 'fixed',
        ) ) );
        //title tage control
        /*
     * Let WordPress manage the document title.
     * By adding theme support, we declare that this theme does not use a
     * hard-coded  tag in the document head, and expect WordPress to
     * provide it for us.
     */
        add_theme_support('title-tag');

    /*
     * Enable support for Post Thumbnails on posts and pages.
     *
     * See: https://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
     */
    add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 825, 510, true );
    }
    add_action( 'after_setup_theme', 'dazzle_feature');



    

    //contorling custom query form  functions file 
    
    function dazzle_post_feature($query){
        if(!is_admin() and is_post_type_archive( 'program' ) and $query->is_main_query() ){
            $query->set('orderby','title');
           $query->set('order','ASC');
           $query->set('posts_per_page',-1);
        }
        //$query->set('posts_per_page','1');//all result form function 
        //this conditions only works if it is main query and post arche post type is 'event' and not admin 
        if (!is_admin() and is_post_type_archive('event') and $query->is_main_query()){
           // $query->set('posts_per_page','1');//dashboard show only one result 
           //its looks like sql statements like where and set the conditions as like the do its go on this 
           //'posts_per_page'=>3,
           //     'post_type'=>'event',$query->set('post_type','event'); as like as 
           //     'order_by'=>'meta_value',//rand for every time randome event Show 
           //     'meta_key'=>'event_date',//'post_date',//order by query meta is custo value at any case 
           $query->set('order_by','meta_value');
           $query->set('meta_key','event_date');
           $query->set('posts_per_page','3');// every page this are custom this qurry result thats depend on query conditions 
        }
        //contorling the blog archive 
        // if (!is_admin() and is_post_type_archive('blog') and $query->is_main_query()){
        //     $query->set('posts_per_page','2');
        // }
        // 'posts_per_page'=>3,
        //         'post_type'=>'event',
        //         'order_by'=>'meta_value',//rand for every time randome event Show 
        //         'meta_key'=>'event_date',//'post_date',//order by query meta is custo value at any case 

        //         'meta_query'=>array(
        //             array(
        //               'key'=>'event_date',//its a sql like where conditions 
        //               'compare'=>'>=',
        //               'value'=>$today,
        //               'type'=>'numeric'

        //             )
        //         ),
    }
    add_action( 'pre_get_posts','dazzle_post_feature');
//must Plugin part 

    ?>