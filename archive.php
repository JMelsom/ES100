<?php get_header(); ?>
<section>
	<h1>Archive</h1>
	<h1><?php wp_title(); ?></h1>
	<div class="navigation">
	<hr>
	<?php
	if(have_posts()):
	while(have_posts()):
	the_post();
	?>
	<article class="archive-post">
	<div class="archive-info">
	<h3><?php the_title(); ?></h3><p>Date Posted: <?php the_date(); ?></p>
	<p><?php the_author(); ?> | <a href="category-link"><?php the_category('|'); ?></a></p>
		</div>
		<div class="archive-thumb"><?php the_post_thumbnail('medium'); ?></div>
		<div class="archive-excerpt">
			<?php the_excerpt(); ?>
			<a href="<?php the_permalink(); ?>">Read More...</a>
		</div>
	</article>
	<hr>
	<?php
	endwhile;
	else:
		echo 'Sorry, no posts found';
	endif;
	?>
</section>
<?php get_footer(); ?>