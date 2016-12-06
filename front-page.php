<?php get_header(); ?>

  
<div class="full-container">

<!-- show latest blog posts -->

  <div class="page-container">

    <div>
      <?php if ( ! dynamic_sidebar( 'home-intro') ): ?>
      <?php endif; ?>
    </div>

    <div class="home-blog-posts">

      <?php
      $args = array( 'posts_per_page' => 1,
                      'orderby' => 'date',
                      'post__in'  => get_option( 'sticky_posts' ),
                      'ignore_sticky_posts' => 1 );
              
      $postslist = get_posts( $args );
      foreach ( $postslist as $post ) :
      setup_postdata( $post ); ?> 

            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

            <p class="post-byline">Posted on <?php echo the_time('l, F jS, Y');?> in <?php the_category( ', ' ); ?> with <a href="<?php comments_link(); ?>"><?php comments_number(); ?></a></p> 

            <p><?php the_content(); ?></p>

      <?php
      endforeach; 
      wp_reset_postdata();
      ?>

    </div>

  </div>

</div><!-- end of full container -->

<?php get_footer(); ?>