
<header role="banner">
	<div class="intro">
      <p class="lead">Talks about atheism, skepticism, and other&nbsp;smart&nbsp;stuff.</p>
      <p>Find talks by topic, speaker, or event. New&nbsp;talks&nbsp;every&nbsp;whateverday.</p>
    </div>		

	<div class="col-md-6 page-header-top-right">
		<div class="sr-only">
			<a href="#content" title="<?php esc_attr_e('Skip to content', 'bootstrap-basic'); ?>"><?php _e('Skip to content', 'bootstrap-basic'); ?></a>
		</div>
		<?php if (is_active_sidebar('header-right')) { ?> 
		<div class="pull-right">
			<?php dynamic_sidebar('header-right'); ?> 
		</div>
		<div class="clearfix"></div>
		<?php } // endif; ?> 
	</div>

	<div class="row main-navigation menuSection">
		<div class="col-md-12">	
	      <ul class="nav nav-pills nav-justified">
	          <!-- Filter by Tag Start-->
	          <li role="presentation" class="dropdown">
	            <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
	              Filter by Topic <span class="caret"></span>
	            </a>
	            <ul class="dropdown-menu">
	            <?php $tags = get_tags();
					$html = '';
					foreach ( $tags as $tag ) {
						$tag_link = get_tag_link( $tag->name );
								
						$html .= "<li><a href=";
						$html .= esc_url(home_url('/tag/'));
						$html .= "{$tag->slug}";
						$html .= " title='{$tag->name} Tag' class='{$tag->slug}'>";
						$html .= "{$tag->name}</a></li>";
					}
					
					echo $html;
					echo '<hr /><li><a href="';
					echo esc_url(home_url());
					echo '">Show All Videos</a></li>';
					$html .= '';
				?>			
	            </ul>
	          </li>
	          <!-- Filter by Tag End -->
	          <!-- Filter by Speaker Start -->
	          <li role="presentation" class="dropdown">
	            <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
	              Filter by Speaker <span class="caret"></span>
	            </a>
	            <ul class="dropdown-menu">
	            <?php $tags = get_terms('speakers');
					$html = '';
					foreach ( $tags as $tag ) {
						$tag_link = get_tag_link( $tag->name );
								
						$html .= "<li><a href=";
						$html .= esc_url(home_url('/speaker/'));
						$html .= "{$tag->slug}";
						$html .= " title='{$tag->name} Tag' class='{$tag->slug}'>";
						$html .= "{$tag->name}</a></li>";
					}
					
					echo $html;
					echo '<hr /><li><a href="';
					echo esc_url(home_url());
					echo '">Show All Videos</a></li>';
					$html .= '';
				?>
	            </ul>
	          </li>
	          <!-- Filter by Speaker End -->
	          <!-- Filter by Event Start -->
	          <li role="presentation" class="dropdown">
	            <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
	              Filter by Event <span class="caret"></span>
	            </a>
	            <ul class="dropdown-menu">
	            <?php $tags = get_terms('events');
					$html = '';
					foreach ( $tags as $tag ) {
						$tag_link = get_tag_link( $tag->name );
								
						$html .= "<li><a href=";
						$html .= esc_url(home_url('/event/'));
						$html .= "{$tag->slug}";
						$html .= " title='{$tag->name} Tag' class='{$tag->slug}'>";
						$html .= "{$tag->name}</a></li>";
					}
					
					echo $html;
					echo '<hr /><li><a href="';
					echo esc_url(home_url());
					echo '">Show All Videos</a></li>';
					$html .= '';
				?>
	            </ul>
	          </li>
	          <!-- Filter by Event End -->
	          <li role="presentation">

	          	<form role="search" method="get" class="navbar-form" action="<?php echo home_url( '/' ); ?>">
					<label>
						<span class="screen-reader-text"><?php echo _x( 'Search for:', 'label' ) ?></span>
						<input type="search" class="form-control" placeholder="<?php echo esc_attr_x( 'Search …', 'placeholder' ) ?>" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />
					</label>
					<input type="submit" class="btn btn-default" value="<?php echo esc_attr_x( 'Search', 'submit button' ) ?>" />
				</form>


<!--	            <form class="navbar-form" role="search">
	              <div class="form-group">
	                <input type="text" class="form-control" placeholder="Search">
	              </div>
	              <button type="submit" class="btn btn-default">Submit</button>
	            </form> -->
	          </li>
	      </ul>
	    </div>

		<!-- Old WP format menu and failed filtering php
		
				<nav class="navbar navbar-default" role="navigation">
					<div class="navbar-header">
						
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-primary-collapse">
							<span class="sr-only"><?php // _e('Toggle navigation', 'bootstrap-basic'); ?></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
					</div>
					-->

					<!--
					<div class="collapse navbar-collapse navbar-primary-collapse">-->
						<?php //wp_nav_menu(array('theme_location' => 'primary', 'container' => false, 'menu_class' => 'nav navbar-nav', 'walker' => new BootstrapBasicMyWalkerNavMenu())); ?> 
							<!-- Start Tag Filter-->
							<!--<form action="<?php bloginfo('url'); ?>/tags/" method="get">
								<div> -->
									<?php /*
									$select = wp_dropdown_categories('taxonomy=post_tag&show_option_none=Filter by Topic&show_count=0&orderby=name&echo=0&value_field=name');
									$select = preg_replace("#<select([^>]*)>#", "<select$1 onchange='return this.form.submit()'>", $select);
									echo $select; */
									?>
								<!-- <noscript><div><input type="submit" value="View" /></div></noscript>
							</div></form> -->
							<!-- End Tag Filter-->
							<!-- Start Speaker Filter-->
							<?php //wp_dropdown_categories('taxonomy=speakers&show_option_none=Filter by Speaker'); ?>
								<!-- <script type="text/javascript"> -->
									<!--
									var dropdown = document.getElementById("name");
									function onSpeakerChange() {
										if ( dropdown.options[dropdown.selectedIndex].value > 0 ) {
											location.href = "<?php // echo esc_url( home_url( '/' ) ); ?>speakers/"+dropdown.options[dropdown.selectedIndex].value;
										}
									}
									dropdown.onchange = onSpeakerChange;
									
								</script> -->
							<!-- End Speaker Filter-->
							<!-- Start Event Filter-->
							<!-- <form action="<?php bloginfo('url'); ?>/events/" method="get">
							<?php // wp_dropdown_categories('taxonomy=events&orderby=name&order=ASC&show_count=0&show_option_all=Filter by Event'); ?>
							<input type="submit" name="submit" size="40" value="Go" />
							</form> -->
							<!-- End Event Filter-->


						<?php dynamic_sidebar('navbar-right'); ?> 
					<!--</div>--><!--.navbar-collapse-->
				<!--</nav> -->
			<!--</div> -->
		</div><!--.main-navigation-->
	</header>