<?php
// added by jonas
add_filter ('posts_orderby', 'hk_FilterOrder');

function hk_FilterOrder ($order = '') {
	global $wpdb;
	$order = ' (' . $wpdb->posts . '.post_title ) ASC';
	return $order;
}

/* Create a new taxonomy for symboler */
function symbol_init() {

	 register_taxonomy(
		'symbol',
		'post',
	 	array(
			'hierarchical' => true,
			'label' => __( 'Symboler' ),
			'sort' => true,
			'args' => array( 'orderby' => 'term_order' ),
			'rewrite' => array( 'slug' => 'symbol' )
		)
	);
}
add_action( 'init', 'symbol_init' );


/* echo the symbols as images */
function symbols_in_post()
{
	//$args = array('taxonomy' => 'symbol' );
	//$symbols = get_categories($args);
	$symbols = get_the_terms(get_the_ID(), 'symbol');
	if ($symbols && !is_wp_error($symbols))
	{
		foreach ( $symbols as $symbol)
		{
			echo "<img src=\"" . get_stylesheet_directory_uri() . "/images/symbol/" . $symbol->slug . ".gif\" title=\"" . $symbol->name . "\" />&nbsp;";
		}
	}
}



?>