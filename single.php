<?php get_header(); ?>

<div class="full-container">

  <div class="page-container">

      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

      <?php
      $thumbnail_id = get_post_thumbnail_id(); 
      $thumbnail_url = wp_get_attachment_image_src( $thumbnail_id, 'thumbnail-size', true );
      $thumbnail_meta = get_post_meta( $thumbnail_id, '_wp_attachment_image_alt', true);                
      ?>

      <div class="post-header">
        <h1><?php the_title(); ?></h1>
      </div>      

      <hr>
      <p class="post-byline">
      Posted on <?php echo the_time('l, F jS, Y');?>
      <a href="<?php comments_link(); ?>"><?php comments_number(); ?></a>
      </p>
      <hr>

      <?php the_content(); ?>

      <?php
        $defaults = array(
          'before'           => '<p>' . __( 'Pages:', 'extremely-minimal-free' ),
          'after'            => '</p>',
          'link_before'      => '',
          'link_after'       => '',
          'next_or_number'   => 'number',
          'separator'        => ' ',
          'nextpagelink'     => __( 'Next page', 'extremely-minimal-free' ),
          'previouspagelink' => __( 'Previous page', 'extremely-minimal-free' ),
          'pagelink'         => '%',
          'echo'             => 1
        );
       
              wp_link_pages( $defaults );
      ?>
      
      <hr>

      <p class="post-byline">
      Posted in <?php the_category( ', ' ); ?>.  
      <?php the_tags( 'Tagged with: ', ', ', '<br />' ); ?>
      </p>

      <hr>

      <?php comments_template(); ?>
      <?php paginate_comments_links() ?>

      <?php endwhile; else: ?>

      <div class="page-header">
      <h1>Oh no!</h1>
      </div>

      <p>No content is appearing for this page!</p>

      <?php endif; ?>
      
  </div>

</div>

<?php get_footer(); ?>