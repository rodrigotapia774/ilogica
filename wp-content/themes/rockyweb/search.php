<?php
/**
 * The template for displaying archive tipo_propiedad
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package rockyweb
 */

get_header();
?>
<section class="section-search">
    <?php 
include( get_template_directory() . '/banner.php');
?>
<div class="search-categoria">
	<form class="container container-search" name="formulario" method="GET" action="<?php bloginfo('url');?>">
		<input type="hidden" name="s" value=""/>
	    <div class="input-group" style="background-color:#fff;">
	    	<?php 
	        $taxonomy = 'servicio';
	           $tax_terms = get_terms($taxonomy);
	        ?>
            <select class="form-control form-control-lg select-solid select-white" name="servicio">
                <option value="">Seleccionar</option>
                <?php foreach($tax_terms as $val){ ?>
                <option value="<?php echo $val->term_id;?>" <?php if($val->term_id == $_GET['servicio']){ echo 'selected';}?>><?php echo $val->name ?></option>	
                <?php } ?>
            </select>
	    	
	    	<?php 
	        $taxonomies = get_terms( array(
                'taxonomy' => 'localidades',
                'hide_empty' => false
            ) );
	        ?>
            <select class="form-control form-control-lg select-solid select-white" name="localidad">
                	<option value="0">Seleccionar</option>
                	<?php
                	if ( !empty($taxonomies) ) :
                        $output = '';
                        foreach( $taxonomies as $category ) {
                            if( $category->parent == 0 ) {
                                $output.= '<option ';
                                if( $category->term_id == $_GET['localidad']){
                                    $output .=  ' selected '; 
                                }
                                $output .= 'value="'. esc_attr( $category->term_id ) .'">' . esc_html( $category->name ) . '</option>';
                                foreach( $taxonomies as $subcategory ) {
                                    if($subcategory->parent == $category->term_id) {
                                        $output.= '<option ';
                                        if( $subcategory->term_id == $_GET['localidad']){
                                    	   $output .= ' selected ';
                                        }
                                        $output .= 'value="'. esc_attr( $subcategory->term_id ) .'">&nbsp;&nbsp;&nbsp;'. esc_html( $subcategory->name ) .'</option>';
                                    }
                                }
                                $output.='';
                            }
                        }
                        $output.='';
                        echo $output;
                    endif; 
                	?>
            </select>

            <input type="hidden" name="customtaxonomy" value="propiedad"/>

            <button type="submit" class="btn btn-horus btn-lg">BUSCAR</button>
	    </div>
	</form>
</div>
</section>

<section>
	<div class="container"> 
	    <div class="row">
			<?php
			$args = array(
				'post_type' => 'propiedad',
				'post_status' => 'publish',
				'orderby' => 'dated',
				'paged' => get_query_var('page'),
				'tax_query' => array(
					'relation' => '	IN', 
					array(
						'taxonomy' => 'servicio',
						'field' => 'id',
						'terms' => $_GET['servicio'],
						'include_children' => false,
						'operator' => 'AND'
					),
					array(
						'taxonomy' => 'localidades',
						'field' => 'id',
						'terms' => $_GET['localidad'],
						'include_children' => false,
						'operator' => 'AND'
					)
				),
			);
            $the_query = new WP_Query( $args );
		    if ( $the_query ) : 
		        while($the_query->have_posts() ) : $the_query->the_post();
		        	$localidad = ',';
                	$terms = wp_get_post_terms(get_the_ID(), "localidades");
		            foreach ($terms as $termid) {  
			            $localidad = $localidad . ', ' .$termid->name;
		            }
		            $localidad = substr($localidad, 2);
		        	$thumbID = get_post_thumbnail_id( get_the_ID() );
                    $imgDestacada = wp_get_attachment_image_src( $thumbID, 'full' );
                    $custom_fields = get_post_custom(get_the_ID());
                    $custom_fields = get_post_custom(get_the_ID());?>
		        		<div class="col-6 col-sm-4 col-md-4 col-lg-4 mb-3">
    	<?php if(empty($imgDestacada[0])){ ?>
    		<div class="box-inmobiliaria" style="background-image: url(<?php echo get_template_directory_uri();?>/assets/img/img-horus.jpg);">
    	<?php } else { ?>
    		<div class="box-inmobiliaria" style="background-image: url(<?php echo $imgDestacada[0];?>);">
    	<?php }?>
    	</div>
    	<a href="<?php echo get_the_guid();?>">
    			<div class="box-display box-corretaje">
    				<h2><?php echo get_post_meta(get_the_ID(), 'propiedad-valor', true); ?></h2>
    				<h3><?php echo get_the_title();?></h3>
    				<h6><i class="fas fa-map-marker-alt"></i> <?php echo $localidad;?></h6>
    				<ul class="nav nav-justified">
		    		    <?php if( isset( $custom_fields['propiedad-habitaciones'] ) ) { ?>
		    		    <li class="nav-item">
		    			    <i class="fas fa-bed"></i>  <?php echo $custom_fields['propiedad-habitaciones'][0]; ?>
		    		    </li>
		    	        <?php } ?>

		    	        <?php if( isset( $custom_fields['propiedad-baños'] ) ) { ?>
		    		    <li class="nav-item">
		    			    <i class="fas fa-bath"></i>  <?php echo $custom_fields['propiedad-baños'][0]; ?>
		    		    </li>
		    	        <?php } ?>

		    	        <?php if( isset( $custom_fields['propiedad-estacionesmiento'] ) ) { ?>
		    		    <li class="nav-item">
		    			    <i class="fas fa-car"></i>  <?php echo $custom_fields['propiedad-estacionesmiento'][0]; ?>
		    		    </li>
		    	        <?php } ?>
		    	        <?php if( isset( $custom_fields['propiedad-superficie-total'] ) ) { ?>
		    		    <li class="nav-item">
		    			    <i class="fas fa-expand-arrows-alt"></i>  <?php echo $custom_fields['propiedad-superficie-total'][0]; ?>
		    		    </li>
		    	        <?php } ?>
		    	    </ul>
    			</div>
    		</a>
	</div>
		        <?php
			    endwhile;
			    ?><div class="col-12"><?php bootstrap_pagination_search($the_query); ?> </div> <?php
		    else :
		       get_template_part( 'template-parts/content', 'none' );
		    endif;
		    ?>
	    </div>
    </div><!-- #main -->
</section><!-- #primary -->



<?php
get_footer();