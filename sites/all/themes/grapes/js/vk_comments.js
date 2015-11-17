(function ($, Drupal, window, document, undefined) {

  Drupal.behaviors.grape_vk_commens_behavior = {
    attach: function (context, settings) {
      if($('#vk_comments').length > 0) {
        VK.init({apiId: 4994092, onlyWidgets: true});
        VK.Widgets.Comments("vk_comments", {limit: 10, width: $('.node-article').width(), attach: "*"});
      }
    }
  };

})(jQuery, Drupal, this, this.document);