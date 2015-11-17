(function ($, Drupal, window, document, undefined) {

  Drupal.behaviors.my_custom_behavior = {
    attach: function (context, settings) {
      // Add hover class. Need for fiveStars.
      $('.wrap-product').hover(
        function () {
          $(this).find('.wrap-hidden').addClass('hover')
        },
        function () {
          $(this).find('.wrap-hidden').removeClass('hover')
        }
      );
      /* SMOOTH SCROLLIG.
       ========================================================*/
      $.srSmoothscroll({
        step: 150,
        speed: 800
      });

      // Search block
      $('.search-form_toggle', context).once(function(){
        $(this).click(function(event){
          $('.form-search-wrap').toggleClass( "js-hide" );
          $(this).toggleClass( "active" );
          // Hide cart popup.
          $('#header-cart').removeClass( "skip-active" );
          event.preventDefault();
        });
      });

      /* Parallax */
      $('.parallax .block-content-home').parallax("50%", 0.1);

    }
  };


})(jQuery, Drupal, this, this.document);
