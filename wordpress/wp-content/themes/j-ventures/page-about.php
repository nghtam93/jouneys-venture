<?php
/**
 * Template Name: Page About
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
  <section class="about-intro">
    <div class="container">

      <div class="el__thumb">
        <div class="dnfix__thumb">
          <?php the_post_thumbnail('full',array( 'class' => 'img-fluid','alt'   => get_the_title() )); ?>
        </div>
      </div>
      <?php the_content() ?>
    </div>
  </section>

  <?php
  if( have_rows('items') ): ?>
    <section class="about-value">
      <div class="container">
        <div class="sc__header text-center wow fadeInUp">
          <h2 class="sc__header__title"><?php the_field('mission_title') ?></h2>
        </div>
        <?php while( have_rows('items') ) : the_row();?>
          <h3 class="el__title"><?php the_sub_field('title') ?></h3>
           <?php
            if( have_rows('items_child') ):
            ?>
            <div class="row">
                <?php while( have_rows('items_child') ) : the_row();
                  $child_title = get_sub_field('child_title');
                  $child_excerpt = get_sub_field('child_excerpt');
                  ?>
                  <div class="col d-md-flex">
                    <div class="el__item">
                      <h4><?php echo $child_title; ?></h4>
                      <div><?php echo $child_excerpt ?></div>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>
          <?php endif; ?>

        <?php endwhile; ?>
      </div>
    </section>
  <?php endif; ?>


  <section class="about-media">
    <div class="container">
      <div class="sc__header text-center wow fadeInUp">
        <h2 class="sc__header__title"><?php the_field('media_title') ?></h2>
      </div>
      <?php
        if( have_rows('media_items') ):
        ?>
        <div class="row">
            <?php while( have_rows('media_items') ) : the_row();
              ?>
              <h3 class="el__title"><?php the_sub_field('title') ?></h3>

              <?php
              $post_in = get_sub_field('select_post');
              $style = get_sub_field('style');
              $args = array(
                'post__in' => $post_in,
              );
              $the_query = new WP_Query( $args ); ?>

                <?php if ( $the_query->have_posts() ) : ?>
                  <div class="row">
                  <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                    <div class="col-md-6 d-md-flex">
                      <?php if($style =='st2'): ?>
                        <?php get_template_part( 'template-parts/content','archive'); ?>
                      <?php else: ?>
                        <?php get_template_part( 'template-parts/content','archive-no-image'); ?>
                      <?php endif; ?>
                    </div>
                  <?php endwhile;?>
                  </div>
                  <?php
                  wp_reset_postdata();
                else :
                  get_template_part( 'template-parts/content', 'none' );
                endif; ?>
            <?php endwhile; ?>
        </div>
      <?php endif; ?>
    </div>
  </section>

  <section class="about-partners">
    <div class="container">
      <div class="sc__header text-center wow fadeInUp">
        <h2 class="sc__header__title"><?php the_field('partners_title') ?></h2>
      </div>
      <?php
        if( have_rows('partners_items') ):
        ?>
        <div class="about-partners-slider">
            <?php while( have_rows('partners_items') ) : the_row();
              $image = get_sub_field('image');
              $child_title = get_sub_field('title');
              $child_excerpt = get_sub_field('excerpt');
              ?>
              <div class="col-md-6 col-lg-3">
                <div class="el__item ef--zoomin">
                  <a href="">
                    <div class="el__item__thumb">
                      <div class="dnfix__thumb">
                        <?php echo wp_get_attachment_image( $image, 'full' ); ?>
                      </div>
                    </div>
                    <h4 class="el__item__title text__truncate"><?php echo $child_title ?></h4>
                    <div class="el__item__excerpt"><?php echo $child_excerpt ?></div>
                  </a>
                </div>
              </div>
            <?php endwhile; ?>
        </div>
      <?php endif; ?>

    </div>
  </section>

  <section class="about-team">
    <div class="container">
      <div class="sc__header text-center wow fadeInUp">
        <h2 class="sc__header__title"><?php the_field('team_title') ?></h2>
      </div>
      <?php
        if( have_rows('team_items') ):
        ?>
         <div class="row gx-md-5 gx-lg-5 justify-content-center">
            <?php while( have_rows('team_items') ) : the_row();
              $image = get_sub_field('image');
              $child_title = get_sub_field('title');
              $child_sub = get_sub_field('sub');
              $child_excerpt = get_sub_field('excerpt');
              $link_fb = get_sub_field('excerpt');
              $link_linkin = get_sub_field('excerpt');
              ?>
              <div class="col-md-6 col-lg-4">
                <div class="el__item">
                  <div class="el__item__thumb">
                    <div class="dnfix__thumb">
                      <?php echo wp_get_attachment_image( $image, 'full' ); ?>
                    </div>
                  </div>
                  <div class="el__item__title"><?php echo $child_title ?></div>
                  <div class="el__item__sub"><?php echo $child_sub ?></div>
                  <ul class="el__item__socical">
                    <li>
                      <a href="<?php echo $link_fb ?>" target="_blank"><img src="<?php echo get_theme_file_uri('/assets/img/about-facebook.png') ?>" alt=""></a>
                    </li>
                    <li>
                      <a href="<?php echo $link_linkin ?>" target="_blank"><img src="<?php echo get_theme_file_uri('/assets/img/linkedin.png') ?>" alt=""></a>
                    </li>
                  </ul>
                  <div class="el__item__excerpt"><?php echo $child_excerpt ?></div>
                </div>
              </div>
            <?php endwhile; ?>
        </div>
      <?php endif; ?>
    </div>
  </section>

  <section class="about-contact">
    <div class="container">
      <div class="sc__header text-center wow fadeInUp">
        <h2 class="sc__header__title"><?php _e('Contact','dntheme'); ?></h2>
      </div>
      <?php
      if( have_rows('company','option') ): ?>
        <div class="row">
        <?php while( have_rows('company','option') ) : the_row();
          ?>
          <div class="col-md-6 d-md-flex">
            <div class="el__item">
              <h3 class="el__item__title"><?php the_sub_field('title') ?></h3>
              <ul>
                <li><span><?php _e('Address','dntheme'); ?>:</span> <?php the_sub_field('address') ?></li>
                <li><span><?php _e('Phone','dntheme'); ?>:</span> <?php the_sub_field('phone') ?></li>
                <li><span><?php _e('E-mail','dntheme'); ?>:</span> c<?php the_sub_field('email') ?></li>
              </ul>
            </div>
          </div>
        <?php endwhile; ?>
      </div>
      <?php endif;?>
    </div>
  </section>
<?php endwhile; ?>
<?php get_footer();