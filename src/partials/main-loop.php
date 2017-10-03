<?php
	global $post;

	$homeId = (int) get_option( 'page_on_front' );
	$childPage = is_page() && $post->post_parent === $homeId;
?>

<div class="row">
    <div class="small-12 columns">
		<?php
        if ( is_front_page() || $childPage ) {
			$pages  = get_pages( array(
				'child_of'    => $homeId,
				'parent'      => $homeId,
				'sort_column' => 'menu_order',
				'post_status' => 'publish'
			) );

			if ( !empty( $pages ) ) {
				foreach ( $pages as $page ) {
					echo '<div class="page-anchor-' . $page->ID . '"></div>';

					if ( has_post_thumbnail( $page->ID ) ) {
						$image = wp_get_attachment_image_src( get_post_thumbnail_id( $page->ID ), 'full' );
						echo '<style> .bg-id-' . $page->ID . ' { background-image: url(' . $image[0] .'); } </style>';
					}

					echo do_shortcode( $page->post_content );
				}
			}
		}
		else {
			the_content();
		}
		?>
    </div>
</div>