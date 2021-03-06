<?php get_header(); if(have_posts()) : the_post();?>
<div id="single-template">
  <section id="post-header">
    <div class="container">
      <div class="post-headline col-8">
        <div class="col">
          <a class="btn-close" href="<?php echo get_site_url(); ?>"></a>
          <div class="post-meta">
            <span class="post-date"><?php echo date("M d, Y", strtotime(get_the_date())); ?></span>
            <span class="post-category"><?php echo the_category();?></span>
          </div>
          <h1 class="post-title"><?php echo the_title();?></h1>
        </div>
      </div>
    </div>
  </section>

  <script type="text/javascript">
  jQuery( document ).ready(function() {
    function autoPlayVideo(vcode){
      jQuery(".post-video-container").append('<iframe width="200" height="200" id="post-video" src="https://www.youtube.com/embed/'+vcode+'?autoplay=1&loop=1&rel=0&wmode=transparent" frameborder="0" allowfullscreen wmode="Opaque"></iframe>');
    }
    jQuery('#post-content .post-image').click(function(){
      autoPlayVideo('<?php the_field('video-url'); ?>');
      jQuery(this).delay( 0 ).toggle();
    });

    var url = window.location.hash;
    var hash = url.substring(url.indexOf("#")+1);

    if(hash == 'respond-mode'){
      <?php $url = rtrim(get_permalink(),'/'); ?>
      jQuery('.form-submit').prepend('<a href="<?php echo $url; ?>#anchor-comments" class="btn cancel-btn">Cancel</a>');
    }
    if (window.location.href.indexOf("replytocom") != -1 && window.location.href.indexOf("#anchor-comments") != -1){
      window.location.href = '<?php echo $url; ?>#anchor-comments';
    }
  });
  </script>
  <section id="post-content">
    <div class="container">
      <div class="col-8">
        <div class="col">
          <div class="post-video-container">
            <div class="post-image" style="background-image:url('<?php the_post_thumbnail_url(); ?>');">
              <div class="play-button"></div>
            </div>
          </div>
          <div class="post-content-container">
            <?php echo the_content(); ?>
          </div>
        </div>
      </div>
      <div id="post-sidebar" class="col-4">
        <div class="col">
          <div class="post-author">
            <div class="post-author-img"></div>
            <div class="post-author-title">
              <span>Author</span>
              <h3>Gia</h3>
            </div>
            <p class="post-author-desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
            <div class="side-menu">
              <a href="#" class="btn">About Me</a>
              <a href="#" class="btn">Subscribe to my Newsletter</a>
            </div>
            <div class="post-social">
              <?php echo do_shortcode('[addthis tool=addthis_horizontal_follow_toolbox]'); ?>
            </div>

            <h4>More Categories</h4>
            <div class="side-menu">
              <?php
                $categories = get_categories( array(
                  'orderby' => 'name',
                  'order'   => 'ASC',
                  'hide_empty' => false,
                  'exclude' => array(1,1)
                ));

                foreach($categories as $category) {
                  // Get category icon (ACF)
                  $category_icon = get_field('category_icon', $category);
                ?>
                <div class="cat_item">
                  <div class="cat_img"><img src="<?php echo $category_icon; ?>"/></div>
    							<div class="cat_info">
                    <a class="btn" href="<?php echo get_category_link($category->term_id); ?>"><div class="cat_name"><?php echo $category->name; ?></div></a>
                  </div>
                </div>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <div id="respond-mode"></div>
  <div id="anchor-comments"></div>
  <section id="post-comments">
    <div class="container">
      <!-- <img class="chat-triangle" src="<?php //bloginfo('template_url'); ?>/_assets/images/chat-triangle.svg"> -->
      <h2>Write Me Your Thoughts</h2><br/>
      <div class="comment-section">
        <div class="col-6 comment-form">
          <div class="col">
            <?php
            $comments_args = array(
            // change the title of send button
            'label_submit'=>'Send',
            // change the title of the reply section
            'title_reply'=>'',
            // remove "Text or HTML to be displayed after the set of comment fields"
            'comment_notes_after' => '',
            // redefine your own textarea (the comment body)
            'comment_field' => '<label class="guest-user-comment" for="comment">' . _x( 'Your Message', 'noun' ) . '</label><textarea placeholder="Enter your message here" id="comment" name="comment" aria-required="true" required="required"></textarea></p>',
            );
            comment_form( $comments_args, $post_id ); ?>

          </div>
        </div>

        <div class="col-6">
          <div class="col">
            <div class="comment-list">
              <?php
              //Get only the approved comments
              $args = array(
                'status' => 'approve',
                'post_id' => $post->ID,
                'reply_text' => 'Reply',
                'style' => 'div',
                'avatar_size' => 0,
                'max_depth' => 2
              );

              // The comment Query
              $comments_query = new WP_Comment_Query;
              $comments = $comments_query->query( $args );
              // Comment Loop
              if ( $comments ) {
                wp_list_comments( $args, $comments );
              } else { ?>
                <h4 style="font-family:'circular';"><?php echo 'Be the first to share your thoughts!'; ?></h4>
              <?php } ?>
            </div>

          </div>
        </div>
      </div>
    </div>
  </section>

  <?php
  $category = get_the_category(); $post_category = $category[0]->cat_name; global $post;

  $args = array(
    'post_type' => 'post',
    'posts_per_page' => 3,
    'category_name' => $post_category,
    'post__not_in' => array($post->ID,1)
  );
  $the_query = new WP_Query( $args );

  if ( $the_query->have_posts() ) { ?>
  <section class="" id="related-posts">
    <div class="container">
      <h2 class="section-title">Related Posts</h2>
      <div>
          <?php while ( $the_query->have_posts() ) {
          $the_query->the_post(); ?>
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
                <span class="post-category"><?php echo the_category().' ';?></span>
              </div>
              <a href="<?php echo the_permalink(); ?>">
                <h3 class="post-title"><?php echo the_title();?></h3>
              </a>
              <p class="post-excerpt"><?php echo strip_tags(get_the_excerpt());?></p>
              <a class="post-link btn" href="<?php echo the_permalink(); ?>">Read More</a>
            </div>
          </div>
          <?php } wp_reset_postdata(); ?>
        </div>
    </div>
  </section>
<?php } else { ?><style>#user-stories{margin:55px 0 0 0;}</style><?php } ?>
</div>
<?php endif; get_footer(); ?>
