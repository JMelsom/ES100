<?php get_header(); ?>
<section>
<div role="slideshow">
<?php
	$slides = new WP_Query();
	$slides->query('post_type=slideshow');
if($slides->have_posts()):

?>
<ul class="slides">
<?php 
$i = 1;
while($slides->have_posts()):
$slides->the_post();
?>
<li class="slide" id="slide<?=$i?>">
	<figure>
		<?php the_post_thumbnail('large'); ?>
		<figcaption><h2><?php the_title(); ?></h2></figcaption>
	</figure>
</li>
<?php
$i++;
endwhile;
?>
</ul>
<?php 
endif;
?>
</div>

<div class="rel-posts-container">
<h1>Latest Posts</h1>
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
			<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a>
		</div>
		<div class="related-info">
			<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
			<?php 
			echo implode(' ', array_splice(explode(' ', get_the_excerpt()),0, 20));

;
			?>
		</div>
	</div>
	<?php
endwhile;
endif; ?>
	</div>
	<hr>
	<?php 
$blog = new WP_Query();
$blog->query('posts_per_page=3&ignore_sticky_posts=true');
if($blog->have_posts()): 
while($blog->have_posts()): 
$blog->the_post(); ?>
	<article class="archive-post">
		<div class="archive-info">
			<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
			<p>Date Posted:
				<?php the_date(); ?>
			</p>
			<p>
				<?php the_author(); ?>|
				<a href="category-link">
					<?php the_category( '|'); ?>
				</a>
			</p>
		</div>
		<div class="archive-thumb"><?php the_post_thumbnail('medium'); ?></div>
		<div class="archive-excerpt">
			<?php the_excerpt(); ?>
			<a href="<?php the_permalink(); ?>">Read More...</a>
		</div>
	</article>
	<hr>
	<?php endwhile;
else: echo 'Sorry, no posts found';
endif; ?>
</section>
<?php get_footer(); ?>