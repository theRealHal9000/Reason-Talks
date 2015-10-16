<?php 
/**
 * Displaying archive page (category, tag, archives post, author's post)
 * 
 * @package bootstrap-basic
 */

get_header(); 
get_template_part('extended-header'); ?>
<div id="content" class="row row-with-vspace site-content">
<?php

function getCurrentCatID(){
global $wp_query;
if(is_category() || is_single()){
$cat_ID = get_query_var('cat');
}
return $cat_ID;
}

$post = $wp_query->post;
$id = getCurrentCatID();

/**
 * determine main column size from actived sidebar
 */
$main_column_size = bootstrapBasicGetMainColumnSize();
?>
	<div class="col-md-<?php echo $main_column_size; ?> content-area" id="main-column">
		<main id="main" class="site-main" role="main">
			<?php if (have_posts()) { ?> 

			<header class="page-header">
				<h3 class="page-title">
					<?php
					if (cat_is_ancestor_of(25, $id)) :
						echo "Season "; 
						single_cat_title();

					elseif (is_author()) :
						/* Queue the first post, that way we know
						 * what author we're dealing with (if that is the case).
						 */
						the_post();
						printf(__('Author: %s', 'bootstrap-basic'), '<span class="vcard">' . get_the_author() . '</span>');
						/* Since we called the_post() above, we need to
						 * rewind the loop back to the beginning that way
						 * we can run the loop properly, in full.
						 */
						rewind_posts();

					elseif (is_day()) :
						printf(__('Day: %s', 'bootstrap-basic'), '<span>' . get_the_date() . '</span>');

					elseif (is_month()) :
						printf(__('Month: %s', 'bootstrap-basic'), '<span>' . get_the_date('F Y') . '</span>');

					elseif (is_year()) :
						printf(__('Year: %s', 'bootstrap-basic'), '<span>' . get_the_date('Y') . '</span>');

					else :
						_e('Archives', 'bootstrap-basic');

					endif;
					?> 
				</h3>
				
				<?php
				// Show an optional term description.
				$term_description = term_description();
				if (!empty($term_description)) {
					printf('<div class="taxonomy-description">%s</div>', $term_description);
				} //endif;
				?>
			</header><!-- .page-header -->
			<div class="row">
				<div class="col-md-<?php echo $main_column_size; ?> content-area" id="main-column">
					<main id="main" class="site-main" role="main">
						<div class="videoSection">
							<div class="row">

							<?php 
							/* Start the Loop */
							while (have_posts()) {
								the_post();

								/* Include the Post-Format-specific template for the content.
								 * If you want to override this in a child theme, then include a file
								 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
								 */
								get_template_part('content', get_post_format());
							} //endwhile; 
							?> 

							<?php bootstrapBasicPagination(); ?> 

							<?php } else { ?> 

							<?php get_template_part('no-results', 'archive'); ?> 

							<?php } //endif; ?> 
							</div>
						</div>
					</main>
				</div>
			</div>
		</main>
	</div>
<?php get_footer(); ?> 