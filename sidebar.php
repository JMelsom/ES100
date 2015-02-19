<aside role="sidebar">
<div class="socialicons">
		<ul>
			<li><a href="https://www.facebook.com/" class="facebook"></a></li>

			<li><a href="http://www.twitter.com/" class="twitter"></a></li>

			<li><a href="http://plus.google.com/" class="gplus"></a></li>

			<li><a href="http://www.linkedin.com/" class="linkedin"></a></li>

		</ul>
	</div>
<nav role="navigation">
<h1 class="blogtitle"><?php bloginfo('title'); ?></h1>
	<div class="logo"><a href="<?php bloginfo('url'); ?>"><img src="<?php bloginfo('template_url'); ?>/images/lambologo.png"></a></div>
	<h3 id="descrip"><?php bloginfo('description'); ?></h3>
	<form method="get" action="<?php bloginfo('url'); ?>">
		<p class="searchbar">
			<input type="search" name="s" value="<?php echo $s; ?>">
			<input type="submit" value="Search">
		</p>
	</form>
		<br>
	<hr>

	<?php
if(function_exists('wp_nav_menu')):
	wp_nav_menu(array(
		'menu' => 'primary_nav',
		'theme_location' => 'primary_nav',
		'container' => '',
		'menu_class' => 'navigation'
	));
else:
?>
		<ul>
			<li><a href="<?php bloginfo('url'); ?>">Home</a></li>
			<?php wp_list_pages('title_li='); ?>
		</ul>
		<?php
endif;
?>

	<?php 
if(!dynamic_sidebar('MySidebar')):
//Put old sidebar code here
?>
<h2>Related Posts</h2>
<?php
	$related = new WP_Query();
	$related->query('posts_per_page=3&category_name=markup');
	if($related->have_posts()):
		while($related->have_posts()):
			$related->the_post();
	?>
	<ul>
		<li>
			<h3><?php the_title() ?></h3>
			<?php the_post_thumbnail('thumbnail'); ?>
			<a href="<?php the_permalink(); ?>">Read More</a>
		</li>
	</ul>
	<?php
			endwhile;
		else:
			echo 'No Related Posts Found';
	endif;
		?>
<?php
endif;

?>
	</nav>
</aside>