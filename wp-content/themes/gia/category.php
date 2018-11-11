<?php get_header(); ?>

<?php $cat_id = get_query_var('cat'); ?>
  <div id="category-banner" style="background-image:url('<?php echo do_shortcode('[wp_custom_image_category onlysrc="false" size="full" term_id="'.$cat_id.'"]'); ?>');">
		<div class="container">
	    <div class="category-dropdown">
		    <a class="back-link secondary" href="<?php echo get_site_url(); ?>">Back to Home</a>
		    <div class="category-selected">
          <h1><?php single_cat_title(); ?></h1>
          <?php the_archive_description( '<div class="category-description">', '</div>' ); ?>
		    </div>
		    <ul class="category-listing">
          <?php
          $categories = get_categories( array(
            'orderby' => 'name',
            'order'   => 'ASC',
            'exclude' => array($cat_id,1),
            'hide_empty' => false
          ));
          foreach($categories as $category) { ?>
            <li class="cat_item">
  						<a href="<?php echo get_category_link($category->term_id); ?>">
  							<div class="cat_img"><?php echo do_shortcode(sprintf('[wp_custom_image_category term_id="%s"]',$category->term_id)); ?></div>
  							<div class="cat_info">
                  <div class="cat_name"><?php echo $category->name; ?></div>
                  <?php the_archive_description( '<div class="category-description">', '</div>' ); ?>
                </div>
  						</a>
  		      </li>
          <?php } ?>
		    </ul>
		  </div>
	  </div>
    <div class="bg-overlay"></div>
  </div>
	<section id="category-featured">
		<div class="container">
			<div class="featured-post">
        <?php $cat_id = get_query_var('cat'); global $post; ?>
        <?php
        $args = array(
        'post_type' => 'post',
        'posts_per_page' => 1,
        'cat' => $cat_id
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
            <a class="post-link" href="<?php echo the_permalink(); ?>">Read More</a>
					</div>
				</div>
        <?php } wp_reset_postdata(); } else { }?>
			</div>
      <div class="column-posts">
        <?php
        $args = array(
        'post_type' => 'post',
        'posts_per_page' => 9,
        'cat' => $cat_id,
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
                <a class="post-link" href="<?php echo the_permalink(); ?>">Read More</a>
              </div>
            </div>
        <?php } wp_reset_postdata(); } else { }?>
      </div>
		</div>
	</section>


<?php get_footer(); ?>
