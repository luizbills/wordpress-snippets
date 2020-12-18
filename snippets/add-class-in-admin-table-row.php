<?php

\add_filter( 'post_class', '__add_post_class', 10, 3 );

function __add_post_class ( $classes, $class, $post_id ) {
  if ( \is_admin() ) {
    global $pagenow;

    if ( 'edit.php' === $pagenow ) {
      $classes[] = 'your-custom-class';
    }
  }

  return $classes;
}
