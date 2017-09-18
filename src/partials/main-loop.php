<?php
?>

<div class="row">
    <div class="small-12 columns">
		<?php
        if ( is_page( 'impressum' ) ) {
	        the_content();
        }
		else {
			$homeId = get_option( 'page_on_front' );
			$pages  = get_pages( array(
				'child_of'    => $homeId,
				'parent'      => $homeId,
				'sort_column' => 'menu_order',
				'post_status' => 'publish'
			) );

			if ( !empty( $pages ) ) {
				foreach ( $pages as $page ) {
					echo '<div class="page-anchor-' . $page->ID . '"></div>';
					echo do_shortcode( $page->post_content );
				}
			}
		}
		?>
    </div>
</div>