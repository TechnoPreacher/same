<?php
/*
Template Name: same_portfolio
*/
?>


<?php get_header(); ?>

			<!-- BEGIN CONTENT -->
			<section id="content">
				<div class="wrapper page_text">
					<h1 class="page_title">Portfolio</h1>
					<div class="breadcrumbs">
						<div class="inside">
						    <a href="<?=home_url()?>" class="first"><span>+The Same</span></a>
                            <a href="<?=get_permalink( get_the_ID() )?>" class="last"><span>+Portfolio</span></a>
						</div>
					</div>

					<ul id="portfolio_categories" class="portfolio_categories">
						<li class="active segment-0"><a href="#" class="all">All Categories</a></li>
						<li class="segment-1"><a href="#" class="photography">Photography</a></li>
						<li class="segment-2"><a href="#" class="webdesign">Webdesign</a></li>
						<li class="segment-3"><a href="#" class="branding">Branding</a></li>
					</ul>

					<div class="portfolio_items_container">
						<ul class="portfolio_items columns">
							<li data-type="webdesign" data-id="id-1" class="column column33">
								<a href="./gfx/examples/img_big2.jpg" data-rel="prettyPhoto[gallery]" class="portfolio_image lightbox">
									<div class="inside">
										<img alt="" src="./gfx/examples/content_image276x230.jpg">
										<div class="mask"></div>
									</div>
								</a>

								<h1>Photo Title</h1>
								<p>Fusce convallis accumsan, urna eget orci lorem eget augue sed erat. Aenean ut venenatis augue nec pede.</p>
								<a class="button button_small button_orange" href="./portfolio-single.htm.html"><span class="inside">read more</span></a>
							</li>
							<li data-type="branding" data-id="id-2" class="column column33">
								<a href="./gfx/examples/img_big3.jpg" data-rel="prettyPhoto[gallery]" class="portfolio_image lightbox">
									<div class="inside">
										<img alt="" src="./gfx/examples/content_image276x230_2.jpg">
										<div class="mask"></div>
									</div>
								</a>

								<h1>Photo Title</h1>
								<p>Fusce convallis accumsan, urna eget orci lorem eget augue sed erat. Aenean ut venenatis augue nec pede.</p>
								<a class="button button_small button_orange" href="./portfolio-single.htm.html"><span class="inside">read more</span></a>
							</li>
							<li data-type="branding" data-id="id-3" class="column column33">
								<a href="./gfx/examples/img_big7.jpg" data-rel="prettyPhoto[gallery]" class="portfolio_image lightbox">
									<div class="inside">
										<img alt="" src="./gfx/examples/content_image276x230_3.jpg">
										<div class="mask"></div>
									</div>
								</a>

								<h1>Photo Title</h1>
								<p>Fusce convallis accumsan, urna eget orci lorem eget augue sed erat. Aenean ut venenatis augue nec pede.</p>
								<a class="button button_small button_orange" href="./portfolio-single.htm.html"><span class="inside">read more</span></a>
							</li>
							<li data-type="photography" data-id="id-4" class="column column33">
								<a href="./gfx/examples/img_big9.jpg" data-rel="prettyPhoto[gallery]" class="portfolio_image lightbox">
									<div class="inside">
										<img alt="" src="./gfx/examples/content_image276x230_4.jpg">
										<div class="mask"></div>
									</div>
								</a>

								<h1>Photo Title</h1>
								<p>Fusce convallis accumsan, urna eget orci lorem eget augue sed erat. Aenean ut venenatis augue nec pede.</p>
								<a class="button button_small button_orange" href="./portfolio-single.htm.html"><span class="inside">read more</span></a>
							</li>
							<li data-type="branding" data-id="id-5" class="column column33">
								<a href="./gfx/examples/img_big8.jpg" data-rel="prettyPhoto[gallery]" class="portfolio_image lightbox">
									<div class="inside">
										<img alt="" src="./gfx/examples/content_image276x230_5.jpg">
										<div class="mask"></div>
									</div>
								</a>

								<h1>Photo Title</h1>
								<p>Fusce convallis accumsan, urna eget orci lorem eget augue sed erat. Aenean ut venenatis augue nec pede.</p>
								<a class="button button_small button_orange" href="./portfolio-single.htm.html"><span class="inside">read more</span></a>
							</li>
							<li data-type="branding" data-id="id-6" class="column column33">
								<a href="./gfx/examples/img_big4.jpg" data-rel="prettyPhoto[gallery]" class="portfolio_image lightbox">
									<div class="inside">
										<img alt="" src="./gfx/examples/content_image276x230_6.jpg">
										<div class="mask"></div>
									</div>
								</a>

								<h1>Photo Title</h1>
								<p>Fusce convallis accumsan, urna eget orci lorem eget augue sed erat. Aenean ut venenatis augue nec pede.</p>
								<a class="button button_small button_orange" href="./portfolio-single.htm.html"><span class="inside">read more</span></a>
							</li>
						</ul>
					</div>
				</div>
			</section>
			<!-- END CONTENT -->
		</div>
	</div>

<?php get_footer(); ?>