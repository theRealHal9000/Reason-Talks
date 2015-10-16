<?php
function events_init() {
	// create Events Category
	$labels = array(
		'name' => _x( 'Events', 'taxonomy general name'),
		'singular_name' => _x( 'Event', 'taxonomy singular name'),
		'search_items' => __( 'Search Events' ),
		'all_items' => __( 'All Events' ),
		'parent_item' => __( 'Parent Event (rarely used)' ),
		'parent_item_colon' => __( 'Parent Event:' ),
		'edit_item' => __( 'Edit Event' ),
		'update_item' => __( 'Update Event' ),
		'add_new_item' => __( 'Add New Event' ),
		'new_item_name' => __( 'New Event Name' ),
		'menu_name' => __( 'Events' ),
	);

	register_taxonomy(
		'events',
		'post',
		array(
			'hierarchical' => true,
			'labels' => $labels,
			'rewrite' => array( 'slug' => 'event' ),
			'choose_from_most_used' => __('Choose from previously stored events'),
			'not_found' => __('No events found.')
		)
	);
}
add_action( 'init', 'events_init' );

function speakers_init() {
	// create Speakers Category
	$labels = array(
		'name' => _x( 'Speakers', 'taxonomy general name'),
		'singular_name' => _x( 'Speaker', 'taxonomy singular name'),
		'search_items' => __( 'Search Speakers' ),
		'all_items' => __( 'All Speakers' ),
		'parent_item' => __( 'Leave This Blank' ),
		'parent_item_colon' => __( 'Not Applicable:' ),
		'edit_item' => __( 'Edit Speaker' ),
		'update_item' => __( 'Update Speaker' ),
		'add_new_item' => __( 'Add New Speaker' ),
		'new_item_name' => __( 'New Speaker Name' ),
		'menu_name' => __( 'Speakers' ),
	);

	register_taxonomy(
		'speakers',
		'post',
		array(
			'hierarchical' => true,
			'labels' => $labels,
			'rewrite' => array( 'slug' => 'speaker' )
		)
	);
}
add_action( 'init', 'speakers_init' );

?>