<?php 
	$season = get_field('season');
	$episode = get_field('episode');
	$description = get_field('description');
?>

<!-- Include the Post-Format-specific template for the content.
* If you want to override this in a child theme, then include a file
* called content-___.php (where ___ is the Post Format name) and that will be used instead.
-->

<div class="col-sm-4 videoUnit">
  <div class="row">
	<div class="col-xs-4 col-sm-12">
		<span class="img-responsive videoThumb"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a></span>
	</div>
	<div class="col-xs-8 col-sm-12">
	<!-- ** Start Speaker ** -->	
	  	<h4 class="speaker">
		  	<?php $terms = get_the_terms( $post->ID , 'speakers' ); 
                    foreach ( $terms as $term ) {
                        $term_link = get_term_link( $term, 'speakers' );
                        if( is_wp_error( $term_link ) )
                        continue;
                    echo '<a href="' . $term_link . '">' . $term->name . '</a>';
                    } 
                ?>
		</h4>
	<!-- ** End Speaker ** -->
		<h3 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
	  	<p class="event">
		  	<!-- ** Start Season ** -->
		  	<strong>
			<?php
				foreach((get_the_category()) as $childcat3) {
				if (cat_is_ancestor_of(25, $childcat3)) {
				echo '<a href="'.get_category_link($childcat3->cat_ID).'">';
					echo 'Season ' . $childcat3->cat_name . '</a>';
				}}
				?>, 
				<a href="<?php the_permalink(); ?>">Episode <?php echo $episode; ?></a></strong>
		  	<!-- ** End Season ** -->
	  	<br />	
		  	<!-- ** Start Event ** -->
		  	Event:<strong>
		  	<?php $terms = get_the_terms( $post->ID , 'events' ); 
                    foreach ( $terms as $term ) {
                        $term_link = get_term_link( $term, 'events' );
                        if( is_wp_error( $term_link ) )
                        continue;
                    echo '<a href="' . $term_link . '">' . $term->name . '</a>';
                    } 
                ?></strong>
			<!-- ** End Event ** -->
		<br />
			<!-- ** Start Tags ** -->
			<?php /* translators: used between list items, there is a space after the comma */
				$tags_list = get_the_tag_list('', __(', ', 'bootstrap-basic'));
				if ($tags_list) {
			?> 
			<span class="topic">Topic(s):<strong> <?php echo $tags_list; ?> </strong></p></span>
			<?php } // End if $tags_list ?>
		<!-- ** End Tags ** -->
	</div>
  </div>
</div>
				