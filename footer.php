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
				<?php do_action( 'aboutus' ); ?>
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
				<?php do_action( 'contactus' ); ?>
            </div>
        </div>
    </section>
    <!-- END ABOVE_FOOTER -->

    <!-- BEGIN FOOTER -->
    <footer id="footer">
        <div class="wrapper">
            <p class="copyrights">Copyright &copy; 2012 by TheSame. All rights reserved.</p>
            <a href="#page" class="up">
                <span class="arrow"></span>
                <span class="text">top</span>
            </a>
        </div>
    </footer>
    <!-- END FOOTER -->
</div>


</div>

<?php wp_footer(); ?>
</body>
</html>