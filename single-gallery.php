<?php get_header(); ?>
<section>
	<?php
	if(have_posts()):
		while(have_posts()):
			the_post();
	?>
	<div class="post-cats"><?php 
		$eras = get_the_terms(get_the_ID(), 'eras');
foreach($eras as $era){
	echo '<a href="';
	echo bloginfo('url');
	echo '/eras/';
	echo $era->slug;
	echo '">';
	echo $era->name;
	echo '</a> ';
}
		?></div>
	<?php the_post_thumbnail(); ?>
		<h1><?php the_title(); ?></h1>
		<div class="post-meta"><?php the_author(); ?>, Posted On <?php the_date(); ?></div>
		<p><?php the_content(); ?></p>
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