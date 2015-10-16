<?php
/**
 * Template for dispalying single post (read full post page).
 * 
 * @package bootstrap-basic
 */

get_header(); ?>
<div id="content" class="row row-with-vspace site-content">
<?php
/**
 * determine main column size from actived sidebar
 */
$main_column_size = bootstrapBasicGetMainColumnSize();
?>
	<div class="col-md-<?php echo $main_column_size; ?> content-area" id="main-column">
		<main id="main" class="site-main" role="main">
			<div class="videoSection">
				<!--<div class="row"> -->
					<?php 
					while (have_posts()) {
						the_post();

						get_template_part('content-single', get_post_format());

						echo "\n\n";
						
						bootstrapBasicPagination();

						echo "\n\n";
						

					} //endwhile;
					?> 
				<!--</div>-->
			</div>	
		</main>
	</div>
<?php get_footer(); ?> 