<?php
/*
Template Name: All Posts
*/
get_header(); ?>

  <div id="category-banner" style="background-image:url('<?php the_post_thumbnail_url(); ?>');">
		<div class="container">
	    <div class="category-dropdown">
		    <span class="choose-category-label">Choose a Category:</span>
		    <div class="category-selected">
          <h1><?php single_post_title(); ?></h1>
          <div class="category-description"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod.</p></div>
		    </div>
		    <ul class="category-listing">
          <?php
          $categories = get_categories( array(
            'orderby' => 'name',
            'order'   => 'ASC',
            'hide_empty' => false,
            'exclude' => array(1,1)
          ));

          foreach($categories as $category) { ?>
            <li class="cat_item">
  						<a href="<?php echo get_category_link($category->term_id); ?>">
  							<div class="cat_img"><?php echo do_shortcode(sprintf('[wp_custom_image_category term_id="%s"]',$category->term_id)); ?></div>
  							<div class="cat_info">
                  <div class="cat_name"><?php echo $category->name; ?></div>
                  <div class="category-description"><p><?php echo $category->description; ?></p></div>
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
        <?php
        $args = array(
        'post_type' => 'post',
        'posts_per_page' => 1,
        'category__not_in' => array( 1 )
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
        'category__not_in' => array( 1 ),
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