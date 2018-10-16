<?php
/**
 * Layout Options.
 *
 * @package     Fathom
 * @since       1.0.0
 */

/*
 * =============================
 * Panel: Layout
 * ============================= 
 */
$wp_customize->add_panel(
	'panel_layout',
	array(
		'title' => __( 'Layout', 'fathom' ),
		'priority' => 30,
	)
);

/*
 * =============================
 * Section: Containers
 * ============================= 
 */
$wp_customize->add_section(
	'panel_layout_section_containers',
	array(
		'title' => __( 'Containers', 'fathom' ),
		'panel' => 'panel_layout',
	)
);

/*
 * Setting: Body Container Layout
 */
$wp_customize->add_setting(
	'layout_container',
	array(
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'fathom_sanitize_choices',
		'default' => fathom_get_option( 'layout_container' ),
		'transport' => 'postMessage'
	)
);

$wp_customize->add_control(
	'layout_container',
	array(
		'type' => 'select',
		'section' => 'panel_layout_section_containers',
		'label' => __( 'Body Container Layout', 'fathom' ),
		'choices' => array(
			'boxed' => __( 'Boxed', 'fathom' ),
			'contained' => __( 'Contained', 'fathom' ),
			'full-width' => __( 'Full Width', 'fathom' ),
		),
		'settings' => 'layout_container'
	)
);

/*
 * Setting: Divider
 */
$wp_customize->add_setting(
	'layout_divider_1',
	array(
		'sanitize_callback' => 'esc_attr'
	)
);

$wp_customize->add_control(
	new Fathom_Divider(
		$wp_customize,
		'layout_divider_1',
		array(
			'type' => 'hf-divider',
			'section' => 'panel_layout_section_containers',
			'label' => __( 'Body Container Layout', 'fathom' ),
		)
	)
);

/*
 * Setting: Header Container Layout
 */
$wp_customize->add_setting(
	'layout_container_header',
	array(
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'fathom_sanitize_choices',
		'default' => fathom_get_option( 'layout_container_header' ),
		'transport' => 'postMessage'
	)
);

$wp_customize->add_control(
	'layout_container_header',
	array(
		'type' => 'select',
		'section' => 'panel_layout_section_containers',
		'label' => __( 'Header Container Layout', 'fathom' ),
		'choices' => array(
			'boxed' => __( 'Boxed', 'fathom' ),
			'contained' => __( 'Contained', 'fathom' ),
			'full-width' => __( 'Full Width', 'fathom' ),
		),
		'settings' => 'layout_container_header'
	)
);

/*
 * Setting: Footer Container Layout
 */
$wp_customize->add_setting(
	'layout_container_footer',
	array(
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'fathom_sanitize_choices',
		'default' => fathom_get_option( 'layout_container_footer' ),
		'transport' => 'postMessage'
	)
);

$wp_customize->add_control(
	'layout_container_footer',
	array(
		'type' => 'select',
		'section' => 'panel_layout_section_containers',
		'label' => __( 'Footer Container Layout', 'fathom' ),
		'choices' => array(
			'boxed' => __( 'Boxed', 'fathom' ),
			'contained' => __( 'Contained', 'fathom' ),
			'full-width' => __( 'Full Width', 'fathom' ),
		),
		'settings' => 'layout_container_footer'
	)
);

/*
 * Setting: Divider
 */
$wp_customize->add_setting(
	'layout_divider_2',
	array(
		'sanitize_callback' => 'esc_attr'
	)
);

$wp_customize->add_control(
	new Fathom_Divider(
		$wp_customize,
		'layout_divider_2',
		array(
			'type' => 'hf-divider',
			'section' => 'panel_layout_section_containers',
			'label' => __( 'Body Container Layout', 'fathom' ),
		)
	)
);


/*
 * Setting: Page Container Layout
 */
$wp_customize->add_setting(
	'layout_container_page',
	array(
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'fathom_sanitize_choices',
		'default' => fathom_get_option( 'layout_container_page' ),
		'transport' => 'postMessage'
	)
);

$wp_customize->add_control(
	'layout_container_page',
	array(
		'type' => 'select',
		'section' => 'panel_layout_section_containers',
		'label' => __( 'Page Body Container Layout', 'fathom' ),
		'choices' => array(
			'default' => __( 'Default', 'fathom' ),
			'boxed' => __( 'Boxed', 'fathom' ),
			'contained' => __( 'Contained', 'fathom' ),
			'full-width' => __( 'Full Width', 'fathom' ),
		),
		'settings' => 'layout_container_page'
	)
);

$wp_customize->add_setting(
	'layout_container_post',
	array(
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'fathom_sanitize_choices',
		'default' => fathom_get_option( 'layout_container_post' ),
		'transport' => 'postMessage'
	)
);

$wp_customize->add_control(
	'layout_container_post',
	array(
		'type' => 'select',
		'section' => 'panel_layout_section_containers',
		'label' => __( 'Blog Post Body Container Layout', 'fathom' ),
		'choices' => array(
			'default' => __( 'Default', 'fathom' ),
			'boxed' => __( 'Boxed', 'fathom' ),
			'contained' => __( 'Contained', 'fathom' ),
			'full-width' => __( 'Full Width', 'fathom' ),
		),
		'settings' => 'layout_container_post'
	)
);

$wp_customize->add_setting(
	'layout_container_archive',
	array(
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'fathom_sanitize_choices',
		'default' => fathom_get_option( 'layout_container_archive' ),
		'transport' => 'postMessage'
	)
);

$wp_customize->add_control(
	'layout_container_archive',
	array(
		'type' => 'select',
		'section' => 'panel_layout_section_containers',
		'label' => __( 'Blog Archive Body Container Layout', 'fathom' ),
		'choices' => array(
			'default' => __( 'Default', 'fathom' ),
			'boxed' => __( 'Boxed', 'fathom' ),
			'contained' => __( 'Contained', 'fathom' ),
			'full-width' => __( 'Full Width', 'fathom' ),
		),
		'settings' => 'layout_container_archive'
	)
);

/*
 * =============================
 * Section: Content
 * ============================= 
 */
$wp_customize->add_section(
	'panel_layout_section_content',
	array(
		'title' => __( 'Content', 'fathom' ),
		'panel' => 'panel_layout',
	)
);

/*
 * Setting: Page Content Layout
 */
$wp_customize->add_setting(
	'layout_content_page',
	array(
		'default'           => fathom_get_option( 'layout_content_page' ),
		'sanitize_callback' => 'sanitize_key',
		'transport'         => 'postMessage'
	)
);

$wp_customize->add_control(
	new Hybrid_Customize_Control_Layout(
		$wp_customize,
		'layout_content_page',
		array(
			'label' => __( 'Page Content Layout', 'fathom' ),
			'section' => 'panel_layout_section_content'
		)
	)
);

/*
 * Setting: Post Content Layout
 */
$wp_customize->add_setting(
	'layout_content_post',
	array(
		'default'           => fathom_get_option( 'layout_content_post' ),
		'sanitize_callback' => 'sanitize_key',
		'transport'         => 'postMessage'
	)
);

$wp_customize->add_control(
	new Hybrid_Customize_Control_Layout(
		$wp_customize,
		'layout_content_post',
		array(
			'label' => __( 'Blog Post Content Layout', 'fathom' ),
			'section' => 'panel_layout_section_content'
		)
	)
);

/*
 * Setting: Blog Archive Content Layout
 */
$wp_customize->add_setting(
	'layout_content_archive',
	array(
		'default'           => fathom_get_option( 'layout_content_archive' ),
		'sanitize_callback' => 'sanitize_key',
		'transport'         => 'postMessage'
	)
);

$wp_customize->add_control(
	new Hybrid_Customize_Control_Layout(
		$wp_customize,
		'layout_content_archive',
		array(
			'label' => __( 'Blog Archive Content Layout', 'fathom' ),
			'section' => 'panel_layout_section_content'
		)
	)
);

/*
 * Setting: Featured Image Layout
 */
$wp_customize->add_setting(
	'layout_featured_image',
	array(
		'default'           => fathom_get_option( 'layout_featured_image' ),
		'sanitize_callback' => 'sanitize_key',
		'transport'         => 'postMessage'
	)
);

$wp_customize->add_control(
	'layout_featured_image',
	array(
		'type' => 'select',
		'section' => 'panel_layout_section_content',
		'label' => __( 'Featured Image Size', 'fathom' ),
		'choices' => array(
			'theme' => __( 'Theme Defined', 'fathom' ),
			'ratio' => __( 'Use Image Ratio', 'fathom' ),
		),
		'description' => __( 'Use the predefined image size or keep the ratio of your upload image', 'fathom' )
	)
);

/*
 * Setting: Post Title
 */
$wp_customize->add_setting(
	'layout_post_title',
	array(
		'default'           => fathom_get_option( 'layout_post_title' ),
		'sanitize_callback' => 'sanitize_key',
		'transport'         => 'postMessage'
	)
);

$wp_customize->add_control(
	'layout_post_title',
	array(
		'type' => 'select',
		'section' => 'panel_layout_section_content',
		'label' => __( 'Post Title Placement', 'fathom' ),
		'choices' => array(
			'featured-image' => __( 'Inside Featured Image', 'fathom' ),
			'post' => __( 'With Post', 'fathom' ),
		),
	)
);