<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package rockyweb
 */
?>

<div class="row">
	<div class="col-12 mb-3">
		<div class="entry-content">
		    <?php the_content();?>
	    </div><!-- .entry-content -->
	</div>
	<div class="col-12 mb-3">
		<div class="columnsx3-list">
			<div class="listado">
				<ul class="row list-unstyled">
                <?php $images = get_post_meta(get_the_ID(), 'vdw_gallery_id', true);
                if( !empty($images) && is_array($images) ){ foreach ($images as $image) { $link_image = wp_get_attachment_image_src($image, 'large');?>
                    <li class="col-6 col-sm-6 col-md-4 col-lg-3">
                        <a class="enlace thumbnail fancybox" rel="ligthbox" href="<?php echo $link_image[0];?>">
                            <div class="bloque-recurso recurso-tipo-documento">
                                <div class="imagen">
                                    <img src="<?php echo $link_image[0];?>" class="img-responsive">
                                </div>
                            </div>
                        </a>
                    </li>
                <?php } } ?>
                </ul>
            </div>
        </div>
	</div>
</div>
<script type="text/javascript">
jQuery(document).ready(function(){
    //FANCYBOX
    //https://github.com/fancyapps/fancyBox
    jQuery(".fancybox").fancybox({
        openEffect: "none",
        closeEffect: "none"
    });
});
</script>
