(function ($, Drupal, window, document, undefined) {

  Drupal.behaviors.my_custom_behavior = {
    attach: function (context, settings) {
      // Add hover class. Need for fiveStars.
      $('.wrap-product').hover(
        function () {
          $(this).find('.wrap-hidden').addClass('hover');
          $(this).addClass('hover');
        },
        function () {
          $(this).find('.wrap-hidden').removeClass('hover');
          $(this).removeClass('hover');
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
          $('.block-search').toggleClass( "active" );
          // Hide cart popup.
          $('#header-cart').removeClass( "skip-active" );
          $('.block-dc-ajax-add-cart').removeClass('active');
          // Hide menu popup.
          $('.main-menu').removeClass("active");
          $('.responsive-menus').removeClass("responsive-toggled");

          event.preventDefault();
        });
      });
      // Menu
      $('.main-menu', context).once(function(){
        $(this).click(function(event){
          $(this).toggleClass( "active" );
          // Hide cart popup.
          $('#header-cart').removeClass( "skip-active" );
          $('.block-dc-ajax-add-cart').removeClass('active');
          // Hide search popup.
          $('.search-form_toggle, .block-search').removeClass( "active" );
          $('.form-search-wrap').addClass( "js-hide" );
        });
      });
      // Cart block.
      $('.cart-product .empty-cart', context).once(function(){
        $(this).click(function(event){
          $('#header-cart').toggleClass( "skip-active" );
          $('.block-dc-ajax-add-cart').toggleClass('active');
          // Hide search popup.
          $('.search-form_toggle, .block-search').removeClass( "active" );
          $('.form-search-wrap').addClass( "js-hide" );
          // Hide menu popup.
          $('.main-menu').removeClass("active");
          $('.responsive-menus').removeClass("responsive-toggled");

          event.preventDefault();
        });
      });

      /* Parallax */
      $('.parallax .block-content-home').parallax("50%", 0.1);

    }
  };


})(jQuery, Drupal, this, this.document);
