<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package rockyweb
 */

get_header();
?>
    <?php 
    //if ( is_home() && is_front_page() ) : 
        include( get_template_directory() . '/banner.php');
    //endif;
    ?>

	<div class="container">
		<div class="row">
			<div class="col-lg-12">


		        <?php
		        if ( have_posts() ) :

			        while ( have_posts() ) :
				        the_post();

				        get_template_part( 'template-parts/content', get_post_type() );

			        endwhile;

			        the_posts_navigation();

		        else :

			        get_template_part( 'template-parts/content', 'none' );

		        endif;
		        ?>

		    </div>
		</div><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
