<?php get_header(); ?>
<section>
	<?php
	if(have_posts()):
		while(have_posts()):
			the_post();
	?>
	<article>
	<div class="post-cats"><?php the_category(); ?></div>
	<?php the_post_thumbnail(); ?>
		<h2><?php the_title(); ?></h2>
		<div class="post-meta"><?php the_author(); ?>, Posted On <?php the_date(); ?></div>
		<p><?php the_excerpt(); ?></p>
		<a href="<?php the_permalink(); ?>">Read More</a>
	</article>
	<hr>
	<?php
		endwhile;
	previous_posts_link();
	next_posts_link();
	else:
		echo 'No Posts Found';
	endif;
	?>
</section>
<?php get_footer(); ?>