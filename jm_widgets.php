<?php
	class ES_Recent_Posts extends WP_Widget {
		public function ES_Recent_Posts(){
			//Widget Settings
			
			$widget_ops = array(
			'classname' => 'es_recent_posts',
			'description' => 'Talk about it'
			);
			
			// Widget Control window settings
			$control_ops = array(
				'width' => 400,
				'height' => 500,
				'id_base' => 'es_recent_posts'
			);
			
			//Create your widget
			$this->WP_Widget('es_recent_posts', 'My Recent Posts', $widget_ops, $control_ops);
		}
		
		//What shows on the site template
		public function widget($args, $instance) {
			extract($args);
			echo $before_widget;
			?>
			
			<h3><?=$instance['title']?></h3>
			<ol>
			<?php $rposts = new WP_Query();
				$rposts->query('posts_per_page='.$instance['num_posts']);
			if($rposts->have_posts()):
			while($rposts->have_posts()):
			$rposts->the_post(); ?>
				<li>
					<article>
					<?php if($instance['thumb'] == 'true'){ the_post_thumbnail('thumbnail'); } ?>
						
						<p>
						<?php
			if($instance['desc'] > 0){
							$content = explode(" ",strip_tags(get_the_title())); 
							$shorted = implode(" ", array_splice($content,0,$instance['desc']));
			
							echo $shorted."..."; 
			}?>
						<br><a href="<?php the_permalink(); ?>">Read More</a></p>
					</article>
				</li>
			<?php
			endwhile;
			endif;
			wp_reset_postdata();
			?>
			</ol>
			
			<?php
			echo $after_widget;
		}
		//What shows in the backend to edit the widget.
		public function form($instance){
			$defaults = array(
				'title' => 'ES Recent Posts',
				'thumb' => true,
				'desc' => 10,
				'num_posts' => 3
			);
			$instance = wp_parse_args((array) $instance, $defaults);
			?>
			<p>
				<label for="<?=$this->get_field_id('title')?>">Title:</label>
				<input type="text" name="<?=$this->get_field_name('title')?>" id="<?=$this->get_field_id('title')?>" value="<?=$instance['title']?>">
			</p>
			<p>
				<label for="<?=$this->get_field_id('thumb')?>">Show Thumbnail:</label>
				<input type="checkbox" name="<?=$this->get_field_name('thumb')?>" id="<?=$this->get_field_id('thumb')?>" value="<?=$instance['thumb']?>" 
				<?php if($instance['thumb'] == 'true'){ ?>
				checked
				<?php } ?>
				>
			</p>
			<p>
				<label for="<?=$this->get_field_id('desc')?>">Description:</label>
				<input type="number" min="0" max="30" name="<?=$this->get_field_name('desc')?>" id="<?=$this->get_field_id('desc')?>" value="<?=$instance['desc']?>"><br>
				<small style="opacity:0.5">Set to 0 for no description.</small>
			</p>
			<p>
				<label for="<?=$this->get_field_id('num_posts')?>">Title:</label>
				<input type="number" min="1" max="10" name="<?=$this->get_field_name('num_posts')?>" id="<?=$this->get_field_id('num_posts')?>" value="<?=$instance['num_posts']?>">
			</p>
			<?php
		}
		
		//Save your changes from the backend to the database.
		public function update($new_instance, $old_instance) {
			$instance = $old_instance;
			$instance['title'] = $new_instance['title'];
			$instance['thumb'] = $new_instance['thumb'];
			$instance['desc'] = $new_instance['desc'];
			$instance['num_posts'] = $new_instance['num_posts'];
			return $instance;
		}
	}
register_widget('ES_Recent_Posts');
?>