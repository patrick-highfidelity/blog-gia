<section id="user-stories">
  <div class="container">
    <div class="col-4">
      <img src="<?php bloginfo('template_url'); ?>/_assets/images/cutout-gia.png"/>
    </div>
    <div class="col-8">
      <div class="col">
        <div class="user-stories-intro">
          <h2>What sets your heart on fire?</h2>
          <p>I would love to hear your story. Share what keeps you up at night and what brings a smile to your face no matter how hard it is!</p>
          <button type="button" name="button" class="btn white">Share Your Story</button>
        </div>
      </div>
    </div>
  </div>
</section>

<div id="user-stories-modal-container">
  <div class="user-stories-form">
    <h2>Be open. Be you.</h2>
    <p>I would love to hear your story. Share what keeps you up at night and what brings a smile to your face no matter how tough life gets!</p>
    <?php echo do_shortcode('[contact-form-7 id="22" title="User Story Form"]'); ?>
    <a class="btn-close"></a>
  </div>
  <div class="bg-overlay"></div>
</div>


<section id="newsletter" class="bg light-blue">
  <div class="container">
    <div class="form-container">
      <h2>Stay in Touch!<br/></h2>
      <p>I would love to hear your story. Share what keeps you up at night and what brings a smile to your face no matter how tough life gets!</p>
      <div class="post-social">
        <?php echo do_shortcode('[addthis tool=addthis_horizontal_follow_toolbox]'); ?>
      </div>
      <?php echo do_shortcode('[contact-form-7 id="133" title="Newsletter Form"]'); ?>
    </div>
  </div>
</section>
<script src="<?php bloginfo('template_url'); ?>/_assets/js/bxslider-4-4.2.12/src/js/jquery.bxslider.js"></script>

<?php if(!is_front_page()){ ?>
  <style>
  	/* #user-stories{
  		margin:55px 0 0 0!important;
  	} */
  </style>
<?php } ?>

</body>
<?php wp_footer(); ?>
