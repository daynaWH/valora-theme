<?php
function valora_enqueues() {
	// Load style.css on the front-end
	wp_enqueue_style( 
		'valora-style',
		get_stylesheet_uri(),
		array(),
		wp_get_theme()->get( 'Version' ),
		'all'
	);

    // Load normalize.css
    wp_enqueue_style( 
        'valora-normalize', 
        get_theme_file_uri( '/assets/css/normalize.css'), 
        array(), 
        '12.1.0'
    );
}
add_action( 'wp_enqueue_scripts', 'valora_enqueues' );

// Load stylesheet for login page
function valora_login_stylesheet() {
    wp_enqueue_style(
        'custom-login',
        get_stylesheet_directory_uri() . '/style-login.css'
    );
}
add_action( 'login_enqueue_scripts', 'valora_login_stylesheet' );

// Add favicon
function add_favicon() {
    echo '<link rel="icon" type="image/x-icon" href="'.get_stylesheet_directory_uri().'/favicon">';
    echo '<link rel="icon" type="image/png" href="'.get_stylesheet_directory_uri().'/favicon/favicon-96x96.png" sizes="96x96" />';
    echo '<link rel="icon" type="image/svg+xml" href="'.get_stylesheet_directory_uri().'/favicon/favicon.svg" />';
    echo '<link rel="shortcut icon" href="'.get_stylesheet_directory_uri().'/favicon/favicon.ico" />';
    echo '<link rel="apple-touch-icon" sizes="180x180" href="'.get_stylesheet_directory_uri().'/favicon/apple-touch-icon.png" />';
    echo '<meta name="apple-mobile-web-app-title" content="Valora" />';
    echo '<link rel="manifest" href="'.get_stylesheet_directory_uri().'/favicon/site.webmanifest" />';
    }
add_action('wp_head', 'add_favicon');

// Load Custom Post Types & Custom Taxonomies
require get_template_directory() . '/inc/post-types-taxonomies.php';

// Load Custom blocks
require get_theme_file_path() . '/valora-blocks/valora-blocks.php';

// Change the title of the FAQ archive page
function modify_archive_title($title) {
    if (is_post_type_archive( 'val-faq' )) {
        $title = "Frequently Asked Questions";
    }
    return $title;
}
add_filter("get_the_archive_title", 'modify_archive_title');

// Shortcode for FAQ in-page navigation
function valora_faq_nav( $attributes ) {
    ob_start();
    
	$args = array(
		'post_type' => 'val-faq',
		'posts_per_page' => -1,
		'orderby' => 'id',
		'order' => 'asc',
	);

	$query = new WP_Query($args);

	if ($query -> have_posts()) {
		echo '<nav class="faq-nav">';
		while ($query -> have_posts()) {
			$query -> the_post();
			echo '<a href="#' . esc_attr(get_the_ID()) . '">' . esc_html(get_the_title()) . '</a>';
		}
		wp_reset_postdata();
		echo '</nav>';
	}

    return ob_get_clean();
}
add_shortcode( 'valora_faq_nav', 'valora_faq_nav' );

// Add ID to each looped post. References:
// https://developer.wordpress.org/reference/hooks/render_block/
function valora_faq_add_id( $block_content, $block ) {
    global $wp_query;

    if ( $block['blockName'] === 'core/post-title' ) {
        $post = get_post();
        $content = '<article id="' . esc_attr( $post->ID ) . '" class="faq-item">' . $block_content . '</article>';
        return $content;
    }

    return $block_content;
}
add_filter( 'render_block', 'valora_faq_add_id', 10, 2 );

// Lower Yoast SEO Metabox location
function yoast_to_bottom(){
	return 'low';
}
add_filter( 'wpseo_metabox_prio', 'yoast_to_bottom' );


function valora_enqueue_aos() {
    wp_enqueue_style(
        'aos-css',
        'https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css',
        [],
        null
    );

    wp_enqueue_script(
        'aos-js',
        'https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js',
        [],
        null,
        true
    );

    wp_enqueue_script(
        'aos-init',
        get_template_directory_uri() . '/assets/js/aos-init.js',
        ['aos-js'],
        null,
        true
    );
}
add_action('wp_enqueue_scripts', 'valora_enqueue_aos');

//Removing deliverable date from gift card product page.
remove_action( 'woocommerce_gc_form_fields_html', 'wc_gc_form_field_delivery_html', 40 );

// Change Logo in the Login page
function my_login_logo() { ?>
    <style type="text/css">
        #login h1 a {
            background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/favicon/web-app-manifest-512x512.png);
		background-repeat: no-repeat;
        border-radius: 50%;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );

// Link values attached to the logo in the Login page
function my_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'my_login_logo_url' );

function my_login_logo_url_title() {
    return 'Created for Valora Resort';
}
add_filter( 'login_headertext', 'my_login_logo_url_title' );

// Remove unused admin menus
function valora_remove_admin_links() {
		remove_menu_page( 'edit.php' );           // Remove Posts link
    	remove_menu_page( 'edit-comments.php' );  // Remove Comments link
}
add_action( 'admin_menu', 'valora_remove_admin_links' );

// Add dashboard widgets - Welcome Message
function wporg_add_dashboard_widgets() {
    // Welcome Widget
    wp_add_dashboard_widget(
        'custom_welcome_widget',
        'Welcome To Valora Resort Dashboard',
        'wporg_custom_welcome_widget_display'
    );

    // Tutorial Widget
    wp_add_dashboard_widget(
        'custom_tutorial_widget',
        'Managing WP Website - Tutorial',
        'display_tutorial_widget_content'
    );
}
add_action('wp_dashboard_setup', 'wporg_add_dashboard_widgets');

// Welcome Widget
function wporg_custom_welcome_widget_display() {
    echo '<p>👋 Welcome to your WordPress dashboard!</p>';
    echo '<p>Use the shortcuts below to quickly modify/view bookings:</p>';
    echo '<ul>';
    echo '<li><a href="' . admin_url('post-new.php?post_type=product') . '">Add New Products</a></li>';
    echo '<li><a href="' . admin_url('edit.php?post_type=wc_booking') . '">View Bookings</a></li>';
    echo '</ul>';
}

// Tutorial Widget
function display_tutorial_widget_content() {
    echo '<p>Need help updating content? View our step-by-step PDF tutorial below:</p>';
    echo '<p>';
    echo '<a href="' . esc_url( get_site_url() . '/wp-content/uploads/2025/05/client_tutorial-1.pdf' ) . '" target="_blank"   class="button button-primary">';
    echo '📄 View Tutorial PDF';
    echo '</a>';
    echo '</p>';
}