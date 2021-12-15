<?php
/**
 * Template Name: Page Contact
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @package    WordPress
 * @subpackage Dntheme
 * @version 1.0
 */
global $dn_options;
get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>

<div class="page__contact">
  <div class="container">

    <div class="el__thumb">
      <div class="dnfix__thumb">
        <?php the_post_thumbnail('full',array( 'class' => 'img-fluid','alt'   => get_the_title() )); ?>
      </div>
    </div>

    <div class="sc__header text-center wow fadeInUp">
      <?php the_title( '<h1 class="entry-title">', '</h1>' );?>
    </div>

    <div class="row gx-lg-5">
      <div class="col-lg-6">
        <?php the_content(); ?>
      </div>
      <div class="col-lg-6">
        <?php
        if( have_rows('company','option') ): ?>
          <?php while( have_rows('company','option') ) : the_row();
            ?>
            <div class="el2__item">
              <h3 class="el2__item__title"><?php the_sub_field('title') ?></h3>
              <ul>
                <li><span><?php _e('Address','dntheme'); ?>:</span> <?php the_sub_field('address') ?></li>
                <li><span><?php _e('Phone','dntheme'); ?>:</span> <?php the_sub_field('phone') ?></li>
                <li><span><?php _e('E-mail','dntheme'); ?>:</span> c<?php the_sub_field('email') ?></li>
              </ul>
            </div>
          <?php endwhile; ?>
        <?php endif;?>

      </div>
    </div>
  </div>
</div>

<?php endwhile; ?>
<?php get_footer();