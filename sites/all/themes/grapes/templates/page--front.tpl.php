<?php
/**
 * @file
 * Returns the HTML for a single Drupal page.
 *
 * Complete documentation for this file is available online.
 * @see https://drupal.org/node/1728148
 */
?>

<div id="page" class="page">
  <header class="header page-header" id="header" role="banner">
    <div class="container">
      <div class="page-header-container">
        <?php if ($logo): ?>
          <a href="<?php print $front_page; ?>" title="<?php print 'Главная'; ?>" rel="home" class="header__logo" id="logo"><img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" class="header__logo-image" /></a>
        <?php endif; ?>

        <?php if ($main_menu): ?>
          <nav id="main-menu" role="navigation" tabindex="-1" class="main-menu">
            <?php
            // This code snippet is hard to modify. We recommend turning off the
            // "Main menu" on your sub-theme's settings form, deleting this PHP
            // code block, and, instead, using the "Menu block" module.
            // @see https://drupal.org/project/menu_block
            print theme('links__system_main_menu', array(
              'links' => $main_menu,
              'attributes' => array(
                'class' => array('links', 'inline', 'clearfix', 'main-nav'),
              ),
              'heading' => array(
                'text' => t('Main menu'),
                'level' => 'h2',
                'class' => array('element-invisible'),
              ),
            )); ?>
          </nav>
        <?php endif; ?>

        <?php print render($page['header']); ?>
      </div>
    </div>
  </header>

  <?php print render($page['top_container']); ?>

<?php if ($site_name || $site_slogan): ?>
  <div class="top-container">
    <div class="widget widget-static-block">
      <div class="clear"></div>
      <div class="block-header">
  <?php if ($site_name): ?>
        <div class="title">
          <?php print $site_name; ?>
        </div>
  <?php endif; ?>
  <?php if ($site_slogan): ?>
        <div class="slog">
          <?php print $site_slogan; ?>
        </div>
  <?php endif; ?>
      </div>
      <div class="clear"></div>
    </div>
  </div>
<?php endif; ?>


  <div id="main">

    <div id="content" class="column" role="main">
      <?php print $messages; ?>
      <?php print $breadcrumb; ?>
      <div class="container">
        <?php print render($page['highlighted']); ?>
      </div>

      <?php print render($tabs); ?>
      <?php print render($page['help']); ?>
      <?php if ($action_links): ?>
        <ul class="action-links"><?php print render($action_links); ?></ul>
      <?php endif; ?>

      <?php //print $feed_icons; ?>
    </div>
    <div class="parallax"><?php print render($page['parallax']); ?></div>
    <div id="navigation">

      <?php print render($page['navigation']); ?>

    </div>

    <?php
    // Render the sidebars to see if there's anything in them.
    $sidebar_first  = render($page['sidebar_first']);
    $sidebar_second = render($page['sidebar_second']);
    ?>

    <?php if ($sidebar_first || $sidebar_second): ?>
      <aside class="sidebars">
        <?php print $sidebar_first; ?>
        <?php print $sidebar_second; ?>
      </aside>
    <?php endif; ?>

  </div>
  <div class="footer-wrap">
    <?php print render($page['footer']); ?>
  </div>

</div>

<?php print render($page['bottom']); ?>