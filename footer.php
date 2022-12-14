<?php
/**
 * The template for displaying the footer.
 **/

?>

<div id="page_bottom">
	<!-- BEGIN ABOVE_FOOTER -->
	<section id="above_footer">
		<div class="wrapper above_footer_boxes page_text">

			<div class="box first">
				<h3><?php _e( 'About Us' ); ?></h3>
				<?php the_field( 'aboutus', get_theme_mod( 'main_page_id' ) ); ?>
			</div>

			<div class="box second">
				<h3><?php _e( 'Recent Posts' ); ?></h3>

				<?php
					get_template_part( 'posts', 'footer' );
				?>

			</div>


			<div class="box third">
				<h3><?php _e( 'Categories' ); ?></h3>

				<?php do_action( 'projects_in_footer_all_in_li_tag' ); ?>

			</div>

			<div class="box fourth">
				<h3><?php _e( 'Contact Us' ); ?></h3>
				<?php the_field( 'contactus', get_theme_mod( 'main_page_id' ) ); ?>
			</div>
		</div>
	</section>
	<!-- END ABOVE_FOOTER -->

	<!-- BEGIN FOOTER -->
	<footer id="footer">
		<div class="wrapper">
			<p class="copyrights"><?php echo esc_html( get_theme_mod( 'copy_right' ) ); ?></p>
			<a href="#page" class="up">
				<span class="arrow"></span>
				<span class="text"><?php esc_html_e( 'top' ); ?></span>
			</a>
		</div>
	</footer>
	<!-- END FOOTER -->
</div>


</div>
</div>

<?php wp_footer(); ?>
</body>
</html>
