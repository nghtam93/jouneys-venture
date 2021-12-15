<?php
/**
 * Template part for displaying posts
 *
 * @package    WordPress
 * @subpackage Dntheme
 * @version 1.0
 */
?>
<div class="single__content">
  <div class="single__thumb text-center">
    <?php the_post_thumbnail('full',array( 'class' => 'img-fluid','alt'   => get_the_title() )); ?>
  </div>
  <?php the_title( '<h1 class="single__title">', '</h1>' );?>

  <div class="entry-content"><?php the_content(); ?></div>
</div>

<?php
	related_category_fix(
		array(
			'posts_per_page'	=> 2,
			'related_title'		=> __( 'Related News', 'dntheme' ),
			'template_type'     => '', // slider , widget
			'template'			=> 'content-archive',
			'set_taxonomy' 		=> null,
			'class_item'		=> 'col-12 col-md-6',
		)
	);
