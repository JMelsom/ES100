<?php get_header(); ?>
<section>
	<h1><div class="breadcrumbs">
    <?php if(function_exists('bcn_display'))
    {
        bcn_display();
    }?>
</div></h1>
	<hr>
	<div class="single-post">
	<?php if(have_posts()):
	while(have_posts()):
	the_post();
?><div class="thepagination">
		<?php previous_post_link('%link', '<div class="prevpag">&laquo Previous Post</div>') ?>
		<?php next_post_link('%link', '<div class="nextpag">Next Post &raquo</div>'); ?>
		</div>
		<div class="single-info">

			<h1><?php the_title(); ?></h1>
			<p>Date Posted: <?php the_date(); ?></p>
			<p>Posted by: <?php the_author(); ?></p>
			<p>
				<?php the_author(); ?>|
				<a href="category-link">
					<?php the_category( '|'); ?>
				</a>
			</p>
		</div>
		<div class="single-thumb">
			<?php if(has_post_thumbnail()){
		the_post_thumbnail('large');
					} ?>
		</div>
		<div class="single-text">
		<?php the_content(); ?>
		</div>
		<div class="thepagination">
		<?php previous_post_link('%link', '<div class="prevpag">&laquo Previous Post</div>') ?>
		<?php next_post_link('%link', '<div class="nextpag">Next Post &raquo</div>'); ?>
		</div>
		<hr>
		<div id="thecomments">
		<?php comments_template(); ?>
		</div>
		<?php endwhile; endif; ?>
	</div>
	<hr>
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
			<?php the_post_thumbnail('thumbnail'); ?>
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
endif;
?>
	</div>
</section>
<?php get_footer(); ?>