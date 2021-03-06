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
add_shortcode('tk_people_grid', 'tallykit_people_sc_grid');
function tallykit_people_sc_grid( $atts, $content = null ) {
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
			'all_text'			=> 'Show All',
			'image_size'	=> ''
		), $atts)
	);
	
	if(tallykit_get_settings('tk_people_grid') == 'no'){ return tallykit_shortcode_alt_notice(); }
	
	$query = array(
		'post_type'      => 'tallykit_people',
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
				'taxonomy' => 'tallykit_people_category',
				'terms'    => explode( ',', $category ),
				'field'    => 'slug'
			);
		}

		if ( $exclude_category ) {
			$query['tax_query'][] = array(
				'taxonomy' => 'tallykit_people_category',
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
		$image_size = array(TALLYKIT_PEOPLE_IMAGE_ARCHIVE_W, TALLYKIT_PEOPLE_IMAGE_ARCHIVE_H);
	}

	
	ob_start();
	include(tallykit_people_template_path('dri', 'people-grid.php'));
	$output = ob_get_contents();
	ob_end_clean();
	
	return 	$output;
}

/*---------|- carousel -|-------------------------------------*/
add_shortcode('tk_people_carousel', 'tallykit_people_sc_carousel');
function tallykit_people_sc_carousel( $atts, $content = null ) {
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
	
	if(tallykit_get_settings('tk_people_carousel') == 'no'){ return tallykit_shortcode_alt_notice(); }
	
	$query = array(
		'post_type'      => 'tallykit_people',
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
				'taxonomy' => 'tallykit_people_category',
				'terms'    => explode( ',', $category ),
				'field'    => 'slug'
			);
		}

		if ( $exclude_category ) {
			$query['tax_query'][] = array(
				'taxonomy' => 'tallykit_people_category',
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
		$image_size = array(TALLYKIT_PEOPLE_IMAGE_ARCHIVE_W, TALLYKIT_PEOPLE_IMAGE_ARCHIVE_H);
	}

	
	ob_start();
	include(tallykit_people_template_path('dri', 'people-carousel.php'));
	$output = ob_get_contents();
	ob_end_clean();
	
	return 	$output;
}


/*---------|- Slideshow -|-------------------------------------*/
add_shortcode('tk_people_slideshow', 'tallykit_people_sc_slideshow');
function tallykit_people_sc_slideshow( $atts, $content = null ) {
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
	
	if(tallykit_get_settings('tk_people_slideshow') == 'no'){ return tallykit_shortcode_alt_notice(); }
	
	$query = array(
		'post_type'      => 'tallykit_people',
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
				'taxonomy' => 'tallykit_people_category',
				'terms'    => explode( ',', $category ),
				'field'    => 'slug'
			);
		}

		if ( $exclude_category ) {
			$query['tax_query'][] = array(
				'taxonomy' => 'tallykit_people_category',
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
		$image_size = array(TALLYKIT_PEOPLE_IMAGE_ARCHIVE_W, TALLYKIT_PEOPLE_IMAGE_ARCHIVE_H);
	}

	
	ob_start();
	include(tallykit_people_template_path('dri', 'people-slideshow.php'));
	$output = ob_get_contents();
	ob_end_clean();
	
	return 	$output;
}



/*---------|- Single -|-------------------------------------*/
add_shortcode('tk_people_single', 'tallykit_people_sc_single');
function tallykit_people_sc_single( $atts, $content = null  ) {
	extract( shortcode_atts( array(
		'id'	=> '',
	), $atts ) );
	
	$output = '';
	
	$query = array(
		'post_type'      => 'tallykit_people',
		'p'          => $id,
		'posts_per_page' => 1
	);
	
	ob_start();
	include(tallykit_people_template_path('dri', 'people-single.php'));
	$output = ob_get_contents();
	ob_end_clean();
	
	return 	$output;
}
