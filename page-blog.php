<?php get_header(); ?>
<section>
	<h1>Archive</h1>
	<h1><?php wp_title(); ?></h1>
	<hr>
	<?php 
$blog = new WP_Query();
$blog->query('posts_per_page=50');
if($blog->have_posts()): 
while($blog->have_posts()): 
$blog->the_post(); ?>
	<article class="archive-post">
		<div class="archive-info">
			<h3><?php the_title(); ?></h3>
			<p>Date Posted:
				<?php the_date(); ?>
			</p>
			<p>
				<?php the_author(); ?>|
				<a href="category-link">
					<?php the_category('|'); ?>
				</a>
			</p>
		</div>
		<?php if(has_post_thumbnail()){ ?>
		<div class="archive-thumb"><?php the_post_thumbnail('medium'); ?></div>
		<?php } else { echo "<break></break>";} ?>
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