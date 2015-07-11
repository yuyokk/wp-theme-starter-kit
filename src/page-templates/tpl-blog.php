<?php
/* Template Name: Blog Page */

get_header(); ?>

<?php
  $paged = (get_query_var('page')) ? absint(get_query_var('page')) : 1;
  $args = array(
    'post_type' => 'post',
    'paged' => $paged,
  );

  $the_query = new WP_Query($args);
?>

<?php if ( $the_query->have_posts() ) : ?>
  <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
    <div class="blog-post">
      <h2 class="blog-post__title">
        <a href="<?php the_permalink() ?>">
          <?php the_title(); ?>
        </a>
      </h2>

      <div class="blog-post__excerpt">
        <?php the_excerpt(); ?>
      </div>
    </div>
  <?php endwhile; ?>

  <div class="blog__pagination">
    <?php
      $big = 999999999;

      echo paginate_links(array(
        'base'      => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
        'format'    => '?page=%#%',
        'current'   => max(1, $paged),
        'total'     => $the_query->max_num_pages,
        'prev_text' => '&lt;',
        'next_text' => '&gt;'
      ));
    ?>
  </div><!-- .blog__pagination -->

  <?php wp_reset_postdata(); ?>
<?php else : ?>
  <h1 class="text-center text-danger">
    <?php _e('Sorry, no posts found.', 'wp-theme-starter-kit'); ?>
  </h1>
<?php endif; ?>

<?php get_footer(); ?>
