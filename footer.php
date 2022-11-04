<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Flash
 */

?>
<div id="page_bottom">
    <!-- BEGIN ABOVE_FOOTER -->
    <section id="above_footer">
        <div class="wrapper above_footer_boxes page_text">
            <div class="box first">
                <h3>About Us</h3>
                <p>Suspendisse in faucibus lorem, pretium quis, <a href="#">lacinia aliquet</a> enim sapien et lacus
                    tellus quis consectetuer nisl.</p>
                <p>Vestibulum tempus. Pellentesque sagittis, nunc eu odio. Suspendisse turpis at ipsum. Pellentesque
                    placerat. Vivamus vulputate luctus.</p>
            </div>

            <div class="box second">
                <h3>Recent Posts</h3>



                <ul class="recent_posts">

	                <?php
	                do_action('posts', [3] );

	                ?>


                    <li class="item">
                        <a class="thumbnail" href="#"><img alt=""
                                                           src="<?php bloginfo('stylesheet_directory');?>/gfx/examples/above_footer_recent_posts3.jpg"></a>
                        <div class="text">
                            <h4 class="title"><a href="#">Quisque quis nibh.</a></h4>
                            <p class="data">
                                <span class="date">21/10/2011</span>
                            </p>
                        </div>
                    </li>
                </ul>
            </div>

            <div class="box third">
                <h3>Categories</h3>
                <ul class="menu categories page_text">
					<?php do_action( 'projects_in_footer_all_in_li_tag' ); ?>
                </ul>
            </div>

            <div class="box fourth">
                <h3>Contact Us</h3>
                <ul class="list_contact page_text">
                    <li class="phone">+41 987 654 321<br/>(011) 123 32 23</li>
                    <li class="email"><a href="#">contact@thesame.com</a></li>
                    <li class="address">King Street 4/30<br/>12-345 City</li>
                </ul>
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
<?php wp_footer(); ?>

</body>
</html>
