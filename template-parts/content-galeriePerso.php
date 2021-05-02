<?php
/**
 * Template part l'affichage des bloc de cours dans front-page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package theme4w4
 */
?>

<article class="articlePerso">
	<a href="<?php echo get_permalink()?>">
		<span></span>
		<?php the_post_thumbnail( 'large' ); ?>
	</a>
	<div class="galerie_info">
		<h1>
			<?php the_title() ?>
		</h1>
		<div class="description">
			<?php print(get_the_excerpt()) ?>
		</div>
	</div>
</article>