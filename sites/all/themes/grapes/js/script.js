(function ($, Drupal, window, document, undefined) {

  Drupal.behaviors.my_custom_behavior = {
    attach: function (context, settings) {
      // Add hover class
      $('.wrap-product').hover(
        function () {
          $(this).find('.wrap-hidden').addClass('hover')
        },
        function () {
          $(this).find('.wrap-hidden').removeClass('hover')
        },
        function () {
          $(this).find('.wrap-hidden').addClass('hover')
        },
        function () {
          $(this).find('.wrap-hidden').removeClass('hover')
        }
      );
    }
  };


})(jQuery, Drupal, this, this.document);
