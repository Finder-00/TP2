<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package theme-4w4
 */

?>

	<footer id="colophon" class="site-footer">
		<div class="site-info">
			<h3>
				<?php
				/* translators: %s: CMS name, i.e. WordPress. */
				printf( 'Fait par Arthur Robitaille', 'theme-4w4' );
				?>
			</h3>
			<span class="sep"> | </span>
				<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'Theme: %1$s by %2$s.', 'theme-4w4' ), 'arturo', '<a href="http://underscores.me/">finder</a>' );
				?>
				<a href="https://cmaisonneuve.qc.ca">Liens pour le College de maisonnneuve</a>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
