<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package rockyweb
 */

get_header();
?>

<?php if ( !is_front_page() ) : ?>
<section >
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<?php
		        while ( have_posts() ) :
		            if ( is_front_page() ) :
		            	the_post();
		            	?>
		            	<div class="row justify-content-md-center">
		            		<div class="col-lg-12 col-md-12 col-sm-12 col-12 text-center">
		            			<?php the_title( '<h2 class="entry-title hometitle">', '</h2>' ); ?>
		            			<?php the_content();?>
		            		</div>
		            	</div>
		            	<?php

		            else:

			            the_post();

			            get_template_part( 'template-parts/content', 'page' );
			            
			        endif;

		        endwhile; // End of the loop.
		        ?>
			</div>
		</div>
	</div>
</section>

<?php else:
  $thumbID = get_post_meta(get_the_ID(), 'page_feature-image-1_thumbnail_id', true);
  $imgDestacada = wp_get_attachment_image_src( $thumbID, 'full' );
  if(!empty($imgDestacada) && is_array($imgDestacada)):?>
    <div class="page-hero-section bg-image hero-home-1" style="background-image: url(<?php echo $imgDestacada[0];?>);">
  <?php else: ?>
    <div class="page-hero-section bg-image hero-home-1">
  <?php endif;?>
  <div class="hero-caption pt-5">
    <div class="container h-100">
      <div class="row align-items-center h-100">
        <div class="col-lg-6 wow fadeInUp">
          <div class="badge mb-2"><span class="icon mr-1"><span class="mai-globe"></span></span> #2 Editor Choice App of 2020</div>
          <h1 class="mb-4"><?php echo get_post_meta($post->ID, 'meta-title-home', true); ?></h1>
          <p class="mb-4"><?php echo get_post_meta($post->ID, 'meta-description-home', true);?></p>
          <a href="<?php echo get_post_meta($post->ID, 'meta-link-home', true);?>" class="btn btn-primary rounded-pill">Get App Now</a>
        </div>
        <div class="col-lg-6 d-none d-lg-block wow zoomIn">
          <div class="img-place mobile-preview shadow floating-animate">
            <?php 
            $thumbID = get_post_thumbnail_id( $post->ID );
            $imgDestacada = wp_get_attachment_url( $thumbID );
            ?>
            <img src="<?php echo $imgDestacada;?>" alt="">
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
								
<!-- Clients -->
<div class="page-section mt-5">
  <div class="container">
    <div class="row">
		  <?php $images = get_post_meta(get_the_ID(), 'vdw_gallery_id', true);
      if( !empty($images) && is_array($images) ): foreach ($images as $image): $link_image = wp_get_attachment_image_src($image, 'large');?>
      <div class="col-sm-6 col-lg-3 py-3 wow zoomIn">
        <div class="img-place client-img">
          <img src="<?php echo $link_image[0];?>" alt="">
        </div>
      </div>
			<?php endforeach; endif; ?>
    </div>
  </div>
</div> <!-- End clients -->

<?php 
$args = array( 
      'post_type' => 'inicio', 
      'orderby' => 'date', 
      'order' => 'DESC',
      'post_status' => 'publish',
);
$wp_query = new WP_Query($args);
if($wp_query->have_posts()): while($wp_query->have_posts()): $wp_query->the_post();?>

  <?php
  $thumbID = get_post_meta(get_the_ID(), 'inicio_feature-image-1_thumbnail_id', true);
  $imgDestacada = wp_get_attachment_image_src( $thumbID, 'full' );
  if(!empty($imgDestacada) && is_array($imgDestacada)):?>
    <div class="position-realive bg-image" style="background-image: url(<?php echo $imgDestacada[0];?>);">
  <?php else: ?>
    <div class="position-realive bg-image">
  <?php endif;?>
  <div class="page-section">
    <div class="container">
      <div class="row">
        <div class="col-lg-5 py-3">
          <div class="img-place mobile-preview shadow wow zoomIn">
            <img src="<?php echo get_template_directory_uri() . '/assets/img/app_preview_2.png';?>" alt="">
          </div>
        </div>
        <div class="col-lg-6 py-3 mt-lg-5">
          <div class="iconic-list">
            <?php 
            $single_repeter_group = get_post_meta($post->ID, 'single_repeter_group', true);
            if ( $single_repeter_group ) : foreach ( $single_repeter_group as $field ): 
            ?>
            <div class="iconic-item wow fadeInUp">
              <div class="iconic-md iconic-text bg-warning fg-white rounded-circle" style="background-color:#<?php echo $field['color'];?> !important;">
                <span class="<?php echo $field['icon'];?>"></span>
              </div>
              <div class="iconic-content">
                <h5><?php echo $field['title'];?></h5>
                <p class="fs-small"><?php echo $field['description'];?></p>
              </div>
            </div>
            <?php endforeach; endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php 
endwhile; endif; wp_reset_query(); 
endif;
?>

<?php
//get_sidebar();
get_footer();
