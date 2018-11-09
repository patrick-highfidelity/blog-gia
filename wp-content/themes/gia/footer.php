<section id="user-stories" class="bg light-blue">
  <div class="container">
    <div class="form-container">
      <h2>What sets your <span style="color:#E9AC37">heart</span> on fire?</h2>
      <p>I would love to hear your story. Share what keeps you up at night and what brings a smile to your face no matter how tough life gets!</p>
      <?php echo do_shortcode('[contact-form-7 id="22" title="User Story Form"]'); ?>
    </div>
  </div>
</section>
<script src="<?php bloginfo('template_url'); ?>/_assets/js/bxslider-4-4.2.12/src/js/jquery.bxslider.js"></script>

<?php if(!is_front_page()){ ?>
  <style>
  	#user-stories{
  		margin:55px 0 0 0!important;
  	}
  </style>
<?php } ?>

</body>
<?php wp_footer(); ?>
