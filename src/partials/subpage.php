<?php
$postImage = wp_get_attachment_url( get_post_meta( $page->ID, 'image_id', true ) );

?>
<article id="post-<?php $page->ID; ?>" <?php echo join( ' ', get_post_class( '', $page->ID ) ); ?>>
	<header>
		<h2 class="headline title">
			<?php echo $page->post_title; ?>
		</h2>
	</header>
	<?php echo $page->post_content; ?>
</article>
<!-- #post-<?php the_ID(); ?> -->