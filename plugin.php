<?php

/**
 * Plugin Name: Components Block
 * Description: Components Block.
 * Author: Ignazio Margiotta
 * Text Domain: components-block
 */

if (!defined('ABSPATH')) {
    exit;
}


function components_register_dynamic_block($block, $options = array())
{

    register_block_type(
        'components/' . $block,
        array_merge(
            array(
                'editor_script' => 'components-block-editor-script',
                'editor_style' => 'components-block-editor-style',
                'style' => 'components-block-style'
            ),
            $options
        )
    );
}

function components_block_add_category( $categories, $post ) {
	return array_merge(
		$categories,
		array(
			array(
				'slug' => 'components-block',
				'title' => __( 'Components Block', 'components' ),
			),
		)
	);
}
add_filter( 'block_categories', 'components_block_add_category', 10, 2);

function components_block_register()
{

    wp_register_script(
        'components-block-editor-script',
        plugins_url('dist/js/editor.blocks.js', __FILE__),
        array('wp-blocks', 'wp-element', 'wp-editor', 'wp-components'),
        false,
        true
    );
    wp_enqueue_script( 'components-block-editor-script' );

    wp_register_style(
        'components-block-editor-style',
        plugins_url('dist/css/blocks.editor.css', __FILE__),
        array("components-block-style")
    );

}

add_action('init', 'components_block_register');


function components_block_assets_frontend_style() {
    wp_register_style(
        'components-block-style',
        plugins_url('components-block/dist/css/blocks.style.css')
    );
    wp_enqueue_style( 'components-block-style' );
}

add_action( 'wp_enqueue_scripts', 'components_block_assets_frontend_style' );


function components_block_assets_frontend()
{

    if ( !is_admin() ) {
        // Enqueue Frontend blocks JS
        wp_enqueue_script(
            'components-block-frontend-js',
            plugins_url('dist/js/frontend.blocks.js', __FILE__),
            ['react', 'react-dom', 'wp-i18n', 'jquery'],
            filemtime( plugin_dir_path(__FILE__) . 'dist/js/frontend.blocks.js' ),
            true
        );   
    }
}

add_action('enqueue_block_assets', 'components_block_assets_frontend');


add_filter( 'block_editor_settings' , 'remove_guten_wrapper_styles' );
function remove_guten_wrapper_styles( $settings ) {
    unset($settings['styles'][0]);

    return $settings;
}
