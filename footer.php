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
                <h3>About Us</h3>
				<?php the_field( 'aboutus', MAIN_PAGE_ID );?>
            </div>

            <div class="box second">
                <h3>Recent Posts</h3>
				<?php do_action( 'posts', [ 3 ] ); ?>
            </div>


            <div class="box third">
                <h3>Categories</h3>

				<?php do_action( 'projects_in_footer_all_in_li_tag' ); ?>

            </div>

            <div class="box fourth">
                <h3>Contact Us</h3>
				<?php the_field( 'contactus', MAIN_PAGE_ID ); ?>
            </div>
        </div>
    </section>
    <!-- END ABOVE_FOOTER -->

    <!-- BEGIN FOOTER -->
    <footer id="footer">
        <div class="wrapper">
            <p class="copyrights"><?= get_field('copyright_for_footer',MAIN_PAGE_ID)?></p>
            <a href="#page" class="up">
                <span class="arrow"></span>
                <span class="text">top</span>
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