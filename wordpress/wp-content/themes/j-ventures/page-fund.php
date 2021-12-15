<?php
/**
 * Template Name: Page Fund
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
  <section class="fund-intro">
    <div class="container">

      <div class="el__thumb">
        <div class="dnfix__thumb">
          <?php the_post_thumbnail('full',array( 'class' => 'img-fluid','alt'   => get_the_title() )); ?>
        </div>
      </div>
      <div class="sc__header text-center wow fadeInUp">
        <h1 class="sc__header__title"><?php the_title() ?></h1>
      </div>
      <div class="el__content">
        <?php the_content() ?>
      </div>

      <?php
      if( have_rows('options') ): ?>
          <div class="row justify-content-center">
            <?php while( have_rows('options') ) : the_row();
              $image = get_sub_field('icon');
              ?>
              <div class="col-md-6 col-lg-3 d-md-flex wow fadeInUp">
                <div class="el__item">
                  <div class="el__item__thumb">
                    <div class="dnfix__thumb -contain">
                      <?php echo wp_get_attachment_image( $image, 'full' ); ?>
                    </div>
                  </div>
                  <h3 class="el__item__title"><?php the_sub_field('title') ?></h3>
                  <div class="el__item__excerpt">
                    <?php the_sub_field('content') ?>
                  </div>
                </div>
              </div>
            <?php endwhile; ?>
          </div>
      <?php else :
        get_template_part( 'template-parts/content', 'none' );
      endif;
      ?>
    </div>
  </section>

  <section class="fund-investment">
    <div class="container">
      <div class="sc__header text-center wow fadeInUp">
        <h2 class="sc__header__title"><?php the_field('invest_title') ?></h2>
        <div class="sc__header__excerpt"><?php the_field('invest_excerpt') ?></div>
      </div>
      <?php
      if( have_rows('inest_options') ): ?>
          <div class="row justify-content-center">
            <?php while( have_rows('inest_options') ) : the_row();
              $image = get_sub_field('icon');
              ?>
              <div class="col-md-6 col-lg-4 d-md-flex wow fadeInUp">
                <div class="el__item">
                  <div class="el__item__thumb">
                    <div class="dnfix__thumb -contain">
                      <?php echo wp_get_attachment_image( $image, 'full' ); ?>
                    </div>
                  </div>
                  <h3 class="el__item__title"><?php the_sub_field('title') ?></h3>
                  <div class="el__item__excerpt">
                    <?php the_sub_field('content') ?>
                  </div>
                </div>
              </div>
            <?php endwhile; ?>
          </div>
      <?php else :
        get_template_part( 'template-parts/content', 'none' );
      endif;
      ?>
    </div>
  </section>

  <section class="home-performance fund-performance">
    <div class="container">
      <div class="sc__header text-center wow fadeInUp">
        <h2 class="sc__header__title"><?php the_field('per_title') ?></h2>
        <div class="sc__header__excerpt"><?php the_field('per_excerpt') ?></div>
      </div>
      <?php
      if( have_rows('per_items') ): ?>
          <div class="row justify-content-center">
            <?php while( have_rows('per_items') ) : the_row();
              $image = get_sub_field('icon');
              ?>
              <div class="col-md-6 col-lg-4 d-md-flex">
                <div class="el__item">
                  <div class="el__item__prefix">
                    <?php echo wp_get_attachment_image( $image, 'full' ); ?>
                  </div>
                  <div class="el__item__number counter"><?php the_sub_field('title') ?></div>
                  <div class="el__item__excerpt"><?php the_sub_field('content') ?></div>
                </div>
              </div>

            <?php endwhile; ?>
          </div>
      <?php else :
        get_template_part( 'template-parts/content', 'none' );
      endif;
      ?>

      <div class="el__content">
        <?php the_field('per_content') ?>
      </div>
    </div>
  </section>

  <section class="fund-solution">
    <div class="container">
      <div class="sc__header text-center wow fadeInUp">
        <h2 class="sc__header__title"><?php the_field('solution_title') ?></h2>
        <div class="sc__header__excerpt mb-0"><?php the_field('solution_content') ?></div>
      </div>
    </div>
  </section>

  <section class="fund-investment fund-how">
    <div class="container">
      <div class="sc__header text-center wow fadeInUp">
        <h2 class="sc__header__title"><?php the_field('how_title') ?></h2>
        <div class="sc__header__excerpt"><?php the_field('how_excerpt') ?></div>
      </div>
      <?php
      if( have_rows('how_items') ): ?>
          <div class="row justify-content-center">
            <?php while( have_rows('how_items') ) : the_row();
              $image = get_sub_field('icon');
              ?>
              <div class="col-md-6 col-lg-4 d-md-flex wow fadeInUp">
                <div class="el__item">
                  <div class="el__item__thumb">
                    <div class="dnfix__thumb -contain">
                      <?php echo wp_get_attachment_image( $image, 'full' ); ?>
                    </div>
                  </div>
                  <h3 class="el__item__title"><?php the_sub_field('title') ?></h3>
                  <div class="el__item__excerpt"><?php the_sub_field('content') ?></div>
                </div>
              </div>

            <?php endwhile; ?>
          </div>
      <?php else :
        get_template_part( 'template-parts/content', 'none' );
      endif;
      ?>

    </div>
  </section>

  <section class="fund-faq">
    <div class="container">
      <div class="sc__header text-center wow fadeInUp">
        <h2 class="sc__header__title"><?php the_field('faq_title') ?></h2>
      </div>

      <?php
      if( have_rows('faq_items') ): ?>
          <div class="accordion" id="accordionExample">
            <div class="row">
            <?php while( have_rows('faq_items') ) : the_row();
              $image = get_sub_field('icon');
              ?>
              <div class="col-md-6">
                <div class="accordion-item">
                  <h2 class="accordion-header" id="heading1">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1" aria-expanded="false" aria-controls="collapse1"><?php the_sub_field('title') ?></button>
                  </h2>
                  <div id="collapse1" class="accordion-collapse collapse" aria-labelledby="heading1" data-bs-parent="#accordionExample">
                    <div class="accordion-body"><?php the_sub_field('content') ?></div>
                  </div>
                </div>
              </div>
            <?php endwhile; ?>
            </div>
          </div>
      <?php else :
        get_template_part( 'template-parts/content', 'none' );
      endif;
      ?>
    </div>
  </section>
<?php endwhile; ?>
<?php get_footer();