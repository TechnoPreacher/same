<?php   get_header(); ?>
<h1>TAXONOMY</h1>

<?php


global $project_cat;

$args = [
	'posts_per_page'         => -1,
	'post_type'              => 'project',

	'tax_query'              => [
		[
			'taxonomy' => 'project_cat',
			'field'    => 'slug',
			'terms'    => $project_cat,
		],
	],
];




$my_query = new WP_Query( $args );
?> '<ul class="menu categories page_text">' <?php

if($my_query->have_posts()) :
	while ($my_query->have_posts()) : $my_query->the_post();

        ?> <p> <?= get_permalink() ?>  </p>
    <?php
		// do what you want to do with the queried posts

	endwhile;
	wp_reset_postdata();
endif;

    ?> </ul>




<?php get_footer(); ?>
