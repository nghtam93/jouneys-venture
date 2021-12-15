<?php
/**
 * Template Name: Page Insights
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
<section class="insights-intro">
  <div class="container">
    <div class="el__thumb">
      <div class="dnfix__thumb">
        <?php the_post_thumbnail('full',array( 'class' => 'img-fluid','alt'   => get_the_title() )); ?>
      </div>
    </div>

    <div class="sc__header text-center wow fadeInUp">
      <h2 class="sc__header__title"><?php the_field('video_title') ?></h2>
    </div>

    <?php
    if( have_rows('video_podcats_items') ): ?>
      	<div class="row">
          <?php while( have_rows('video_podcats_items') ) : the_row();
            $ytb = get_sub_field('ytb');
            ?>
            <div class="col-md-6">
		        <div class="video__item">
		        	<div class="videoWrapper">
			          <?php echo $ytb; ?>
			         </div>
		        </div>
		      </div>
          <?php endwhile; ?>
        </div>
    <?php else :
      get_template_part( 'template-parts/content', 'none' );
    endif;
    ?>

    <div class="sc__header mt-5 text-center wow fadeInUp">
      <h2 class="sc__header__title"><?php the_field('podcats_title') ?></h2>
    </div>
    <?php
	$post_in = get_field('podcats_items');
	if($post_in){
		$args = array(
		'post__in' => $post_in,
		);
		$the_query = new WP_Query( $args ); ?>

		<?php if ( $the_query->have_posts() ) : ?>
		  <div class="row">
		  <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
		    <div class="col-md-6 d-md-flex">

		        <?php get_template_part( 'template-parts/content','archive'); ?>

		    </div>
		  <?php endwhile;?>
		  </div>
		  <?php
		  wp_reset_postdata();
		else :
		  get_template_part( 'template-parts/content', 'none' );
		endif;
	}
	?>

  </div>
</section>

<section class="insights-crypto">
  <div class="container">
    <div class="sc__header text-center wow fadeInUp">
      <h2 class="sc__header__title"><?php the_field('intro_text') ?></h2>
    </div>
    <h3 class="el__title"><?php the_field('intro_sub') ?></h3>

    <?php
    if( have_rows('intro_items') ): ?>
      	<div class="row">
          <?php while( have_rows('intro_items') ) : the_row();
            $ytb = get_sub_field('ytb');
            ?>
            <div class="col-md-6">
		        <div class="el__item">
		          <h4 class="el__item__title"><?php the_sub_field('title') ?></h4>
		          <div class="el__item__excerpt"><?php the_sub_field('excerpt') ?></div>
		        </div>
		      </div>
          <?php endwhile; ?>
        </div>
    <?php else :
      get_template_part( 'template-parts/content', 'none' );
    endif;
    ?>

    <div class="row">
      <div class="col-md-6">
        <div class="video__item">
        	<div class="videoWrapper">
         		<?php the_field('intro_video_video') ?>
         	</div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="el__item">
          <h4 class="el__item__title"><?php the_field('intro_video_title') ?></h4>
          <div class="el__item__excerpt">
          	<?php echo wpautop(get_field('intro_video_excerpt')) ?>
          </div>
        </div>
      </div>
    </div>

    <?php
    if( have_rows('intro_items2') ): ?>
      	<div class="row">
          <?php while( have_rows('intro_items2') ) : the_row();
            $ytb = get_sub_field('ytb');
            ?>
            <div class="col-md-6 col-lg-3">
		        <div class="el2__item">
		          <div class="el2__item__title"><?php the_sub_field('title') ?></div>
		          <div class="el2__item__excerpt"><?php the_sub_field('excerpt') ?></div>
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
<?php endwhile; ?>
<?php get_footer();