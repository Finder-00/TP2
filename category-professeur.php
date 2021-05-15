<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package theme4w4
 * 
 *  
 */
 	global $typeProf;
get_header();
?>
	<main id="primary" class="site-main">

		<?php if ( have_posts() ) : ?>
			<header class="page-header">
			</header><!-- .page-header -->
			<section class="prof">
				<div class="titreProjet">
					<?php
						echo '<h1 class="page-title">' . single_cat_title('', false ). '</h1>';
						the_archive_description( '<div class="archive-description">', '</div>' );
					?>
				</div>

				<!-- ////////////---------//////////// -->
					<!-- section regroupant les prof de programmation -->
				<!-- ////////////---------//////////// -->
				<section class="sectionProg">
					<h1>Programmation</h1>
					<section class="contenuProg">
						<?php while ( have_posts() ) :
							the_post();

							convertir_tableau($typeProf);
							
							if(in_array($typeProf['typeProf'], ['programmation'])):?>
								<?php get_template_part( 'template-parts/content', 'prof' );?>
							<?php endif;

						endwhile; ?>
					</section>
				 </section> <!-- fin section programmation-->

				<!-- ////////////---------//////////// -->
					<!-- section regroupant les prof de creation -->
				<!-- ////////////---------//////////// -->
				<section class="sectionCreation">
					<h1>Création</h1>
					<section class="contenuCreation">
						<?php while ( have_posts() ) :
							the_post();

							convertir_tableau($typeProf);

							if(in_array($typeProf['typeProf'], ['creation'])):?>
								<?php get_template_part( 'template-parts/content', 'prof' );?>
							<?php endif;

						endwhile; ?>
					</section>
				</section> <!-- fin section creation -->
			
			</section>

		<?php endif;?>

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();


function convertir_tableau(&$typeProf){
	$typeProf['typeProf'] = get_field('type_de_prof'); // le type associer au prof
}