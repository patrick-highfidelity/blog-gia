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
            <!-- <iframe id="post-video" src="https://www.youtube.com/embed/<?php the_field('video-url'); ?>"></iframe> -->
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
            <a href="#" class="btn small">ABOUT ME</a>
          </div>

          <div class="post-options">
            <div class="post-options-item share-post">
              <img src="<?php bloginfo('template_url'); ?>/_assets/images/icon-social-sharing.svg"/>
              <a href="#">Share this Post</a>
              <?php //echo DISPLAY_ULTIMATE_PLUS(); ?>
              <!-- Load Facebook SDK for JavaScript -->
              <div id="fb-root"></div>
              <script>(function(d, s, id) {
                  var js, fjs = d.getElementsByTagName(s)[0];
                  if (d.getElementById(id)) return;
                  js = d.createElement(s); js.id = id;
                  js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
                  fjs.parentNode.insertBefore(js, fjs);
                }(document, 'script', 'facebook-jssdk'));
              </script>

              <!-- Your share button code -->
              <div class="fb-share-button"
                data-href="<?php echo the_permalink(); ?>"
                data-layout="button_count">
              </div>
              <style>
              #fb-root{
                display: none;
              }
              .fb_iframe_widget{
                margin-left: 5px;
              }
              .fb_iframe_widget span{
                vertical-align: middle!important;
              }
              </style>
            </div>
            <div class="post-options-item bookmark-page">
              <img src="<?php bloginfo('template_url'); ?>/_assets/images/icon-bookmark.svg"/>
              <a href="#">Bookmark this Page</a>
              <div class="bookmark-instruction">Press <span></span></div>
            </div>
            <div class="post-options-item post-comment">
              <img src="<?php bloginfo('template_url'); ?>/_assets/images/icon-comment.svg"/>
              <a href="#anchor-comments">Post a Comment</a>
            </div>
          </div>
          <div class="post-related">

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
  <section class="bg light-grey" id="related-posts">
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
              <a class="post-link" href="<?php echo the_permalink(); ?>">Read More</a>
            </div>
          </div>
          <?php } wp_reset_postdata(); ?>
        </div>
    </div>
  </section>
<?php } else { ?><style>#user-stories{margin:55px 0 0 0;}</style><?php } ?>
</div>
<?php endif; get_footer(); ?>
