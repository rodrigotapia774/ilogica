<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package rockyweb
 */

get_header();
?>
<div class="container container-post">
	<div class="row">
		<div class="col-12">
			<div class="alert alert-shop">
				<h2 class="entry-title mb-5 text-center"><?php esc_html_e( 'Oops! Esta página no puede ser encontrada.', 'rockyweb' ); ?></h2>
				<p class="text-center"><?php esc_html_e( '¿Parece que no se encontró nada en esta ubicación. Tal vez intente uno de los enlaces del menú superior
?', 'rockyweb' ); ?></p>
			</div><!-- .page-header -->
		</div>
	</div>
</div>
<?php
get_footer();
