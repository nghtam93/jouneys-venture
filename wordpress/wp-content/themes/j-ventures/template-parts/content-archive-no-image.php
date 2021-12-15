<?php
/**
 * Template part for displaying posts with excerpts
 *
 * Used in Search Results and for Recent Posts in Front Page panels.
 *
 *
 * @package    WordPress
 * @subpackage Dntheme
 * @version 1.0
 */
?>
<div class="el__item">
  <a href="<?php the_permalink(); ?>">
    <div class="el__item__meta">
      <h3 class="el__item__title"><?php the_title() ?></h3>
      <div class="el__item__excerpt"><?php dn_excerpt(250); ?></div>
      <div class="el__item__readmore"><?php _e('Read more','dntheme'); ?></div>
    </div>
  </a>
</div>