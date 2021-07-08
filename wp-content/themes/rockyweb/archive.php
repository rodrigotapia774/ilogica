<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package rockyweb
 */

get_header();
?>
	<section>
		<div class="container"> 
			<div class="row">
				<?php
				$args = array('post_type'=>array('posts'));
                query_posts($args);
		        if ( have_posts() ) : 
		        	while(have_posts()): the_post(); 
		        		$thumbID = get_post_thumbnail_id( get_the_ID() );
                        $imgDestacada = wp_get_attachment_image_src( $thumbID, 'full' );
		        		?>
		        		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
		        			<div class="content-category">
                		        <a href="<?php  the_permalink();?>">
                		        	<div class="img-category" style="background-image: url(<?php echo $imgDestacada[0];?>);"></div>
                		        </a>
                		        <div class="content-category-text" style="margin:-50px auto 0;">
                		        	<h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
                		        </div>
                	        </div>
		        		</div>
		        		<?php
			        endwhile;
			        bootstrap_pagination();
		        else :
		        	get_template_part( 'template-parts/content', 'none' );
		        endif;
		        ?>
	        </div>
		</div><!-- #main -->
	</section><!-- #primary -->
	<hr>

<?php
//get_sidebar();
get_footer();
