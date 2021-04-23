<?php
/**
 * template part pour afficher les blocs de front pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package theme-4w4
 */
 global $tPropriete;
?>

<article class="<?php echo $tPropriete['typeCours']?>">
	<?php echo type_vague($tPropriete['typeCours']); ?>
	<p> <?php echo ($tPropriete['sigle'] . " - " . $tPropriete['nbHeure'] . " - " . $tPropriete['typeCours']); ?></p> <!-- 4w4 -  75h - web --> 
	<a href="<?php echo get_permalink(); ?>"> <?php echo $tPropriete['titre']; ?></a>
	<p>Session : <?php echo $tPropriete['session'];?></p>
</article>