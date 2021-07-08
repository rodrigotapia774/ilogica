<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package rockyweb
 */

get_header(); 
$thumbID = get_post_thumbnail_id( $post->ID );
$imgDestacada = wp_get_attachment_url( $thumbID );
?>
<div class="bg-light">

<div class="page-hero-section bg-image hero-mini" style="background-image: url(<?php echo $imgDestacada;?>);">
  <div class="hero-caption">
    <div class="container fg-white h-100">
      <div class="row justify-content-center align-items-center text-center h-100">
        <div class="col-lg-6">
          <h3 class="mb-4 fw-medium"><?php echo get_the_title();?></h3>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-dark justify-content-center bg-transparent">
              <li class="breadcrumb-item"><a href="<?php echo get_bloginfo('url');?>">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page"><?php echo get_the_title();?></li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="page-section">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-10 my-3 wow fadeInUp">
        <div class="card-page">
          <div class="row row-beam-md">
          <?php 
          $location = get_post_meta($post->ID, 'meta-contact-location', true);
          $location2= get_post_meta($post->ID, 'meta-contact-location2', true);
          $contact = get_post_meta($post->ID, 'meta-contact-contact', true);
          $contact2 = get_post_meta($post->ID, 'meta-contact-contact2', true);
          $email = get_post_meta($post->ID, 'meta-contact-email', true);
          $email2 = get_post_meta($post->ID, 'meta-contact-email2', true);
          ?>
            <div class="col-md-4 text-center py-3 py-md-2">
              <i class="mai-location-outline h3"></i>
              <p class="fg-primary fw-medium fs-vlarge">Location</p>
              <?php if(!empty($location)):?>
              <p class="mb-0"><?php echo $location;?></p>
              <?php endif;?>
              <?php if(!empty($location2)):?>
              <p class="mb-0"><?php echo $location2;?></p>
              <?php endif;?>
            </div>
            <div class="col-md-4 text-center py-3 py-md-2">
              <i class="mai-call-outline h3"></i>
              <p class="fg-primary fw-medium fs-vlarge">Contact</p>
              <?php if(!empty($contact)):?>
              <p class="mb-1"><?php echo $contact;?></p>
              <?php endif;?>
              <?php if(!empty($contact2)):?>
              <p class="mb-0"><?php echo $contact2;?></p>
              <?php endif;?>
            </div>
            <div class="col-md-4 text-center py-3 py-md-2">
              <i class="mai-mail-open-outline h3"></i>
              <p class="fg-primary fw-medium fs-vlarge">Email</p>
              <?php if(!empty($email)):?>
              <p class="mb-1"><?php echo $email;?></p>
              <?php endif;?>
              <?php if(!empty($email2)):?>
              <p class="mb-0"><?php echo $email2;?></p>
              <?php endif;?>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-5 my-3 wow fadeInUp">
        <div class="card-page">
          <h3 class="fw-normal"><?php echo get_post_meta($post->ID, 'meta-title-title', true);?></h3>
          <form method="POST" class="mt-3">
            <?php echo do_shortcode( get_post_meta($post->ID, 'meta-title-form', true) );?>
          </form>
        </div>
      </div>
      <div class="col-md-6 col-lg-7 my-3 wow fadeInUp">
        <div class="card-page">
          <div class="maps-container">
            <div id="myMap"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

</div> <!-- .bg-light -->
<script async defer src="<?php echo get_post_meta($post->ID, 'meta-description-map', true);?>"></script>
<?php
get_footer();
