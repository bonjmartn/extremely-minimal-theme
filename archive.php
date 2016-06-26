<?php get_header(); ?>

<div class="full-container">

    <div class="page-container">

        <div class="page-header">
            <h1><?php wp_title(''); ?></h1>
        </div>

        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

            <p class="post-byline">
            Posted on <?php echo the_time('l, F jS, Y');?>
            in <?php the_category( ', ' ); ?>.
            <a href="<?php comments_link(); ?>"><?php comments_number(); ?></a>
            </p><br>           

        <?php endwhile; else: ?>

        <div class="page-header">
            <h1>Oh no!</h1>
        </div>

        <p>No content is appearing for this page!</p>

        <?php endif; ?>

        <p>&nbsp;</p>

        <div class="pagination">

            <?php the_posts_pagination( array( 
            'mid_size' => 2,
            'type' => 'list',
            )); ?>

        </div>

        <p>&nbsp;</p>

        <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>></div>

    </div>

</div>

<?php get_footer(); ?>