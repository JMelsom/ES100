<?php get_header(); ?>
<section>
	<div class="single-post">
	<?php if(have_posts()):
	while(have_posts()):
	the_post();
?>
		<div class="single-info">

			<h1><?php the_title(); ?></h1>
			<p>Posted by: <?php the_author(); ?></p>
		</div>
		<div class="single-thumb">
			<?php if(has_post_thumbnail()){
		the_post_thumbnail('large');
					} ?>
		</div>
		<br>
		<hr>
		<br>
		<div class="single-text">
		<?php the_content(); ?>
		</div>
		<?php endwhile; endif; ?>
	</div>
</section>
<?php get_footer(); ?>