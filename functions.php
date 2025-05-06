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