<?php global $wpdb;?>
<div id="banner"><div class="row"><div class="col-12">
    <?php 
    $results = $wpdb->get_results( "SELECT ID, post_title, post_excerpt, post_content FROM wp_posts WHERE post_status = 'publish' AND  post_type = 'banner' ORDER BY post_date DESC", OBJECT );
    if(!is_null($results) || !empty($wpdb->last_error)){ ?>
	<div id="carousel-example-generic" class="carousel slide carousel-fade" data-ride="carousel">
        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <!-- First slide -->
        <?php 
        $results = $wpdb->get_results( "SELECT ID, post_title, post_content, post_excerpt FROM wp_posts WHERE post_status = 'publish' AND  post_type = 'banners' ORDER BY post_date DESC", OBJECT );
        $int = 0;
        foreach($results as $result){
            	$thumbID = get_post_thumbnail_id( $result->ID );
                $imgDestacada = wp_get_attachment_image_src( $thumbID, 'full' );
                ?>
            <div class="carousel-item item <?php if($int == 0):?>active<?php endif;?> deepskyblue">
                <img src="<?php echo $imgDestacada[0];?>">
                 <div class="carousel-velo"></div>
                <?php if( $result->post_content != '' ):?>
                <div class="carousel-caption">
                    <div class="post-caption">
                        <?php echo $result->post_content;?>
                    </div>
                </div>
                <?php endif;?>
            </div>
        <?php 
        $int++;
        } 
        ?>
        </div>
        <!-- /.carousel-inner -->
        <!-- Controls -->
        <a class="carousel-control-prev" href="#carousel-example-generic" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carousel-example-generic" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <?php } else { ?>
        <video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">
            <source src="<?php echo get_template_directory_uri();?>/assets/video/SPOTHORUS.mp4" type="video/mp4">
        </video>
    <?php } ?>
</div></div></div>