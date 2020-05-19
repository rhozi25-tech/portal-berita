<?php
/**
 * Server-side rendering of the Magazine List Block
 *
 * @package ThemeZee Magazine Blocks
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * ThemeZee Magazine Blocks Magazine List Class
 */
class ThemeZee_Magazine_Blocks_List {
	/**
	 * Setup the class
	 *
	 * @return void
	 */
	static function setup() {

		// Register Block.
		add_action( 'init', array( __CLASS__, 'register_block' ) );
	}

	/**
	 * Register block on server.
	 *
	 * @return void
	 */
	static function register_block() {
		register_block_type(
			'themezee-magazine-blocks/list',
			array(
				'attributes' => array(
					'className' => array(
						'type' => 'string',
					),
					'categories' => array(
						'type' => 'array',
					),
					'tags' => array(
						'type' => 'string',
					),
					'author' => array(
						'type' => 'string',
					),
					'numberOfPosts' => array(
						'type'    => 'number',
						'default' => 3,
					),
					'offset' => array(
						'type'    => 'number',
						'default' => 0,
					),
					'order' => array(
						'type'    => 'string',
						'default' => 'desc',
					),
					'orderBy' => array(
						'type'    => 'string',
						'default' => 'date',
					),
					'layout' => array(
						'type'    => 'string',
						'default' => '50-50',
					),
					'imageSize' => array(
						'type'    => 'string',
						'default' => 'full',
					),
					'metaPosition' => array(
						'type'    => 'string',
						'default' => 'below-title',
					),
					'showDate' => array(
						'type'    => 'boolean',
						'default' => true,
					),
					'showAuthor' => array(
						'type'    => 'boolean',
						'default' => true,
					),
					'showCategories' => array(
						'type'    => 'boolean',
						'default' => false,
					),
					'showComments' => array(
						'type'    => 'boolean',
						'default' => false,
					),
					'excerptLength' => array(
						'type'    => 'number',
						'default' => 25,
					),
					'moreText' => array(
						'type'    => 'string',
						'default' => esc_html__( 'Continue Reading', 'themezee-magazine-blocks' ),
					),
				),
				'render_callback' => array( __CLASS__, 'render_block' ),
				'style'           => 'themezee-magazine-blocks',
				'editor_script'   => 'themezee-magazine-blocks',
				'editor_style'    => 'themezee-magazine-blocks-editor',
			)
		);
	}

	/**
	 * Render block.
	 *
	 * @param array $attributes The block attributes.
	 *
	 * @return string Returns the block content.
	 */
	static function render_block( $attributes ) {
		// Fetch posts from cache or database.
		$posts_query = ThemeZee_Magazine_Blocks_Cache::query_posts( $attributes );

		// Set up markup variable.
		$posts_markup = '';

		// Check if there are posts.
		if ( $posts_query->have_posts() ) :

			// Get Posts Markup.
			while ( $posts_query->have_posts() ) :
				$posts_query->the_post();

				$posts_markup .= ThemeZee_Magazine_Blocks_Template::get_list_post( $attributes, $attributes['imageSize'] );

			endwhile;

		endif;

		// Reset Postdata.
		wp_reset_postdata();

		// Set List class.
		$list_class = sanitize_key( 'tz-magazine-list-' . $attributes['layout'] );

		// Define Block Content.
		$block_content = sprintf( '<div class="tz-magazine-list %1$s">%2$s</div>', $list_class, $posts_markup );

		// Get Block Classes.
		$block_classes = self::get_block_classes( $attributes );

		// Wrap Block Content.
		$block = sprintf(
			'<div class="%1$s">%2$s</div>',
			esc_attr( $block_classes ),
			$block_content
		);

		return $block;
	}

	/**
	 * Get Block Classes.
	 *
	 * @param array $attributes The block attributes.
	 *
	 * @return string Returns the block classes.
	 */
	static function get_block_classes( $attributes ) {
		$classes  = 'wp-block-themezee-magazine-blocks-list';
		$classes .= ' tz-magazine-block';

		if ( isset( $attributes['className'] ) ) {
			$classes .= ' ' . $attributes['className'];
		}

		return $classes;
	}
}

// Run Class.
ThemeZee_Magazine_Blocks_List::setup();
