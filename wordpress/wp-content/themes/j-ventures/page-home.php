<?php
/**
 * Template Name: Page Home
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

    <?php $banner_img = get_field('header_image'); ?>
    <section class="home-banner">
        <div class="el__thumb" style="background-image: url(<?php echo wp_get_attachment_image_url( $banner_img, 'full' ); ?>);">
        </div>
    </section>

    <?php $intro_image = get_field('intro_image'); ?>
    <section class="home-about">
      <div class="container">
        <h2 class="el__title wow fadeInUp"><?php the_field('intro_title') ?></h2>
        <div class="row">
          <div class="col-lg-6 order-lg-2 wow fadeInRight">
            <div class="el__thumb mb-4 mb-lg-0">
              <div class="dnfix__thumb">
                <?php echo wp_get_attachment_image( $intro_image, 'full' ); ?>
              </div>
            </div>
          </div>
          <div class="col-lg-6 wow fadeInLeft">
            <div class="el__excerpt">
              <?php the_field('intro_excerpt') ?>
            </div>
          </div>
        </div>
      </div>
    </section>


    <?php
    if( have_rows('intro_3box') ): ?>
      <section class="home-value">
        <div class="container">
          <div class="row">
          <?php while( have_rows('intro_3box') ) : the_row();
            $box_image = get_sub_field('image');
            $sub_title = get_sub_field('title');
            $sub_content = get_sub_field('content');
            ?>
            <div class="col-md-6 d-md-flex wow fadeInUp">
              <div class="el__item">
                <h3 class="el__item__title"><?php echo wp_get_attachment_image( $box_image, 'full' ); ?><?php echo $sub_title ?></h3>
                <div class="el__item__excerpt"><?php echo $sub_content ?></div>
              </div>
            </div>
          <?php endwhile; ?>
          </div>

          <div class="text-center">
            <a href="<?php the_field('intro_link') ?>" class="sc__readmore"><span><?php the_field('intro_textlink') ?></span></a>
          </div>
        </div>
      </section>
    <?php else :
      get_template_part( 'template-parts/content', 'none' );
    endif;
    ?>

    <section class="home-performance">
      <div class="container">
        <div class="sc__header text-center wow fadeInUp">
          <h2 class="sc__header__title"><?php the_field('performance_title') ?></h2>
          <div class="sc__header__excerpt"><?php the_field('performance_excerpt') ?></div>
        </div>

        <?php
        if( have_rows('performance_items') ): ?>
            <div class="row justify-content-center wow fadeInUp">
              <?php while( have_rows('performance_items') ) : the_row();
                $box_image = get_sub_field('image');
                $sub_number = get_sub_field('number');
                $sub_content = get_sub_field('content');
                ?>
                <div class="col-md-6 col-lg-4 d-md-flex">
                  <div class="el__item">
                    <div class="el__item__prefix">
                      <?php echo wp_get_attachment_image( $box_image, 'full' ); ?>
                    </div>
                    <div class="el__item__number counter"><?php echo $sub_number ?></div>
                    <div class="el__item__excerpt"><?php echo $sub_content ?></div>
                  </div>
                </div>
              <?php endwhile; ?>
            </div>

            <div class="text-center">
              <a href="<?php the_field('performance_link') ?>" class="sc__readmore"><span><?php the_field('performance_textlink') ?></span></a>
            </div>

        <?php else :
          get_template_part( 'template-parts/content', 'none' );
        endif;
        ?>
      </div>
    </section>

    <section class="home-text">
      <div class="container">
        <div class="sc__header text-center wow fadeInUp">
          <h2 class="sc__header__title"><?php the_field('text_title') ?></h2>
          <div class="sc__header__excerpt"><?php the_field('text_excerpt') ?></div>
        </div>
        <div class="text-center">
          <a href="<?php the_field('text_link') ?>" class="sc__readmore"><span><?php the_field('text_textlink') ?></span></a>
        </div>

      </div>
    </section>
<?php endwhile; ?>
<?php get_footer();