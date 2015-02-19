<?php get_header(); ?>
<section>
<h1>Portfolio</h1>
<ul>
	<?php
$eras = get_terms('eras');
foreach($eras as $era){
	echo '<li>';
	echo $era->name;
	echo '</li>';
}


$portfolio = new WP_Query();
	$portfolio->query('post_type=gallery');
	if($portfolio->have_posts()):
		while($portfolio->have_posts()):
			$portfolio->the_post();
	?>
	<li>
		<?php
the_title();

?>
	</li>
	<?php
		endwhile;
	previous_posts_link();
	next_posts_link();
	else:
		echo 'No Posts Found';
	endif;
	?>
</ul>
</section>
<?php get_footer(); ?>