<?php
/*
Template Name: same_blog
*/

?>

<?php   get_header(); ?>
		<!-- BEGIN TITLEBAR -->

		<!-- END TITLEBAR -->

		<!-- BEGIN CONTENT -->
		<section id="content">

			<div class="wrapper page_text">
				<h1 class="page_title">Blog</h1>
				<div class="breadcrumbs">
					<div class="inside">
						<a href="<?=home_url()?>" class="first"><span>The Same</span></a>
						<a href="<?=get_permalink( get_the_ID() )?>" class="last"><span>Blog</span></a>
					</div>
				</div>

				<div class="columns">

					<div class="column column75">
                        <?php //тут надо вытащить два поста и оформить их по стилю
                        do_action( 'postforpage', [2] );
                        ?>
					</div>

					<div class="column column25">
						<div class="padd16bot">
							<h1>Search</h1>
							<form class="searchbar">
							<fieldset>
								<div>
									<span class="input_text"><input type="text" class="clearinput" value="Search..." /></span>
									<button type="button" class="input_submit"><span>Search</span></button>
								</div>
							</fieldset>
							</form>
						</div>

						<div class="padd16bot">
							<h1>RecentPosts</h1>
							<?php do_action('posts', [3] ); ?>
						</div>

						<div class="padd16bot">
							<h1>About Us</h1>
							<?php do_action( 'aboutus' ); ?>
							</div>

						<div class="padd16bot">
							<h1>Categories</h1>
							<ul class="menu categories page_text">
								<?php do_action( 'projects_in_footer_all_in_li_tag' ); ?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- END CONTENT -->
	</div>
	</div>

		<?php get_footer(); ?>