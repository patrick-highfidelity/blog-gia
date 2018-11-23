<?php get_header(); ?>

<section id="homepage-banner">
	<div class="banner-content">
		<img class="site-logo" src="<?php bloginfo('template_url'); ?>/_assets/images/logo-white.svg"/>
		<h1 class="site-title">Try Everything</h1>
		<h3 class="site-subtitle">You never know what lies beyond your uncertainty.</h3>
	</div>
	<div class="bg-overlay"></div>
</section>

<section id="intro">
	<div class="container">
		<div class="intro-block">
			<div class="intro-pic-gia"></div>
			<h2>This is my attempt to just… try.</h2>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
			<img src="<?php bloginfo('template_url'); ?>/_assets/images/logo-black.svg"/>
		</div>
	</div>
</section>

<section id="homepage-all-posts">
	<div class="container">
		<div class="featured-post">
			<?php $cat_id = get_query_var('cat'); global $post; ?>
			<?php
			$args = array(
			'post_type' => 'post',
			'posts_per_page' => 1
			);
			$the_query = new WP_Query( $args );
			if ( $the_query->have_posts() ) {
				while ( $the_query->have_posts() ) { $the_query->the_post(); ?>
			<div class="col-6">
				<div class="col">
					<?php if ( has_post_thumbnail() ) { ?>
						<a href="<?php echo the_permalink(); ?>">
							<div class="post-image" style="background-image:url('<?php the_post_thumbnail_url(); ?>');">
							</div>
						</a>
					<?php } ?>
				</div>
			</div>
			<div class="col-6">
				<div class="col">
					<div class="post-meta">
						<span class="post-date"><?php echo date("M d, Y", strtotime(get_the_date())); ?></span>
						<span class="post-category"><?php echo the_category();?></span>
					</div>
					<a href="<?php echo the_permalink(); ?>">
						<h2 class="post-title"><?php echo the_title();?></h2>
					</a>
					<p class="post-excerpt"><?php echo wp_trim_words( get_the_content(), 30, '...' ); ?></p>
					<a class="post-link btn" href="<?php echo the_permalink(); ?>">Read More</a>
				</div>
			</div>
			<?php } wp_reset_postdata(); } else { }?>
		</div>
		<div class="column-posts">
			<?php
			$args = array(
			'post_type' => 'post',
			'posts_per_page' => 6,
			'offset' => 1
			);
			$the_query = new WP_Query( $args );
			// The Loop
			if ( $the_query->have_posts() ) {
				while ( $the_query->have_posts() ) { $the_query->the_post(); ?>
					<div class="col-4 post-item">
						<div class="col">
							<?php if ( has_post_thumbnail() ) { ?>
								<a href="<?php echo the_permalink(); ?>">
									<div class="post-image" style="background-image:url('<?php the_post_thumbnail_url(); ?>');">
									</div>
								</a>
							<?php } ?>
							<div class="post-meta">
								<span class="post-date"><?php echo date("M d, Y", strtotime(get_the_date())); ?></span>
								<span class="post-category"><?php echo the_category(); ?></span>
							</div>
							<a href="<?php echo the_permalink(); ?>">
								<h3 class="post-title"><?php echo the_title();?></h3>
							</a>
							<p class="post-excerpt"><?php echo strip_tags(get_the_excerpt());?></p>
							<a class="post-link btn" href="<?php echo the_permalink(); ?>">Read More</a>
						</div>
					</div>
			<?php } wp_reset_postdata(); } else { }?>
			<a href="<?php echo get_site_url(); ?>/everything" class="btn secondary view-more">View More</a>
		</div>

	</div>
</section>

<section id="homepage-category-posts">
	<div class="container">
		<h2 class="section-title homepage">My adventures in a nutshell.</h2>

		<div class="category-tabs">
			<?php
			$cat_num = 0;
			$cat_array = get_categories('hide_empty=1&exclude=1');
			foreach($cat_array as $category) { ?>
				<div class="tab-item" cat-num="<?php echo $cat_num; $cat_num++; ?>">
					<h4><?php echo $category->name; ?></h4>
				</div>
			<?php } ?>
		</div>

		<div class="category-slider">
			<?php
			$categories = $cat_array;
			foreach($categories as $category) { ?>
				<div>
					<div class="featured-post">
		        <?php
		        $args = array(
		        'post_type' => 'post',
		        'posts_per_page' => 1,
		        'cat' => $category->term_id
		        );
		        $the_query = new WP_Query( $args );
		        if ( $the_query->have_posts() ) {
		          while ( $the_query->have_posts() ) { $the_query->the_post(); ?>
						<div class="col-6">
							<div class="col">
		            <?php if ( has_post_thumbnail() ) { ?>
		              <a href="<?php echo the_permalink(); ?>">
		                <div class="post-image" style="background-image:url('<?php the_post_thumbnail_url(); ?>');">
		                </div>
		              </a>
		            <?php } ?>
							</div>
						</div>
						<div class="col-6">
							<div class="col">
								<div class="post-meta">
							  	<span class="post-date"><?php echo date("M d, Y", strtotime(get_the_date())); ?></span>
							  	<span class="post-category"><?php echo the_category();?></span>
							  </div>
							  <a href="<?php echo the_permalink(); ?>">
							    <h2 class="post-title"><?php echo the_title();?></h2>
							  </a>
		            <p class="post-excerpt"><?php echo wp_trim_words( get_the_content(), 30, '...' ); ?></p>

		            <a class="post-link btn" href="<?php echo the_permalink(); ?>">Read More</a>
							</div>
						</div>
		        <?php } wp_reset_postdata(); } else { }?>
					</div>
					<div class="column-posts">
						<?php
			      $args = array(
			      'post_type' => 'post',
			      'posts_per_page' => 3,
			      'cat' => $category->term_id,
			      'offset' => 1
			      );
			      $the_query = new WP_Query( $args );
			      // The Loop
			      if ( $the_query->have_posts() ) {
			        while ( $the_query->have_posts() ) { $the_query->the_post(); ?>
			          <div class="col-4 post-item">
			            <div class="col">
			              <?php if ( has_post_thumbnail() ) { ?>
			                <a href="<?php echo the_permalink(); ?>">
			                  <div class="post-image" style="background-image:url('<?php the_post_thumbnail_url(); ?>');">
			                  </div>
			                </a>
			              <?php } ?>
			              <div class="post-meta">
			                <span class="post-date"><?php echo date("M d, Y", strtotime(get_the_date())); ?></span>
			                <span class="post-category"><?php echo the_category(); ?></span>
			              </div>
			              <a href="<?php echo the_permalink(); ?>">
			                <h3 class="post-title"><?php echo the_title();?></h3>
			              </a>
			              <p class="post-excerpt"><?php echo strip_tags(get_the_excerpt());?></p>
			              <a class="post-link btn" href="<?php echo the_permalink(); ?>">Read More</a>
			            </div>
			          </div>
			      <?php } wp_reset_postdata(); } else { }?>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>
</section>

<section id="introz">
	<div class="container">
		<div id="intro-video">
			<div class="intro-thumbnail">
				<div class="play-button"></div>
			</div>
		</div>

		<div id="quotes">
			<div class="quotes-slider">
				<?php
				$args = array(
				'post_type' => 'quotes'
				);
				$the_query = new WP_Query( $args );
				if ( $the_query->have_posts() ) {
					while ( $the_query->have_posts() ) { $the_query->the_post(); ?>
						<div class="quote-item">
							<div class="quote-content">
								<p class="quote-body"><?php echo get_the_content(); ?></p>
								<p class="quote-author"><?php the_title(); ?></p>
							</div>
						</div>
				<?php } } else { } ?>
			</div>
		</div>
	</div>
	<div class="offset-bg-yellow"></div>
</section>

<script type="text/javascript">

	// Category Slider @homepage Tabs
	jQuery(document).ready(function(){
		var cat_slider = jQuery('.category-slider').bxSlider({
			pager: false,
			touchEnabled: false,
			speed: 350,
			adaptiveHeight: true,
			onSlideAfter: function($slideElement, oldIndex, newIndex) {
				jQuery('.tab-item[cat-num='+newIndex+']').addClass('active');
				jQuery('.tab-item[cat-num='+oldIndex+']').removeClass('active');
			}
		});
		jQuery('.tab-item[cat-num=0]').addClass('active');
		jQuery('.tab-item').click(function(){
			cat_slider.goToSlide(jQuery(this).attr('cat-num'));
			jQuery(this).addClass('active');
			jQuery('.tab-item').not(this).removeClass('active');
		});

		// Generate Intro Video when user clicks on thumbnail
		function autoPlayVideo(vcode){
			jQuery("#intro-video").append('<iframe width="200" height="200" id="post-video" src="'+vcode+'?autoplay=1&loop=1&rel=0&wmode=transparent" frameborder="0" allowfullscreen wmode="Opaque"></iframe>');
		}
		jQuery('.intro-thumbnail').click(function(){
			autoPlayVideo('https://www.youtube.com/embed/4h9r3Rd4ytI');
			jQuery(this).delay( 500 ).toggle();
		});

		jQuery('.quotes-slider').bxSlider({
			auto: true,
			pause: 4000,
			autoHover: true,
			touchEnabled: false
		});
	});
</script>

<?php get_footer(); ?>
