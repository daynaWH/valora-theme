<?php
/**
 * Registers the block using a `blocks-manifest.php` file, which improves the performance of block type registration.
 * Behind the scenes, it also registers all assets so they can be enqueued
 * through the block editor in the corresponding context.
 *
 * @see https://make.wordpress.org/core/2025/03/13/more-efficient-block-type-registration-in-6-8/
 * @see https://make.wordpress.org/core/2024/10/17/new-block-type-registration-apis-to-improve-performance-in-wordpress-6-7/
 */
function valora_blocks_init() {
	/**
	 * Registers the block(s) metadata from the `blocks-manifest.php` and registers the block type(s)
	 * based on the registered block metadata.
	 * Added in WordPress 6.8 to simplify the block metadata registration process added in WordPress 6.7.
	 *
	 * @see https://make.wordpress.org/core/2025/03/13/more-efficient-block-type-registration-in-6-8/
	 */
	register_block_type( __DIR__ . '/build/testimonial-slider', array( 'render_callback' => 'render_testimonial_slider' ) );

	if ( function_exists( 'wp_register_block_types_from_metadata_collection' ) ) {
		wp_register_block_types_from_metadata_collection( __DIR__ . '/build', __DIR__ . '/build/blocks-manifest.php' );
		return;
	}

	/**
	 * Registers the block(s) metadata from the `blocks-manifest.php` file.
	 * Added to WordPress 6.7 to improve the performance of block type registration.
	 *
	 * @see https://make.wordpress.org/core/2024/10/17/new-block-type-registration-apis-to-improve-performance-in-wordpress-6-7/
	 */
	if ( function_exists( 'wp_register_block_metadata_collection' ) ) {
		wp_register_block_metadata_collection( __DIR__ . '/build', __DIR__ . '/build/blocks-manifest.php' );
	}
	/**
	 * Registers the block type(s) in the `blocks-manifest.php` file.
	 *
	 * @see https://developer.wordpress.org/reference/functions/register_block_type/
	 */
	$manifest_data = require __DIR__ . '/build/blocks-manifest.php';
	foreach ( array_keys( $manifest_data ) as $block_type ) {
		register_block_type( __DIR__ . "/build/{$block_type}" );
	}
}
add_action( 'init', 'valora_blocks_init' );

// Testimonial Slider
function render_testimonial_slider( $attributes, $content ) {
    ob_start();
    $swiper_settings = array(
        'navigation' => $attributes['navigation'],
    );

	// Variables to store CSS custom property names defined in edit.js for arrowColor
	$slider_settings = '--arrow-color: ' . esc_attr( $attributes['arrowColor']) . ';';

    ?>
    <div <?php echo get_block_wrapper_attributes(array("style"=>$slider_settings)); ?>>
        <script>
            const swiper_settings = <?php echo json_encode( $swiper_settings ); ?>;
        </script>
        <?php
        $args = array(
            'post_type'      => 'val-testimonial',
            'posts_per_page' => 5
        );
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) : ?>
            <div class="swiper">
                <?php if ( $attributes['navigation'] ) : ?>
                    <button class="swiper-button-prev"></button>
                <?php endif; ?>
                <div class="swiper-wrapper">
                    <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                        <div class="swiper-slide">
                            <?php the_content(); ?>
                            <?php $rating = get_field('rating'); ?>
                            <div class="testimonial-rating">
                                <?php
                                    for ( $i = 0; $i < 5; $i++ ) {
                                        echo $i < $rating ? '<img src="' . get_template_directory_uri() . '/assets/images/star-filled.svg" alt="Star" class="star-filled" />' : '';
                                    }
                                ?>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
                <?php if ( $attributes['navigation'] ) : ?>
                    <button class="swiper-button-next"></button>
                <?php endif; ?>
            </div>
            <?php
            wp_reset_postdata();
        endif;
        ?>
    </div>
    <?php
    return ob_get_clean();
}

/**
* Registers the custom fields for some blocks.
*
* @see https://developer.wordpress.org/reference/functions/register_post_meta/
*/
function valora_register_custom_fields() {
	register_post_meta(
		'page',
		'company_email',
		array(
			'type'         => 'string',
			'show_in_rest' => true,
			'single'       => true
		)
	);

    register_post_meta(
		'page',
		'company_address',
		array(
			'type'         => 'string',
			'show_in_rest' => true,
			'single'       => true
		)
	);
}
add_action( 'init', 'valora_register_custom_fields' );