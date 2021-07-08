<?php
/**
 * rockyweb functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package rockyweb
 */

if ( ! function_exists( 'rockyweb_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function rockyweb_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on rockyweb, use a find and replace
		 * to change 'rockyweb' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'rockyweb', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'rockyweb' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'rockyweb_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'rockyweb_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function rockyweb_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'rockyweb_content_width', 640 );
}
add_action( 'after_setup_theme', 'rockyweb_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function rockyweb_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'rockyweb' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'rockyweb' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'rockyweb_widgets_init' );


function rockyweb_widgets1_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 1', 'rockyweb' ),
		'id'            => 'widget-1',
		'description'   => esc_html__( 'Add widgets here.', 'rockyweb' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'rockyweb_widgets1_init' );

// ADD MAINCOJNS CSS ARCHIVE
function maicons_css() {
	wp_enqueue_style( 'maicons_css', get_stylesheet_directory_uri() . '/assets/css/maicons.css'); 
}
add_action( 'wp_enqueue_scripts', 'maicons_css');

// ADD MAIN ICONS IN ADMIN WORDPRESS TEMPLATE
add_action( 'admin_enqueue_scripts', 'my_admin_style');

function my_admin_style() {
  wp_enqueue_style( 'admin-style', get_stylesheet_directory_uri() . '/assets/css/maicons.css' );
}

// ADD ANIMATE CSS
function animate_css() {
	wp_enqueue_style( 'animate_css', get_stylesheet_directory_uri() . '/assets/vendor/animate/animate.css'); 
}
add_action( 'wp_enqueue_scripts', 'animate_css');

// OWL CAROUSEL CSS
function owl_css() {
	wp_enqueue_style( 'owl_css', get_stylesheet_directory_uri() . '/assets/vendor/owl-carousel/css/owl.carousel.min.css'); 
}
add_action( 'wp_enqueue_scripts', 'owl_css');

// ADD BOOTSTRAP CSS 4.5.0
function bootstrap_css() {
	wp_enqueue_style( 'bootstrap_css', get_stylesheet_directory_uri() . '/assets/css/bootstrap.css', array(),'4.5.0'); 
}
add_action( 'wp_enqueue_scripts', 'bootstrap_css');

// MOBSTER CSS
function mobster_css() {
	wp_enqueue_style( 'mobster_css', get_stylesheet_directory_uri() . '/assets/css/mobster.css'); 
}
add_action( 'wp_enqueue_scripts', 'mobster_css');

// ADD JQUERY 3.5.1 JS
function jquery_js() {
	wp_enqueue_script( 'jquery_js', 
  					get_stylesheet_directory_uri() . '/assets/js/jquery-3.5.1.min.js', 
  					array('jquery'), 
  					'3.5.1', 
  					true); 
}
add_action( 'wp_enqueue_scripts', 'jquery_js');

// ADD BOOTSTRAP JS 4.5.0
function bootstrap_js() {
	wp_enqueue_script( 'bootstrap_js', 
  					get_stylesheet_directory_uri() . '/assets/js/bootstrap.bundle.min.js', 
  					array('jquery'), 
  					'4.5.0', 
  					true); 
}
add_action( 'wp_enqueue_scripts', 'bootstrap_js');

// ADD OWL CAROUSEL JS
function owl_js() {
	wp_enqueue_script( 'owl_js', 
  					get_stylesheet_directory_uri() . '/assets/vendor/owl-carousel/js/owl.carousel.min.js', 
  					array('jquery'), 
  					true); 
}
add_action( 'wp_enqueue_scripts', 'owl_js');

// ADD WOW JS
function wow_js() {
	wp_enqueue_script( 'wow_js', 
  					get_stylesheet_directory_uri() . '/assets/vendor/wow/wow.min.js', 
  					array('jquery'), 
  					true); 
}
add_action( 'wp_enqueue_scripts', 'wow_js');

// ADD MOBSTER JS
function mobster_js() {
	wp_enqueue_script( 'wow_js', 
  					get_stylesheet_directory_uri() . '/assets/js/mobster.js', 
  					array('jquery'), 
  					true); 
}
add_action( 'wp_enqueue_scripts', 'mobster_js');

// ADD MAPS JS
function maps_js() {
	wp_enqueue_script( 'map_js', 
  					get_stylesheet_directory_uri() . '/assets/js/google-maps.js', 
  					array('jquery'), 
  					true); 
}
add_action( 'wp_enqueue_scripts', 'maps_js');

/**
 * Enqueue scripts and styles.
 */
function rockyweb_scripts() {

	wp_enqueue_style( 'rockyweb-style', get_stylesheet_uri() );

	wp_enqueue_script( 'rockyweb-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'rockyweb-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'rockyweb_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}
/**
* NAV BOOTSTRAP
*/
require_once get_template_directory() . '/wp-bootstrap-navwalker-master/class-wp-bootstrap-navwalker.php';

function bootstrap_pagination( \WP_Query $wp_query = null, $echo = true ) {
	if ( null === $wp_query ) {
		global $wp_query;
	}
	$pages = paginate_links( [
			'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
			'format'       => '?paged=%#%',
			'current'      => max( 1, get_query_var( 'paged' ) ),
			'total'        => $wp_query->max_num_pages,
			'type'         => 'array',
			'show_all'     => false,
			'end_size'     => 3,
			'mid_size'     => 1,
			'prev_next'    => true,
			'prev_text'    => __( '« Prev' ),
			'next_text'    => __( 'Next »' ),
			'add_args'     => false,
			'add_fragment' => ''
		]
	);
	if ( is_array( $pages ) ) {
		//$paged = ( get_query_var( 'paged' ) == 0 ) ? 1 : get_query_var( 'paged' );
		$pagination = '<div class="pagination"><ul class="pagination">';
		foreach ( $pages as $page ) {
			//$pagination .= '<li class="page-item"> ' . str_replace( 'page-numbers', 'page-link', $page ) . '</li>';
			$pagination .= '<li class="page-item '.(strpos($page, 'current') !== false ? 'active' : '').'"> ' . str_replace( 'page-numbers', 'page-link', $page ) . '</li>';
		}
		$pagination .= '</ul></div>';
		if ( $echo ) {
			echo $pagination;
		} else {
			return $pagination;
		}
	}
	return null;
}

function bootstrap_pagination_search( \WP_Query $wp_query = null, $echo = true ) {
	if ( null === $wp_query ) {
		global $wp_query;
	}
	$pages = paginate_links( [
			//'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
			'format'       => '?page=%#%',
			'current'      => max( 1, get_query_var( 'page' ) ),
			'total'        => $wp_query->max_num_pages,
			'type'         => 'array',
			'show_all'     => false,
			'end_size'     => 3,
			'mid_size'     => 1,
			'prev_next'    => true,
			'prev_text'    => __( '« Prev' ),
			'next_text'    => __( 'Next »' ),
			'add_args'     => false,
			'add_fragment' => ''
		]
	);

	if ( is_array( $pages ) ) {
		//$paged = ( get_query_var( 'paged' ) == 0 ) ? 1 : get_query_var( 'paged' );
		$pagination = '<div class="pagination"><ul class="pagination">';
		foreach ( $pages as $page ) {
			//$pagination .= '<li class="page-item"> ' . str_replace( 'page-numbers', 'page-link', $page ) . '</li>';
			$pagination .= '<li class="page-item '.(strpos($page, 'current') !== false ? 'active' : '').'"> ' . str_replace( 'page-numbers', 'page-link', $page ) . '</li>';
		}
		$pagination .= '</ul></div>';
		if ( $echo ) {
			echo $pagination;
		} else {
			return $pagination;
		}
	}
	return null;
}

require_once  'gallery-metabox/gallery.php';

add_theme_support( 'post-thumbnails' );
  require_once(get_template_directory() . '/multi-post-thumbnails-master/multi-post-thumbnails.php'); /* Must be located directly under lib folder */
  // Define additional "post thumbnails". Relies on MultiPostThumbnails to work
  if (class_exists('MultiPostThumbnails')) { 
  $types = array('inicio', 'page' ); /* 'landing_pages' adds support for landing pages CPT,  'post' adds support for blog single pages */
  foreach($types as $type) {
      new MultiPostThumbnails(array('label' => 'BANNER', 'id' => 'feature-image-1', 'post_type' => $type)); 
  }

};

// ADD METABOX TO ITEMS
add_action('admin_init', 'single_rapater_meta_boxes', 2);
function single_rapater_meta_boxes() {
	add_meta_box( 'single-repeter-data', 'Items and atributes', 'single_repeatable_meta_box_callback', 'inicio', 'normal', 'default');
}

function single_repeatable_meta_box_callback($post) {
	$single_repeter_group = get_post_meta($post->ID, 'single_repeter_group', true);
	wp_nonce_field( 'repeterBox', 'formType' );
	?>
	<script type="text/javascript">
		jQuery(document).ready(function( $ ){
			$( '#add-row' ).on('click', function() {
				// CREAMOS UNA VARIABLE CON LOS NUEVOS CAMPOS PARA AGREGAR DE FORMA DINAMICA
				var row = '<tr>';
				row += '<td>';
				row += '<select class="selectionx selectpickernew" name="icon[]" style="width:98%;"></select>';
				row += '<input type="text"  style="width:98%;margin-top:8px;" name="color[]" placeholder="Color Exadecimal" />';
				row += '</td>';
				row += '<td>';
				row += '<input type="text" style="width:98%;margin-bottom:5px;" name="title[]" placeholder="Item" />';
				row += '<textarea style="width:98%;margin-bottom:5px;" rows="3" name="description[]"></textarea>';
				row += '</td>';
				row += '<td>';
				row += '<a class="button remove-row" href="#">Remove</a>';
				row += '</td>';
				row += '</tr>';

				// AGREGAMOS LA VARIABLE QUE MENCIONAMOS Y CONN EL METODO APPEND LO ASIGNAMOS AL COMPONENTE
				$('#repeatable-fieldset-one tbody').append(row);

				// INICIALIZAMOS EL SELECT2 CADA VEZ QUE SE AGREGA UN NUEVO ELEMENTO, CON LAS VARIABLES POR DEFECTO QUE UTILIZAREMOS EN EL EJEMPLO
				$('.selectpickernew').select2({
			  	data: [{
              id: 'mai-cube',
              text: "<span class='mai-cube'></span> Cube",
          }, {
              id: 'mai-shield',
              text: "<span class='mai-shield'></span> Shield",
          }, {
              id: 'mai-desktop-outline',
              text: "<span class='mai-desktop-outline'></span> Desktop",
          }],
          placeholder: "<i class='fa fa-sitemap'></i>Branch name",
          escapeMarkup: function (markup) { return markup; }
			  });

				return false;
			});

			$('#repeatable-fieldset-one').on('click', 'a.remove-row', function() {
				$(this).parents('tr').remove();
				return false;
			});
		});
	</script>
	
	<style type="text/css">
	#repeatable-fieldset-one tbody tr td {
		padding-bottom:10px;
	}
	</style>

	<div class="block-editor-writing-flow">
	  <div class="block-editor-block-list__layout is-root-container">
		  <div class="block-list-appender wp-block">
			  <p><a id="add-row" class="button" href="#">Nuevo Ithem</a></p>
			  <table id="repeatable-fieldset-one" width="100%">
		      <tbody>
		      	<?php
		      	if ( $single_repeter_group ) :
		      		$count = 0;
		      		foreach ( $single_repeter_group as $field ) { ?>
		      		  <script type="text/javascript">
		            jQuery(document).ready(function( $ ){
		      				$('.selectpicker<?php echo $count;?>').select2({
		                data: [{
                        id: 'mai-cube',
                        text: "<span class='mai-cube'></span> Cube",
		      							selected: "<?php if($field['icon'] == 'mai-cube'){ echo true; } else { echo false; }?>"
                    }, {
                        id: 'mai-shield',
                        text: "<span class='mai-shield'></span> Shield",
		      							selected: "<?php if($field['icon'] == 'mai-shield'){ echo true; } else { echo false; }?>"
                    }, {
                        id: 'mai-desktop-outline',
                        text: "<span class='mai-desktop-outline'></span> Desktop",
		      							selected: "<?php if($field['icon'] == 'mai-desktop-outline'){ echo true; } else { echo false; }?>"
                    }],
                    placeholder: "<i class='fa fa-sitemap'></i>Branch name",
                    escapeMarkup: function (markup) { return markup; }
		      	      });
		      			});
		      			</script>
		      			<tr>
		      				<td>
		      					<select class="selectionx selectpicker<?php echo $count;?>" name="icon[]" style="width:98%;"></select>
		      					<input type="text"  style="width:98%;margin-top:8px;" name="color[]" value="<?php if ($field['color'] != '') echo esc_attr( $field['color'] ); ?>" placeholder="Color Exadecimal" />
		      				</td>
		      				<td>
		      				  <input type="text"  style="width:98%;margin-bottom:5px;" name="title[]" value="<?php if ($field['title'] != '') echo esc_attr( $field['title'] ); ?>" placeholder="Item" />
		      				  <textarea style="width:98%;" name="description[]" placeholder="Description"><?php if ($field['description'] != '') echo esc_attr( $field['description'] ); ?></textarea>
		      				</td>
		      				<td><a class="button remove-row" href="#1">Remove</a></td>
		      			</tr>
		      			<?php
		      			$count++;
		      		}
		      	else :
		      		?>
		      		<tr>
		      		  <td>
		      				<select class="selectionx selectpickernew" name="icon[]" style="width:98%;"></select>
		      				<input type="text"  style="width:98%;margin-top:8px;" name="color[]" placeholder="Color Exadecimal" />
		      		  </td>
		      		  <td>
		      			  <input type="text" style="width:98%;margin-bottom:5px;" name="title[]" placeholder="Item" />
		      		    <textarea style="width:98%;margin-bottom:5px;" name="description[]" placeholder="Description"></textarea>
		      		  </td>
		      			<td><a class="button  cmb-remove-row-button button-disabled" href="#">Remove</a></td>
		      		</tr>
		      	<?php endif; ?>
		      </tbody>
	      </table>
	    </div>
		</div>
	</div>
	<?php
}
// Save Meta Box values.
add_action('save_post', 'single_repeatable_meta_box_save');

function single_repeatable_meta_box_save($post_id) {
	if (!isset($_POST['formType']) && !wp_verify_nonce($_POST['formType'], 'repeterBox'))
		return;

	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
		return;

	if (!current_user_can('edit_post', $post_id))
		return;

	$old = get_post_meta($post_id, 'single_repeter_group', true);

	$new = array();
	$titles = $_POST['title'];
	$tdescs = $_POST['description'];
	$ticon = $_POST['icon'];
	$tcolors = $_POST['color'];
	$count = count( $titles );
	for ( $i = 0; $i < $count; $i++ ) {
		if ( $titles[$i] != '' ) {
			$color = str_replace ( "#", '', $tcolors[$i]);
			$new[$i]['title'] = stripslashes( strip_tags( $titles[$i] ) );
			$new[$i]['description'] = stripslashes( $tdescs[$i] );
			$new[$i]['icon'] = stripslashes( $ticon[$i] );
			$new[$i]['color'] = stripslashes( $color );
		}
	}

	delete_post_meta( $post_id, 'single_repeter_group', $old );

	if ( !empty( $new ) && $new != $old ){
		update_post_meta( $post_id, 'single_repeter_group', $new );
	}
	$repeter_status= $_REQUEST['repeter_status'];
	update_post_meta( $post_id, 'repeter_status', $repeter_status );
}


/*** CAMPO PERSONALIZADO INICIO/HOME *****/
function wporg_add_custom_home()
{
  $screens = ['page'];
  foreach ($screens as $screen) {
    add_meta_box(
      'wporg_box_id',
      'Home',
      'wporg_custom_home_html',
      $screen,
      'side'
    );
  }
}
add_action('add_meta_boxes', 'wporg_add_custom_home');
function wporg_custom_home_html($post)
{
    $title = get_post_meta($post->ID, 'meta-title-home', true);
		$description = get_post_meta($post->ID, 'meta-description-home', true);
		$link = get_post_meta($post->ID, 'meta-link-home', true);
		?>
    <input type="text" style="width:98%;margin-bottom:5px;" name="meta-title-home" placeholder="Title banner" value="<?php echo $title;?>">
		<textarea rows="5" style="width:98%;margin-bottom:5px;" name="meta-description-home" placeholder="Descriptions banner"><?php echo $description;?></textarea>
		<input type="text" style="width:98%;margin-bottom:5px;" name="meta-link-home" placeholder="Button banner" value="<?php echo $link;?>">
    <?php
}

function wporg_save_postdata_home($post_id)
{
    if (array_key_exists('meta-title-home', $_POST)) {
      update_post_meta(
        $post_id,
        'meta-title-home',
        $_POST['meta-title-home']
      );
    }

		if (array_key_exists('meta-description-home', $_POST)) {
      update_post_meta(
        $post_id,
        'meta-description-home',
        $_POST['meta-description-home']
      );
    }

		if (array_key_exists('meta-link-home', $_POST)) {
      update_post_meta(
        $post_id,
        'meta-link-home',
        $_POST['meta-link-home']
      );
    }
}

add_action('save_post', 'wporg_save_postdata_home');

/*** CAMPO PERSONALIZADO CONTACTO MAPS AND CONTACT FORM 7 *****/
function wporg_add_custom_contacto()
{
  $screens = ['contacto'];
  foreach ($screens as $screen) {
    add_meta_box(
      'wporg_contacto_id',
      'Maps & Contact ',
      'wporg_custom_contacto_html',
      $screen,
      'side'
    );
  }
}
add_action('add_meta_boxes', 'wporg_add_custom_contacto');
function wporg_custom_contacto_html($post)
{
	  $title = get_post_meta($post->ID, 'meta-title-title', true);
    $form = str_replace( '"', "'", get_post_meta($post->ID, 'meta-title-form', true));
		$map = str_replace( '"', "'", get_post_meta($post->ID, 'meta-description-map', true));
		?>
		<input type="text" style="width:98%;margin-bottom:5px;" name="meta-title-title" placeholder="Title form" value="<?php echo $title;?>">
    <input type="text" style="width:98%;margin-bottom:5px;" name="meta-title-form" placeholder="Meta contact form 7" value="<?php echo $form;?>">
		<textarea rows="5" style="width:98%;margin-bottom:5px;" name="meta-description-map" placeholder="Code Google Mpas"><?php echo $map;?></textarea>
    <?php
}

function wporg_save_postdata_contacto($post_id)
{
	if (array_key_exists('meta-title-title', $_POST)) {
		update_post_meta(
			$post_id,
			'meta-title-title',
			$_POST['meta-title-title']
		);
	}

    if (array_key_exists('meta-title-form', $_POST)) {
      update_post_meta(
        $post_id,
        'meta-title-form',
        $_POST['meta-title-form']
      );
    }

		if (array_key_exists('meta-description-map', $_POST)) {
      update_post_meta(
        $post_id,
        'meta-description-map',
        $_POST['meta-description-map']
      );
    }
}

add_action('save_post', 'wporg_save_postdata_contacto');

/*** CAMPO PERSONALIZADO CONTACTO MAPS AND CONTACT FORM 7 *****/
function wporg_add_custom_contacto_data()
{
  $screens = ['contacto'];
  foreach ($screens as $screen) {
    add_meta_box(
      'wporg_contacto_data_id', // Unique ID
      'Info contacto',  // Box title
      'wporg_custom_contacto_data_html',  // Content callback, must be of type callable
      $screen, // Post type
    );
  }
}
add_action('add_meta_boxes', 'wporg_add_custom_contacto_data');
function wporg_custom_contacto_data_html($post)
{
	$location = get_post_meta($post->ID, 'meta-contact-location', true);
	$location2= get_post_meta($post->ID, 'meta-contact-location2', true);
	$contact = get_post_meta($post->ID, 'meta-contact-contact', true);
	$contact2 = get_post_meta($post->ID, 'meta-contact-contact2', true);
	$email = get_post_meta($post->ID, 'meta-contact-email', true);
	$email2 = get_post_meta($post->ID, 'meta-contact-email2', true);
	?>
	<table id="repeatable-fieldset-one" width="100%">
	  <tbody>
		<tr>
		  <td>
			  <h2 style="text-align:center;font-size: 24px;"><i class="mai-location-outline h3"></i></h2>
				<p style="text-align:center;">Location</p>
				<input type="text" style="width:98%;margin-bottom:5px;" name="meta-contact-location" value="<?php echo $location;?>">
				<input type="text" style="width:98%;" name="meta-contact-location2" value="<?php echo $location2;?>">
			</td>
			<td>
		  	<h2 style="text-align:center;font-size: 24px;"><i class="mai-call-outline h3"></i></h2>
				<p style="text-align:center;">Contact</p>
				<input type="text" style="width:98%;margin-bottom:5px;" name="meta-contact-contact" value="<?php echo $contact;?>">
				<input type="text" style="width:98%;" name="meta-contact-contact2" value="<?php echo $contact2;?>">
			</td>
			<td>
			  <h2 style="text-align:center;font-size: 24px;"><i class="mai-mail-open-outline h3"></i></h2>
				<p style="text-align:center;">Email</p>
				<input type="text" style="width:98%;margin-bottom:5px;" name="meta-contact-email" value="<?php echo $email;?>">
				<input type="text" style="width:98%;" name="meta-contact-email2" value="<?php echo $email2;?>">
			</td>
		</tr>
		</tbody>
	</table>
  <?php
}

function wporg_save_postdata_contacto_data($post_id)
{
	if (array_key_exists('meta-contact-location', $_POST)) {
		update_post_meta(
			$post_id,
			'meta-contact-location',
			$_POST['meta-contact-location']
		);
	}
	if (array_key_exists('meta-contact-location2', $_POST)) {
		update_post_meta(
			$post_id,
			'meta-contact-location2',
			$_POST['meta-contact-location2']
		);
	}
	if (array_key_exists('meta-contact-contact', $_POST)) {
		update_post_meta(
			$post_id,
			'meta-contact-contact',
			$_POST['meta-contact-contact']
		);
	}
	if (array_key_exists('meta-contact-contact2', $_POST)) {
		update_post_meta(
			$post_id,
			'meta-contact-contact2',
			$_POST['meta-contact-contact2']
		);
	}
	if (array_key_exists('meta-contact-email', $_POST)) {
		update_post_meta(
			$post_id,
			'meta-contact-email',
			$_POST['meta-contact-email']
		);
	}
	if (array_key_exists('meta-contact-email2', $_POST)) {
		update_post_meta(
			$post_id,
			'meta-contact-email2',
			$_POST['meta-contact-email2']
		);
	}
}

add_action('save_post', 'wporg_save_postdata_contacto_data');