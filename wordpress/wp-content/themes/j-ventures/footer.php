<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @package    WordPress
 * @subpackage Dntheme
 * @version 1.0
 */
$logo_img = get_field('logo_footer', 'option');
?>
 <section class="footer-newsletter">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-6 mb-3 mb-lg-0">
            <h2 class="el__title"><?php _e('Newsletter','dntheme'); ?></h2>
            <div class="el__excerpt">
              <?php _e('Subscribe to our monthly newsletter and receive the latest updates<br>on Cyber Capital and the crypto industry.','dntheme'); ?>
            </div>
          </div>
          <div class="col-lg-6">
            <form method="post" action="<?php echo site_url('?na=s') ?>">
                <input type="hidden" name="nlang" value="en">
                <input class="form-control" type="email" name="ne" id="tnp-1" value="" placeholder="<?php _e('Email address','dntheme'); ?>" required>
                <input class="input-submit" type="submit" value="<?php _e('SUBSCRIBE NOW','dntheme'); ?>" >
            </form>
          </div>
        </div>
      </div>
    </section>

    <footer class="footer">
      <div class="container text-center position-relative">
        <div class="copyright text-center">
          <span><?php the_field('copyright', 'option') ?> |</span>
          <?php
            wp_nav_menu(
            array(
               'theme_location'  => 'footer_nav',
               'container'       => 'ul',
               'container_class' => '',
               'menu_id'         => '',
               'menu_class'      => '',
            ));
          ?>
        </div>
        <ul class="footer__socical">
          <li><a href="<?php the_field('fb', 'option') ?>" target="_blank"><img src="<?php echo get_theme_file_uri('/assets/img/facebook.png') ?>" alt=""></a></li>
          <li><a href="<?php the_field('twitter', 'option') ?>" target="_blank"><img src="<?php echo get_theme_file_uri('/assets/img/twitter.png') ?>" alt=""></a></li>
        </ul>
      </div>
    </footer>

    <nav id="menu__mobile" class="nav__mobile">
        <div class="nav__mobile__content">
          <?php
            wp_nav_menu(
            array(
               'theme_location'  => 'primary',
               'container'       => 'ul',
               'container_class' => '',
               'menu_id'         => '',
               'menu_class'      => 'nav__mobile--ul',
            ));
          ?>
        </div>
    </nav>
</div> <!-- end .wrapper -->
<?php wp_footer(); ?>
</body>
</html>
