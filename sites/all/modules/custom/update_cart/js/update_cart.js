(function ($, Drupal, window, document, undefined) {

  Drupal.behaviors.update_cart_behavior = {
    attach: function (context, settings) {
      var EmptyCart = $('.cart-product .empty-cart');
      if(EmptyCart.length == 1 && $('.empty-cart.hide-text').length == 0){
        EmptyCart.addClass('hide-text');
        EmptyCart.parent().append(
          '<div id="header-cart" class="block block-cart skip-content">' +
            '<div class="minicart-wrapper">' +
              '<p class="block-subtitle">' +
                '<a class="close skip-link-close fa fa-close" href="#" title="Close"></a>' +
              '</p>' +
              '<p class="empty">Корзина сейчас пустая</p>' +
            '</div>' +
          '</div>');
      }
      EmptyCart.click(function(event){
        $('#header-cart').toggleClass( "skip-active" );
        event.preventDefault();
      });

      $('.block-cart .close').click(function(event){
        $('#header-cart').toggleClass( "skip-active" );
        event.preventDefault();
      });


      // Spinner.
      var spinner = $(".views-field-edit-quantity input").spinner({
        min: 1
      })
        // Send new request after changed product count for 1 second.
        .bind('spin', function () {
          var jqCountProduct = $(this);

          clearTimeout(jqCountProduct.data('spinnerTime'));

          jqCountProduct.data('spinnerTime', setTimeout(function () {
              $( ".update_cart_btn" ).mousedown();
          }, 700));

        });

    }
  };

})(jQuery, Drupal, this, this.document);