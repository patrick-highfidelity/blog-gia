jQuery( document ).ready(function() {
  // Category Dropdown @category-page
  jQuery('.category-selected h1').off('click');
  jQuery('.category-selected h1').click(function(){
    if(jQuery('ul.category-listing').css('display')=='none'){
      jQuery('ul.category-listing').slideDown('fast');
      jQuery('.category-selected h1').addClass('open');
    }else{
      jQuery('ul.category-listing').slideUp('fast');
      jQuery('.category-selected h1').removeClass('open');
    }
  });

  // Remove all empty paragraph tags
  jQuery('p').each(function() {
  var jQuerythis = jQuery(this);
  if(jQuerythis.html().replace(/\s|&nbsp;/g, '').length == 0)
      jQuerythis.remove();
  });

  // Adapt Height of Comment List to Height of Comment Form
  jQuery('body.logged-out .comment-list').height(jQuery('.comment-form').height());

  // For each depth-1 comment...
  jQuery('.comment.depth-1').each(function() {
    // Populate each comment item with Dropdown divs (containing depth-2 replies)
    jQuery('.comment.depth-2',this).wrapAll( "<div class='dropdown' />");
    jQuery('.dropdown',this).prepend("<div class='dropdown-btn'>View Replies</div>")
    jQuery('.comment.depth-2',this).wrapAll( "<div class='dropdown-body' />");

		jQuery('p',this).not('.dropdown p',this).next('.reply').andSelf().wrapAll("<div class='comment-content' />");

    // Calculate number of depth-2 replies and append to display
    var count = jQuery('.dropdown-body',this).children().length;
    jQuery('.dropdown-btn',this).append(' <span>('+count+')</span>');
  });

  // Comment Item Dropdown Toggle
  jQuery('.dropdown-btn').click(function(){
    if(jQuery(this).next('.dropdown-body').css('display')=='none'){
      jQuery(this).addClass('open');
      var hide_added = jQuery(this).text().replace('View','Hide');
      jQuery(this).text(hide_added);
    }else{
      jQuery(this).removeClass('open');
      var view_added = jQuery(this).text().replace('Hide','View');
      jQuery(this).text(view_added);
    }

    jQuery(this).next('.dropdown-body').slideToggle('fast');
  })

  var url = window.location.hash;
  var hash = url.substring(url.indexOf("#")+1);

  // If user is in Respond mode (to reply to existing comment)
  if(hash == 'respond-mode'){
    jQuery('body').addClass('reply-to');
    jQuery('.comment-reply-title small').remove();

    // Change comment textarea label to comment reply title ("Leave a reply..")
    jQuery('label.guest-user-comment').text(jQuery('.comment-reply-title').text());

    // If response msg, submit button becomes = "Reply"
    jQuery('.comment-form input[type="submit"]').val('Reply');
    jQuery('.comment-form input[type="submit"]').addClass('reply-btn');
  }

  // Highlight field when user inputs text
  jQuery('textarea#comment').on('keyup',function() {
    if(jQuery(this).length && jQuery(this).val().length){
      jQuery(this).addClass('filled');
    } else{
      jQuery(this).removeClass('filled');
    }
  });
  jQuery('.guest-user-form input').on('keyup',function() {
    if(jQuery(this).length && jQuery(this).val().length){
      jQuery(this).addClass('filled');
    } else{
      jQuery(this).removeClass('filled');
    }
  });

  jQuery('.comment.depth-1').each(function(){
    var str = jQuery(this).find('.reply a').attr('href');
    str = str.replace('respond', 'respond-mode');
    jQuery(this).find('.reply a').attr('href',str);
  });

  // IF DESKTOP VIEW
  if ($(window).width() >= 700) {
    // Main Menu Item Dropdown
    jQuery('li.menu-item-has-children').mouseenter(function(){
      jQuery('ul',this).slideDown('fast');
    });
    jQuery('li.menu-item-has-children').mouseleave(function(){
      jQuery('ul',this).slideUp('fast');
    });

    // Push everything (underneath the Header) down by the header's height
    jQuery('#header-height').height(jQuery('header').height()-3);
    jQuery('header ul.menu li ul').css('top',jQuery('header').height()-2);

    // Append Home Icon
    jQuery('header ul.menu > li:first-child a').html('');
    jQuery('header ul.menu > li:first-child ').addClass('menu-item-home');
  }
  // IF MOBILE VIEW
  else
  {
    jQuery('li.menu-item-has-children').click(function(){
      if(jQuery('ul',this).css('display')=="none"){
        jQuery('ul',this).slideDown('fast');
      }else{
        jQuery('ul',this).slideUp('fast');
      }
    });

    // Push everything (underneath the Header) down by the header's height
    jQuery('#header-height').height(jQuery('header').height()+30);

    // Moble Menu
    jQuery('.hamburger-menu').click(function(){
      if(jQuery(this).next('.menu-main-menu-container').css('right') <= "-600px"){
        jQuery(this).addClass('open');
        jQuery(this).next('.menu-main-menu-container').animate({
          right: "0"
        }, 180, function(){
        });
      }else{
        jQuery(this).removeClass('open');
        jQuery(this).next('.menu-main-menu-container').animate({
          right: "-600px"
        }, 180, function(){
        });
      }
    });

  }

  // Display User Story MODAL
  jQuery('.user-stories-intro button').click(function(){
    jQuery('#user-stories-modal-container').fadeToggle();
    jQuery('#user-stories-modal-container textarea').focus();
  });
  // Hide User Story MODAL
  jQuery('#user-stories-modal-container .btn-close').click(function(){
    jQuery('#user-stories-modal-container').fadeToggle();
  });

  // Add "required" attribute to Contact Form 7 forms
  jQuery(".wpcf7-form-control").prop('required',true);
  jQuery(".wpcf7-form").removeAttr('novalidate');


  // Hide contact form alert sign
  jQuery('body').click(function(){
    jQuery('.wpcf7-response-output').fadeOut();
  });


  // Highlight Respondee Comment
  var user_comment_id = window.location.search.split("replytocom=")[1];
  if(user_comment_id){
    // Store comment ID for later retrieval
    sessionStorage.setItem('user_comment_id', user_comment_id);

    var user_tag_id = '#comment-'+user_comment_id;
    jQuery(user_tag_id).addClass('respondee');

    jQuery('.comment-list').scrollTop(jQuery(user_tag_id).position().top - jQuery('.comment-list').position().top);
  }
  // After a depth-2 reply is posted, use the stored comment ID to scroll to the comment with the most recent reply.
  else if(sessionStorage.getItem('user_comment_id')){
    // Declarations
    var id = sessionStorage.getItem('user_comment_id');
    var tag = '#comment-'+id;

    // Scroll to Respondee Comment on Page Load
    jQuery('.comment-list').scrollTop(jQuery('#comment-'+id).position().top - jQuery('.comment-list').position().top);
    jQuery(tag + ' .dropdown-body').slideDown('fast');

    // Open dropdown body to show most recent depth-2 reply.
    jQuery(tag + ' .dropdown-btn').addClass('open');
    var hide_added = jQuery(tag + ' .dropdown-btn').text().replace('View','Hide');
    jQuery(tag + ' .dropdown-btn').text(hide_added);

    sessionStorage.setItem('user_comment_id',null);
  }

});

jQuery( window ).resize(function() {
  // Adapt Height of Comment List to Height of Comment Form
  jQuery('.comment-list').height(jQuery('.comment-form').height());

  // Push everything (underneath the Header) down by the header's height
  jQuery('#header-height').height(jQuery('header').height()-3);
  jQuery('header ul.menu li ul').css('top',jQuery('header').height()-2);
});
