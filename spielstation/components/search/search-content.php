<?php
/**
 * Template part for displaying results in search pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package spielstation
 */

?>

<div class="SearchResult-post">
  <div class="SearchResult-post-title"><?php the_title( sprintf( '<a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a>' ); ?></div>
  <div class="SearchResult-post-extract"><?php the_excerpt();?> </div>
</div>
