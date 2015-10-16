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
					
					if (is_tag()) :
						echo "Topic: ";
						single_tag_title();

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