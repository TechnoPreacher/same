<?php
/*
Template Name: same_project
*/
?>

<?php   get_header(); ?>

<h1>SINGLE-PROJECT</h1>>

<!-- BEGIN STYLESHEET SWITCHER -->
<div id="stylesheet_switcher">
	<a href="#" id="switcher"></a>
	<ul id="stylesheets">
		<li>
			<a href="#" class="sheet" id="light">
				<span class="image"><img src="./gfx/stylesheet_light.jpg" alt="" /></span>
				<span class="mask"></span>
				<span class="name">Light version</span>
			</a>
		</li>
		<li>
			<a href="#" class="sheet" id="dark">
				<span class="image"><img src="./gfx/stylesheet_dark.jpg" alt="" /></span>
				<span class="mask"></span>
				<span class="name">Dark version</span>
			</a>
		</li>
	</ul>
</div>
<!-- END STYLESHEET SWITCHER -->

<!-- BEGIN PAGE -->
<div id="page">
	<div id="page_top">
		<div id="page_top_in">
			<!-- BEGIN TITLEBAR -->
			<header id="titlebar">
				<div class="wrapper">
					<a id="logo" href="#"><span></span></a>
					<div id="titlebar_right">
						<ul id="social_icons">
							<li><a href="#" class="linkedin"></a></li>
							<li><a href="#" class="facebook"></a></li>
							<li><a href="#" class="twitter"></a></li>
							<li><a href="#" class="rss"></a></li>
						</ul>
						<div class="clear"></div>

						<nav>
							<ul id="top_menu">
								<li><a href="./index.htm.html">Home</a></li>
								<li><a href="./aboutus.htm.html">About Us</a></li>
								<li><a href="./blog.htm.html">Blog</a></li>
								<li>
									<a href="#">Other</a>
									<div class="submenu">
										<ul>
											<li><a href="./blog-article.htm.html"><span>Single Blog</span></a></li>
											<li><a href="./shortcodes-columns.htm.html"><span>Columns</span></a></li>
											<li><a href="./shortcodes-elements.htm.html"><span>Elemantary</span></a></li>
											<li><a href="./shortcodes-boxes.htm.html"><span>Boxes</span></a></li>
											<li><a href="./shortcodes-typography.htm.html"><span>Typography</span></a></li>
										</ul>
									</div>
								</li>
								<li>
									<a href="./portfolio-single.htm.html">Portfolio</a>
									<div class="submenu">
										<ul>
											<li><a href="./portfolio.htm.html#all"><span>All categories</span></a></li>
											<li><a href="./portfolio.htm.html#photography"><span>Photography</span></a></li>
											<li><a href="./portfolio.htm.html#webdesign"><span>Webdesign</span></a></li>
											<li><a href="./portfolio.htm.html#branding"><span>Branding</span></a></li>
										</ul>
									</div>
								</li>
								<li><a href="./gallery.htm.html">Gallery</a></li>
								<li><a href="./contact.htm.html">Contact</a></li>
							</ul>
						</nav>
					</div>
					<div class="clear"></div>
				</div>
			</header>
			<!-- END TITLEBAR -->

			<!-- BEGIN CONTENT -->
			<section id="content">
				<div class="wrapper page_text">
					<h1 class="page_title">Project Title</h1>
					<div class="breadcrumbs">
						<div class="inside">
							<a href="#" class="first"><span>The Same</span></a>
							<a href="#"><span>Portfolio</span></a>
							<a href="#" class="last"><span>Project T.</span></a>
						</div>
					</div>

					<div class="columns">
						<div class="column column33">
							<h1>Photo Title</h1>
							<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Egestas, justo nec scelerisque urna quis turpis et netus et odio. In mollis, orci id leo lobortis cursus ante. Vivamus vel eros quis enim. Phasellus fermentum eget, pede. Etiam at eros. Sed ornare laoreet. Morbi et turpis. Duis vulputate tortor eget luctus et dui. Morbi id eros.</p>
							<h1>Client:</h1>
							<p>BigCompany S.A.</p>
							<h1>Model & Photographer:</h1>
							<p><a href="#">Jessica Parker</a> // Jo-Who Shan</p>
						</div>

						<div class="column column66">
							<div id="content_slide">
								<div class="flexslider">
									<ul class="slides">
										<li><a href="./gfx/examples/img_big3.jpg" class="lightbox" data-rel="prettyPhoto[gallery]"><img src="./gfx/examples/content_slide606x480.jpg" alt="1" /></a></li>
										<li><a href="./gfx/examples/img_big2.jpg" class="lightbox" data-rel="prettyPhoto[gallery]"><img src="./gfx/examples/content_slide606x480_2.jpg" alt="2" /></a></li>
										<li><a href="./gfx/examples/img_big5.jpg" class="lightbox" data-rel="prettyPhoto[gallery]"><img src="./gfx/examples/content_slide606x480_3.jpg" alt="3" /></a></li>
										<li><a href="./gfx/examples/img_big6.jpg" class="lightbox" data-rel="prettyPhoto[gallery]"><img src="./gfx/examples/content_slide606x480_4.jpg" alt="4" /></a></li>
										<li><a href="./gfx/examples/img_big8.jpg" class="lightbox" data-rel="prettyPhoto[gallery]"><img src="./gfx/examples/content_slide606x480_5.jpg" alt="5" /></a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- END CONTENT -->
		</div>
	</div>

	<div id="page_bottom">
		<!-- BEGIN ABOVE_FOOTER -->
		<section id="above_footer">
			<div class="wrapper above_footer_boxes page_text">
				<div class="box first">
					<h3>About Us</h3>
					<p>Suspendisse in faucibus lorem, pretium quis, <a href="#">lacinia aliquet</a> enim sapien et lacus tellus quis consectetuer nisl.</p>
					<p>Vestibulum tempus. Pellentesque sagittis, nunc eu odio. Suspendisse turpis at ipsum. Pellentesque placerat. Vivamus vulputate luctus.</p>
				</div>

				<div class="box second">
					<h3>Recent Posts</h3>
					<ul class="recent_posts">
						<li class="item">
							<a class="thumbnail" href="#"><img alt="" src="./gfx/examples/above_footer_recent_posts1.jpg"></a>
							<div class="text">
								<h4 class="title"><a href="#">Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</a></h4>
								<p class="data">
									<span class="date">21/10/2011</span>
								</p>
							</div>
						</li>
						<li class="item">
							<a class="thumbnail" href="#"><img alt="" src="./gfx/examples/above_footer_recent_posts2.jpg"></a>
							<div class="text">
								<h4 class="title"><a href="#">Cras vitae est lacus vehicula enim ac turpis at tellus.</a></h4>
								<p class="data">
									<span class="date">21/10/2011</span>
								</p>
							</div>
						</li>
						<li class="item">
							<a class="thumbnail" href="#"><img alt="" src="./gfx/examples/above_footer_recent_posts3.jpg"></a>
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
						<li><a href="#">Webdesign (8)</a></li>
						<li>
							<a href="#">Branding (12)</a>
							<ul>
								<li><a href="#">Photography (45)</a></li>
							</ul>
						</li>
						<li><a href="#">Photomanipulation (5)</a></li>
						<li><a href="#">3D (1)</a></li>
						<li><a href="#">Others (7)</a></li>
					</ul>
				</div>

				<div class="box fourth">
					<h3>Contact Us</h3>
					<ul class="list_contact page_text">
						<li class="phone">+41 987 654 321<br />(011) 123 32 23</li>
						<li class="email"><a href="#">contact@thesame.com</a></li>
						<li class="address">King Street 4/30<br />12-345 City</li>
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
</div>

</body>
</html>

