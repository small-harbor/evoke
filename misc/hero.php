<?php

$object_id = null;
$object = get_queried_object();

if ( is_singular() && has_post_thumbnail( get_queried_object_id() ) ) :

	$object_id = get_queried_object_id();

endif;

if ( $object_id == null || $object_id == 0 ) {
	return;
}

$thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $object_id ), 'banner' );

$css_height = 'ratio' == fathom_get_option( 'layout_featured_image' ) ? 'height: ' . ($thumbnail_src[2]/$thumbnail_src[1]) * 100 . 'vw;' : '';
?>

<div class="entry-hero" data-height="<?php echo $thumbnail_src[2]; ?>" data-width="<?php echo $thumbnail_src[1]; ?>" data-ratio="<?php echo ($thumbnail_src[2]/$thumbnail_src[1]) * 100; ?>" style="background-image: url(<?php echo $thumbnail_src[0]; ?>);<?php echo $css_height; ?>">
	<div class="entry-hero-overlay"></div>
	<div class="entry-hero-content">
		<?php if ( $object->post_title && 'featured-image' == fathom_get_option( 'layout_post_title' ) ) : ?>
			<?php if ( ! is_front_page() || is_front_page() && ! fathom_get_option( 'front_page_hide_title' ) ) : ?>
				<div class="entry-hero-inner">
					<h1 class="entry-hero-title"><?php echo $object->post_title; ?></h1>
				</div>
			<?php endif; ?>
		<?php endif; ?>
	</div>
</div>