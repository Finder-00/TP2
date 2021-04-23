<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package theme4w4
 */

get_header();
?>
	<main id="primary" class="site-main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
			</header><!-- .page-header -->
			<section class="galerie">
			<div class="titreProjet">
				<?php
					echo '<h1 class="page-title">' . single_cat_title('', false ). '</h1>';
					the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</div>
			
			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/content', 'galerie' );

			endwhile; ?>
			
			</section>

		<?php endif;?>

	</main><!-- #main -->

<?php
// get_sidebar();
get_footer();
