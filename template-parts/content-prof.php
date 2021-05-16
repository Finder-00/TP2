<?php
/**
 * Template part l'affichage des prof dans category prof.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package theme4w4
 */
global $typeProf;
?>

	<article class="article">
		<a href="<?php echo get_permalink()?>">
			<?php the_post_thumbnail( 'thumbnail' ); ?>
		</a>
		<div class="prof_info">	
			<?php the_title() ?>
		</div>
		<div class="prof_info">	
			<?php the_archive_description( ) ?>
		</div>
	</article>
