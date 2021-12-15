<?php
/**
 * The template for displaying archive pages
 *
 * @package    WordPress
 * @subpackage Dntheme
 * @version 1.0
 */

get_header();
// $term = get_queried_object();
// $term_id = $term->term_id;
?>
<section class="insights-intro">
  <div class="container">

    <div class="sc__header">
      <?php the_archive_title();?>
      <?php dntheme_archive_description( '<div class="taxonomy-description">', '</div>' ); ?>
    </div>

    <div class="archive__content">
        <?php
        if ( have_posts() ) :
            echo '<div class="row js-loadcontent">';
            while ( have_posts() ) : the_post(); ?>
                <div class="col-md-6 d-md-flex">
                    <?php get_template_part( 'template-parts/content','archive'); ?>
                </div>
            <?php
            endwhile;
            echo '</div>';?>

            <div class="text-center">
                <a href="#" class="sc__readmore -large js-loadmore" data-catid="<?php echo $term_id; ?>"><span><?php _e('Load more','dntheme'); ?></span></a>
              </div>

            <?php
        else :
            get_template_part( 'template-parts/page', 'none' );
        endif;
        ?>
    </div>

  </div>
</section>
<?php get_footer();
