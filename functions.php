<?php


function load_stylesheets(){
    //wp_register_style('bootstrap', get_template_directory_uri().'/css/bootstrap.min.css', '', '3.3.6', 'all');
    //wp_enqueue_style('bootstrap');

    wp_register_style('themify-icons', get_template_directory_uri().'/inc/cloudofficepath/assets/vendor/themify-icons/themify-icons.css', '', '1', 'all');
    wp_enqueue_style('themify-icons');

    wp_register_style('font-awesome', get_template_directory_uri().'/inc/cloudofficepath/assets/vendor/fontawesome/css/font-awesome.min.css', '', '1', 'all');
    wp_enqueue_style('font-awesome');

    wp_register_style('plugin', get_template_directory_uri().'/inc/cloudofficepath/assets/vendor/charts-c3/plugin.css', '', '1', 'all');
    wp_enqueue_style('plugin');

    wp_register_style('jquery-jvectormap', get_template_directory_uri().'/inc/cloudofficepath/assets/vendor/jvectormap/jquery-jvectormap-2.0.3.css', '', '2', 'all');
    wp_enqueue_style('jquery-jvectormap');

    wp_register_style('main', get_template_directory_uri().'/inc/cloudofficepath/assets/css/main.css', '', '1', 'all');
    wp_enqueue_style('main');


}
add_action('wp_enqueue_scripts', 'load_stylesheets');

function load_scripts(){
    wp_register_script('libscripts', get_template_directory_uri() . '/inc/cloudofficepath/assets/bundles/libscripts.bundle.js', '', '1.11.1', true);
    wp_enqueue_script( 'libscripts');

    wp_register_script('vendorscripts', get_template_directory_uri() . '/inc/cloudofficepath/assets/bundles/vendorscripts.bundle.js', '', 1, true);
    wp_enqueue_script( 'vendorscripts');

    wp_register_script('c3', get_template_directory_uri() . '/inc/cloudofficepath/assets/bundles/c3.bundle.js', '', 1, true);
    wp_enqueue_script( 'c3');

    wp_register_script('jvectormap', get_template_directory_uri() . '/inc/cloudofficepath/assets/bundles/jvectormap.bundle.js', '', 1, true);
    wp_enqueue_script( 'jvectormap');

    wp_register_script('theme', get_template_directory_uri() . '/inc/cloudofficepath/assets/js/theme.js', '', 1, true);
    wp_enqueue_script( 'theme');

    wp_register_script('pages', get_template_directory_uri() . '/inc/cloudofficepath/assets/js/pages/index.js', '', 1, true);
    wp_enqueue_script( 'pages');


    wp_register_script('todo', get_template_directory_uri() . '/inc/cloudofficepath/assets/js/pages/todo-js.js', '', 1, true);
    wp_enqueue_script( 'todo');



}
add_action('wp_enqueue_scripts', 'load_scripts');

//add theme support to template
add_theme_support('menus');

register_nav_menus(
    array(
        'top-menu' => 'Top Menu',
    )
);



//enable post thumbnails
add_theme_support('post-thumbnails');

//auto reduce post image sizes
add_image_size('post_image', 1000, 550, true);

//enable sidebar widget
// register_sidebar(
//     array(
//         'name' => 'Sidebar',
//         'id' => 'page-sidebar',
//         'class' => 'col-md-4',
//         'before_title' => '<h4>',
//         'after_title' => '</h4>',
//     )
// );


//blog sidebar
// register_sidebar(
//     array(
//         'name' => 'Blog Sidebar',
//         'id' => 'blog-sidebar',
//         'class' => 'col-md-4',
//         'before_title' => '<h4>',
//         'after_title' => '</h4>',
//     )
// );


//woocommerce support
function mytheme_add_woocommerce_support() {
    add_theme_support( 'woocommerce', array(
        'thumbnail_image_width' => 150,
        'single_image_width'    => 300,

        'product_grid'          => array(
            'default_rows'    => 3,
            'min_rows'        => 2,
            'max_rows'        => 8,
            'default_columns' => 4,
            'min_columns'     => 2,
            'max_columns'     => 5,
        ),
    ) );
}

// function mytheme_add_woocommerce_support() {
//     add_theme_support( 'woocommerce' );
// }

add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );

add_theme_support( 'wc-product-gallery-zoom' );
add_theme_support( 'wc-product-gallery-lightbox' );
add_theme_support( 'wc-product-gallery-slider' );


/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function register_footer_sidebars() {
    
   register_sidebar( array(
        'name'          => esc_html__( 'Footer Section One', 'zk-theme' ),
        'id'            => 'footer-section-one',
        'description'   => esc_html__( 'Footer Menu One Links', 'nd_dosth' ),
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '',
        'after_title'   => '',
    ) );
    
    register_sidebar( array(
        'name'          => esc_html__( 'Footer Section Two', 'zk-theme' ),
        'id'            => 'footer-section-two',
        'description'   => esc_html__( 'Footer Menu Two Links', 'zk-theme' ),
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '',
        'after_title'   => '',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Footer Section Three', 'zk-theme' ),
        'id'            => 'footer-section-three',
        'description'   => esc_html__( 'Footer Menu Three Links', 'zk-theme' ),
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '',
        'after_title'   => '',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Footer Section Four', 'zk-theme' ),
        'id'            => 'footer-section-four',
        'description'   => esc_html__( 'Footer Menu Four Social Icons', 'zk-theme' ),
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '',
        'after_title'   => '',
    ) );
}
add_action( 'widgets_init', 'register_footer_sidebars' ); 



/* Remove from the administration bar */
function remove_logo_wp_admin() {
        global $wp_admin_bar;
        $wp_admin_bar->remove_menu( 'wp-logo' );
}
add_action( 'wp_before_admin_bar_render', 'remove_logo_wp_admin', 0 );



function remove_footer_admin () 
{
    echo '<span id="footer-thankyou">This is a custom framework Developed by <a href="www.###.com" target="_blank">Proudly Gweke Adasen</a></span>';
}
 
add_filter('admin_footer_text', 'remove_footer_admin');


add_action("wp_ajax_applogin", "handle_custom_login"); //action name for wp_ajax_{action_name}






// Setup for Woocommerce API:
    require __DIR__ . '/vendor/autoload.php';

    use Automattic\WooCommerce\Client;



 




    



//Add category
function nihcloud_add_category( WP_REST_Request $request ) 
{
    
    $woocommerce = new Client(
        'http://www.nd.com/iaas2/', // Your store URL
        'ck_185863c04faba83c10f62744e4a04de18fb9954', // Your consumer key
        'cs_9bf91145bd64b3e33b8aaceb8510e73a8d86a61', // Your consumer secret
        [
            'wp_api' => true, // Enable the WP REST API integration
            'version' => 'wc/v3', // WooCommerce WP REST API version
            'query_string_auth' => true // Force Basic Authentication as query string true and using under HTTPS
        ]
    );

    //collect the value from the request body
    $arr_request = json_decode( $request->get_body() );

    $name = $arr_request->name;
    $description = $arr_request->description;
    $src = $arr_request->image;



    $data = [
        'name' => $name,
        'description' => $description,
        'image' => [
            'src' => $src
            ]

        ];

    
  


  //:::::Category API:::::::://

    //hook to connect to list all categories
    add_action( 'rest_api_init', function () {
        register_rest_route( 'ncloud_api/v1', 'get_category', array(
          'methods' => 'GET',
          'callback' => 'ncloud_get_category',
        ) );
      } );


      //hook to connect to  add categories
    add_action( 'rest_api_init', function () {
        register_rest_route( 'nhcloud_api/v1', 'add_category', array(
          'methods' => 'POST',
          'callback' => 'nhcloud_add_category',
        ) );
      } );

      //hook to connect to  update categories
    add_action( 'rest_api_init', function () {
        register_rest_route( 'nshcloud_api/v1', 'update_category', array(
          'methods' => WP_REST_Server::EDITABLE,
          'callback' => 'nshcloud_update_category',
        ) );
      } );

      //hook to connect to  delete categories
    add_action( 'rest_api_init', function () {
        register_rest_route( 'nshcloud_api/v1', 'delete_category', array(
          'methods' =>  WP_REST_Server::DELETABLE,
          'callback' => 'nshcloud_delete_category',
        ) );
      } );

      



        //:::::Product API:::::::://

    //hook to list all products
    add_action( 'rest_api_init', function () {
        register_rest_route( 'nihcloud_api/v1', 'get_product', array(
          'methods' => 'GET',
          'callback' => 'nshcloud_get_product',
        ) );
      } );


      //hook to connect to  add products
    add_action( 'rest_api_init', function () {
        register_rest_route( 'nshcloud_api/v1', 'add_product', array(
          'methods' => 'POST',
          'callback' => 'ihcloud_add_product',
        ) );
      } );

      //hook to connect to  update products
    add_action( 'rest_api_init', function () {
        register_rest_route( 'nshcloud_api/v1', 'update_product', array(
          'methods' => WP_REST_Server::EDITABLE,
          'callback' => 'nhcloud_update_product',
        ) );
      } );

      //hook to connect to  delete products
    add_action( 'rest_api_init', function () {
        register_rest_route( 'nshcloud_api/v1', 'delete_product', array(
          'methods' =>  WP_REST_Server::DELETABLE,
          'callback' => 'nshcloud_delete_product',
        ) );
      } );





//store front enqueue



  function nhcloud_storefront_scripts() {
      
    wp_enqueue_style ( 'bootstrap-style', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css' );
    add_theme_support( 'woocommerce' );
    wp_enqueue_style ( 'storefront-main', get_template_directory_uri() . '/assets/css/main.css' );
    wp_enqueue_style ( 'storefront-main', get_template_directory_uri() . '/assets/css/fontawesome/all.min.css' );
    wp_enqueue_style ( 'bootstrap-icon', 'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css' );

      

  }

  add_action( 'wp_enqueue_scripts', 'nhcloud_storefront_scripts');

  function nhcloud_storefront_js_scripts() {
      
    
    wp_enqueue_script ( 'javascript', get_template_directory_uri() . '/assets/js/core/jquery.min.js' );
    wp_enqueue_script ( 'bootstrappopoerjs', 'https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js', array('jquery') );
    wp_enqueue_script ( 'bootstrapjs', get_template_directory_uri() . '/assets/js/core/bootstrap.min.js' );
    wp_enqueue_script ( 'mainjs', get_template_directory_uri() . '/assets/js/core/main.js' );
    wp_enqueue_script ( 'fancyjs', get_template_directory_uri() . '/assets/js/core/all.min.js' );
    
      

  }
  add_action( 'wp_enqueue_scripts', 'nhcloud_storefront_js_scripts');


  