<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package theme-4w4
 */

get_header();
?>


<!-- /////////////// contenu FRONT-PAGE ///////////// -->
	<main id="primary" class="site-main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">

				<?php // Masquer l'affichague du mot 'Archive'
				//the_archive_title( '<h1 class="page-title">', '</h1>' );
				//the_archive_description( '<div class="archive-description">', '</div>' );
				?>

			</header><!-- .page-header -->
			<section class="article-menu">
				
				<?php
				$precedent = "XXXXX";
				$ctrl_radio = "";

				/* debut WHILE */
				while ( have_posts() ) : the_post();
				
					convertir_tableau($tPropriete);
						
					if($precedent != $tPropriete['typeCours']):
				?>
						<?php if($precedent != "XXXXX"): ?>
							</section> <!--ici on ferme la section ouverte precedement -->
							<?php if($precedent != "Web"): ?> <!--pour ne pas afficher en dessous du carrousel-->
							<?php endif;?>

							<?php if (in_array($precedent, ['Web','Jeu'])):?>
							<section class="ctrl-carrousel">
								<?php echo $ctrl_radio;?>
								<?php $ctrl_radio = '';?> 
							</section>
							<?php endif;?>
						<?php endif; ?>
						<h1><?php echo $tPropriete['titre'] ?></h1>

						<section <?php echo class_composent($tPropriete['typeCours']); ?>>

					<?php endif; ?>
						<?php if( in_array($tPropriete['typeCours'], ['Web','Jeu'])):
							get_template_part( 'template-parts/content', 'carrousel');
							$ctrl_radio .= '<div> <input type="radio" class="bouton-radio" name="rad-'.$tPropriete['typeCours'].'"> </div>';
						elseif($tPropriete['typeCours'] == 'Projets-perso'):
							get_template_part( 'template-parts/content', 'galerie');
						else :
							get_template_part( 'template-parts/content', 'bloc' );
						endif;

					$precedent = $tPropriete['typeCours'];
				endwhile; ?> <!-- fin WHILE-->
			</section>
		<?php endif; ?> <!-- fin if (Have post())-->
			
			<!-- Formulaire qui ajoute des nouvelles -->
			<?php if(current_user_can( 'administrator')) : ?>
			<section class="admin-rapide">
				<h3>Ajouter une nouvelle</h3>
				<input type="text" name="title" placeholder="titre">
				<textarea name="content"></textarea>
				<button id="bout-rapide">Ajouter la nouvelle</button>
				<?php ?>
			</section>
			<?php endif;?>
			
			<!-- Affiche les 3 derniere nouvelles -->
			<section class="nouvelles">	
				<button id="bout_nouvelles"> Afficher les 3 dernières nouvelles</button>
				<section></section>
			</section>

	</main><!-- #main -->

<?php

get_sidebar();
get_footer();


function class_composent($typeCours){
 	if(in_array($typeCours, ['Web', 'Jeu'])){
		return('class="carrousel2"');
 	}
	elseif($typeCours == 'Projets' || $typeCours == 'Projets-perso'){
		return('class="galerie-frontPage"');
	}
	else{
		return 'class="bloc"';
	}
}

function convertir_tableau(&$tPropriete){
	$titreGrand = get_the_title();
	// print($titreGrand);
	// print_r($tPropriete['session']);
	// substr : 1er nb = debut selection 2e nb = fin de la selection
	$tPropriete['session'] = substr($titreGrand, 4,1); // le numero session
	$tPropriete['nbHeure'] = substr($titreGrand, -4, 3); // heure du cours
	$tPropriete['titre'] = substr($titreGrand, 8, -6); // le titre du cours
	$tPropriete['sigle'] = substr($titreGrand, 0, 7); // le code du cours

	$tPropriete['typeCours'] = get_field('type_de_cours'); // le type associer a la categorie de l'article
}


//vague dans les cours -> article
function type_vague($typeCours){
	switch($typeCours){

		case "Web" :
			return '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#033999" fill-opacity="0.7" d="M0,32L34.3,80C68.6,128,137,224,206,266.7C274.3,309,343,299,411,261.3C480,224,549,160,617,138.7C685.7,117,754,139,823,170.7C891.4,203,960,245,1029,256C1097.1,267,1166,245,1234,208C1302.9,171,1371,117,1406,90.7L1440,64L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z"></path></svg>';

		case "Spécifique" :
			return '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="rgb(164, 38, 218)" fill-opacity="0.7" d="M0,64L120,85.3C240,107,480,149,720,144C960,139,1200,85,1320,58.7L1440,32L1440,320L1320,320C1200,320,960,320,720,320C480,320,240,320,120,320L0,320Z"></path></svg>';

		case "Jeu" :
			return '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#0099ff" fill-opacity="0.7" d="M0,256L34.3,229.3C68.6,203,137,149,206,122.7C274.3,96,343,96,411,106.7C480,117,549,139,617,160C685.7,181,754,203,823,181.3C891.4,160,960,96,1029,90.7C1097.1,85,1166,139,1234,133.3C1302.9,128,1371,64,1406,32L1440,0L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z"></path></svg>';
			
		case "Image 2d/3d" :
			return '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="rgb(255, 169, 112)" fill-opacity="1" d="M0,320L34.3,304C68.6,288,137,256,206,202.7C274.3,149,343,75,411,80C480,85,549,171,617,213.3C685.7,256,754,256,823,250.7C891.4,245,960,235,1029,234.7C1097.1,235,1166,245,1234,256C1302.9,267,1371,277,1406,282.7L1440,288L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z"></path></svg>';

		case "Conception" :
			return '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="rgb(255, 134, 78)" fill-opacity="0.7" d="M0,128L11.4,133.3C22.9,139,46,149,69,165.3C91.4,181,114,203,137,186.7C160,171,183,117,206,128C228.6,139,251,213,274,213.3C297.1,213,320,139,343,101.3C365.7,64,389,64,411,53.3C434.3,43,457,21,480,42.7C502.9,64,526,128,549,138.7C571.4,149,594,107,617,80C640,53,663,43,686,69.3C708.6,96,731,160,754,170.7C777.1,181,800,139,823,154.7C845.7,171,869,245,891,277.3C914.3,309,937,299,960,298.7C982.9,299,1006,309,1029,304C1051.4,299,1074,277,1097,224C1120,171,1143,85,1166,69.3C1188.6,53,1211,107,1234,144C1257.1,181,1280,203,1303,208C1325.7,213,1349,203,1371,170.7C1394.3,139,1417,85,1429,58.7L1440,32L1440,320L1428.6,320C1417.1,320,1394,320,1371,320C1348.6,320,1326,320,1303,320C1280,320,1257,320,1234,320C1211.4,320,1189,320,1166,320C1142.9,320,1120,320,1097,320C1074.3,320,1051,320,1029,320C1005.7,320,983,320,960,320C937.1,320,914,320,891,320C868.6,320,846,320,823,320C800,320,777,320,754,320C731.4,320,709,320,686,320C662.9,320,640,320,617,320C594.3,320,571,320,549,320C525.7,320,503,320,480,320C457.1,320,434,320,411,320C388.6,320,366,320,343,320C320,320,297,320,274,320C251.4,320,229,320,206,320C182.9,320,160,320,137,320C114.3,320,91,320,69,320C45.7,320,23,320,11,320L0,320Z"></path></svg>';
	}
}
