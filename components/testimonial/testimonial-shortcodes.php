<?php
/************************** Shortcodes ****************************
 *
 * Register Shortcodes
 *
 * @since TallyKit (1.0)
 *
 * @uses filter add_shortcode  
**/

/*---------|- Grid -|-------------------------------------*/
add_shortcode('tk_testimonial_grid', 'tallykit_testimonial_sc_grid');
function tallykit_testimonial_sc_grid( $atts, $content = null ) {
	extract( shortcode_atts( array(
			'category'         => '',
			'exclude_category' => '',
			'limit'            => 12,
			'columns'          => 3,
			'orderby'          => 'post_date',
			'order'            => 'DESC',
			'ids'              => '',
			'filter'		   => 'yes',
			'margin'		   => '3',
			'pagination'		=> 'yes',
			'image_size'	=> ''
			
		), $atts)
	);
	
	if(tallykit_get_settings('tk_testimonial_grid') == 'no'){ return tallykit_shortcode_alt_notice(); }
	
	$query = array(
		'post_type'      => 'tallykit_testimonial',
		'posts_per_page' => $limit,
		'orderby'        => $orderby,
		'order'          => $order
	);

	switch ( $orderby ) {
		case 'title':
			$query['orderby'] = 'title';
		break;

		case 'id':
			$query['orderby'] = 'ID';
		break;

		case 'random':
			$query['orderby'] = 'rand';
		break;

		default:
			$query['orderby'] = 'post_date';
		break;
	}

	if ( $category || $exclude_category) {

		if ( $category ) {
			$query['tax_query'][] = array(
				'taxonomy' => 'tallykit_testimonial_category',
				'terms'    => explode( ',', $category ),
				'field'    => 'slug'
			);
		}

		if ( $exclude_category ) {
			$query['tax_query'][] = array(
				'taxonomy' => 'tallykit_testimonial_category',
				'terms'    => explode( ',', $exclude_category ),
				'field'    => 'slug',
				'operator' => 'NOT IN',
			);
		}
	}

	if( ! empty( $ids ) )
		$query['post__in'] = explode( ',', $ids );

	if ( get_query_var( 'paged' ) )
		$query['paged'] = get_query_var('paged');
	else if ( get_query_var( 'page' ) )
		$query['paged'] = get_query_var( 'page' );
	else
		$query['paged'] = 1;
		
		
	if($image_size != ''){
		$image_size = explode("x", $image_size);
	}else{
		$image_size = array(TALLYKIT_TESTIMONIAL_IMAGE_W, TALLYKIT_TESTIMONIAL_IMAGE_H);
	}

	
	ob_start();
	include(tallykit_testimonial_template_path('dri', 'testimonial-grid.php'));
	$output = ob_get_contents();
	ob_end_clean();
	
	return 	$output;
}

/*---------|- carousel -|-------------------------------------*/
add_shortcode('tk_testimonial_carousel', 'tallykit_testimonial_sc_carousel');
function tallykit_testimonial_sc_carousel( $atts, $content = null ) {
	extract( shortcode_atts( array(
			'category'         => '',
			'exclude_category' => '',
			'limit'            => 10,
			'orderby'          => 'post_date',
			'order'            => 'DESC',
			'ids'              => '',
			
			'control_nav'       => 'true',
			'direction_nav'     => 'true',
			'item_width'        => '100',
			'item_margin'       => '10',
			'min_items'         => '2',
			'max_items'         => '3',
			'move'             => '0',
			'image_size'	=> ''
		), $atts)
	);
	
	if(tallykit_get_settings('tk_testimonial_carousel') == 'no'){ return tallykit_shortcode_alt_notice(); }
	
	$query = array(
		'post_type'      => 'tallykit_testimonial',
		'posts_per_page' => absint( $limit ),
		'orderby'        => $orderby,
		'order'          => $order
	);

	switch ( $orderby ) {
		case 'title':
			$query['orderby'] = 'title';
		break;

		case 'id':
			$query['orderby'] = 'ID';
		break;

		case 'random':
			$query['orderby'] = 'rand';
		break;

		default:
			$query['orderby'] = 'post_date';
		break;
	}

	if ( $category || $exclude_category) {

		if ( $category ) {
			$query['tax_query'][] = array(
				'taxonomy' => 'tallykit_testimonial_category',
				'terms'    => explode( ',', $category ),
				'field'    => 'slug'
			);
		}

		if ( $exclude_category ) {
			$query['tax_query'][] = array(
				'taxonomy' => 'tallykit_testimonial_category',
				'terms'    => explode( ',', $exclude_category ),
				'field'    => 'slug',
				'operator' => 'NOT IN',
			);
		}
	}

	if( ! empty( $ids ) )
		$query['post__in'] = explode( ',', $ids );

	if ( get_query_var( 'paged' ) )
		$query['paged'] = get_query_var('paged');
	else if ( get_query_var( 'page' ) )
		$query['paged'] = get_query_var( 'page' );
	else
		$query['paged'] = 1;
		
		
	if($image_size != ''){
		$image_size = explode("x", $image_size);
	}else{
		$image_size = array(TALLYKIT_TESTIMONIAL_IMAGE_W, TALLYKIT_TESTIMONIAL_IMAGE_H);
	}

	
	ob_start();
	include(tallykit_testimonial_template_path('dri', 'testimonial-carousel.php'));
	$output = ob_get_contents();
	ob_end_clean();
	
	return 	$output;
}


/*---------|- Slideshow -|-------------------------------------*/
add_shortcode('tk_testimonial_slideshow', 'tallykit_testimonial_sc_slideshow');
function tallykit_testimonial_sc_slideshow( $atts, $content = null ) {
	extract( shortcode_atts( array(
			'category'         => '',
			'exclude_category' => '',
			'limit'            => 10,
			'orderby'          => 'post_date',
			'order'            => 'DESC',
			'ids'              => '',
			
			'animation'        => 'slide',
			'direction'        => 'horizontal',
			'smooth_height'     => 'false',
			'slideshow'        => 'true',
			'animation_loop'    => 'true',
			'slideshow_speed'   => '7000',
			'animation_speed'   => '600',
			'control_nav'       => 'true',
			'direction_nav'     => 'true',
			'image_size'	=> ''
		), $atts)
	);
	
	if(tallykit_get_settings('tk_testimonial_slideshow') == 'no'){ return tallykit_shortcode_alt_notice(); }
	
	$query = array(
		'post_type'      => 'tallykit_testimonial',
		'posts_per_page' => absint( $limit ),
		'orderby'        => $orderby,
		'order'          => $order
	);

	switch ( $orderby ) {
		case 'title':
			$query['orderby'] = 'title';
		break;

		case 'id':
			$query['orderby'] = 'ID';
		break;

		case 'random':
			$query['orderby'] = 'rand';
		break;

		default:
			$query['orderby'] = 'post_date';
		break;
	}

	if ( $category || $exclude_category) {

		if ( $category ) {
			$query['tax_query'][] = array(
				'taxonomy' => 'tallykit_testimonial_category',
				'terms'    => explode( ',', $category ),
				'field'    => 'slug'
			);
		}

		if ( $exclude_category ) {
			$query['tax_query'][] = array(
				'taxonomy' => 'tallykit_testimonial_category',
				'terms'    => explode( ',', $exclude_category ),
				'field'    => 'slug',
				'operator' => 'NOT IN',
			);
		}
	}

	if( ! empty( $ids ) )
		$query['post__in'] = explode( ',', $ids );

	if ( get_query_var( 'paged' ) )
		$query['paged'] = get_query_var('paged');
	else if ( get_query_var( 'page' ) )
		$query['paged'] = get_query_var( 'page' );
	else
		$query['paged'] = 1;
		
		
	if($image_size != ''){
		$image_size = explode("x", $image_size);
	}else{
		$image_size = array(TALLYKIT_TESTIMONIAL_IMAGE_W, TALLYKIT_TESTIMONIAL_IMAGE_H);
	}

	
	ob_start();
	include(tallykit_testimonial_template_path('dri', 'testimonial-slideshow.php'));
	$output = ob_get_contents();
	ob_end_clean();
	
	return 	$output;
}