<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package rockyweb
 */

get_header();
if ( is_singular() ) : ?>
	<section>
	    <div class="container">
	        <div>
		        <?php the_title( '<h1>', '</h1>' ); ?>
	        </div>
	    </div>
	</section>

    <section style="padding:0;">
        <div class="container">
	        <div class="row">
		         <div class="col-12">
		         	<div>
<?php else :
    the_title( '<h2 class="entry-title mb-5"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
    ?>
    <section>
        <div class="container container-post">
	        <div class="row">
		        <div class="col-12">
    <?php
    the_title( '<h1 class="entry-title mb-5">', '</h1>' );
endif;

		    while ( have_posts() ) :
			    the_post();

			    get_template_part( 'template-parts/content', get_post_type() );

			    //the_post_navigation();

			    // If comments are open or we have at least one comment, load up the comment template.
			    if ( comments_open() || get_comments_number() ) :
				   // comments_template();
			    endif;

		    endwhile; // End of the loop.
		    ?>
		</div>
		</div>
	</div><!-- #main -->
</div><!-- #primary -->
</section>

<?php
//get_sidebar();
get_footer();
