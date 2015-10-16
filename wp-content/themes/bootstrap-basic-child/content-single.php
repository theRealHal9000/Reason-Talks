<?php 
	$subheading = get_field('subheading');
	$episode = get_field('episode');
	$link = get_field('youtube_link');
	$description = get_field('description');
	$exclude = array(get_the_id());
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<div class="row">	
	<div class="col-md-8">
		<?php 
		echo '<div class="singleVideo embed-container">';
		echo wp_oembed_get($link);
		echo '</div>';
		?>
	</div>
	<div class="col-md-4">
		<header class="entry-header">
			<h1 class="title"><?php the_title(); ?></h1>
			<h4 class="subtitle"><?php echo $subheading; ?></h4>
			<h3 class="speaker">
				Featuring: 
				<?php $terms = get_the_terms( $post->ID , 'speakers' ); 
                    foreach ( $terms as $term ) {
                        $term_link = get_term_link( $term, 'speakers' );
                        if( is_wp_error( $term_link ) )
                        continue;
                    echo '<a href="' . $term_link . '">' . $term->name . '</a>';
                    } 
                ?>
				<!--
				<div class="entry-meta">
					<?php bootstrapBasicPostOn(); ?> 
				</div> --> <!-- .entry-meta -->
		</header><!-- .entry-header -->
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<footer class="entry-meta">
			<!-- ** Start Season ** -->
		  	<strong>
			<?php
				foreach((get_the_category()) as $childcat3) {
				if (cat_is_ancestor_of(25, $childcat3)) {
				echo '<a href="'.get_category_link($childcat3->cat_ID).'">';
					echo 'Season ' . $childcat3->cat_name . '</a>';
				}}
				?>, 
				<a href="<?php the_permalink(); ?>">Episode&nbsp;<?php echo $episode; ?></a></strong>
		  	<!-- ** End Season ** -->
		  	&middot;
		  	<!-- ** Start Event ** -->
		  	<span class="event">Event:<strong>
				<?php $terms = get_the_terms( $post->ID , 'events' ); 
                    foreach ( $terms as $term ) {
                        $term_link = get_term_link( $term, 'events' );
                        if( is_wp_error( $term_link ) )
                        continue;
                    echo '<a href="' . $term_link . '">' . $term->name . '</a>';
                    } 
                ?></strong></span>
			<!-- ** End Event ** -->
			&middot;
			<!-- ** Start Tags ** -->
				<?php /* translators: used between list items, there is a space after the comma */
					$tags_list = get_the_tag_list('', __(', ', 'bootstrap-basic'));
					if ($tags_list) {
				?> 
				<span class="topic">Topic(s):&nbsp;<strong><?php echo $tags_list; ?> </strong></p></span>
				<?php } // End if $tags_list ?>
 
		</footer><!-- .entry-meta -->
		<div class="entry-content">
			<?php echo $description ?>
			<?php bootstrapBasicEditPostLink(); ?> 
			<div class="clearfix"></div> 
		</div><!-- .entry-content -->
	</div>
	<div class="col-md-4 relatedVideos">
		<hr />
		<h5>Watch more from 
		<?php
			foreach((get_the_category()) as $childcat3) {
			if (cat_is_ancestor_of(25, $childcat3)) {
			echo '<a href="'.get_category_link($childcat3->cat_ID).'">';
				echo 'Season ' . $childcat3->cat_name . '</a>';
			}}
			?></h5>
		<?php $my_query = new WP_Query(array('cat' => 'cat_ID', 'posts_per_page' => 3, 'post__not_in' => $exclude));
		if ( $my_query->have_posts() ) { 
			while ( $my_query->have_posts() ) { 
				$my_query->the_post(); ?>
					<?php 
						$episode = get_field('episode');
					?>
					<div class="row videoFeaturedUnit">
						<div class="col-xs-4 col-sm-5">
							<span class="img-responsive videoFeaturedThumb"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a></span>
						</div>
						<div class="col-xs-8 col-sm-7">
						<!-- ** Start Speaker ** -->	
						  	<h4 class="featuredspeaker">
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
						<h3 class="featuredtitle"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
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
					<div class="clearfix"></div>
					<?php
				}
			}
		wp_reset_postdata(); ?>

	</div>
</div>

</article><!-- #post -->