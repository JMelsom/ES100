<?php get_header(); ?>
<section>
<div class="error-page">
<figure>
<img src="<?php bloginfo('template_url'); ?>/images/404.jpg">
<figcaption><h1>404</h1>
<h1>Error</h1>
<p>Are you lost? Look below for suggestions.</p></figcaption>
	</figure>
		<hr>
		<h1>Are any of these what you were looking for?</h1>
	<div class="rel-posts-container">
<?php
$thumbs = array(
            'posts_per_page' => 3,
            'meta_query' => array(array('key' => '_thumbnail_id'
			)),
			'ignore_sticky_posts' => 1
);
$latest = new WP_Query($thumbs);
if($latest->have_posts()):
while($latest->have_posts()):
$latest->the_post();
?>
	<div class="related-post">
		<div class="related-thumb">
			<?php the_post_thumbnail('thumbnail'); ?>
		</div>
		<div class="related-info">
			<h3><?php the_title(); ?></h3>
			<?php 
			echo implode(' ', array_splice(explode(' ', get_the_excerpt()),0, 20));

;
			?>
		</div>
	</div>
	<?php
endwhile;
endif;
?>
	</div>
	</div>
</section>
<?php get_footer(); ?>