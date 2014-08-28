<?php
/*
Template Name: Children - Masonry
*/
if(!is_home()){get_header();}//get html header
$current_id=$post->ID;
?>
<div class="row">
	<div class="col-md-9">
		<div class="row">
			<div class="col-md-12 content_container">
				<?php
					//parent page
					$intro_content=new WP_Query( 'page_id='.$post->ID );
					while($intro_content->have_posts())
					{
						$intro_content->the_post();
						the_title('<h2>','</h2>');
						if(has_post_thumbnail()){the_post_thumbnail('full', array( 'class' => 'header_image' ));}
						if(has_excerpt()){the_excerpt();}
						if('' !== $post->post_content ) { the_content();}
					}
					wp_reset_postdata();
				?>
			</div><!--//end content_container-->
		</div>
		<div class="row">
		<?php
			//child pages
			$args=array('post_parent' => $current_id, 'post_type' => 'page');
			$ms_content=new WP_Query($args );

			echo '<div id="masonry_container" class="col-md-12">';
			while($ms_content->have_posts())
			{
				$ms_content->the_post();
		?>
			<div class="masonry_item">
			<h3><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
		<?php
			
			if(has_post_thumbnail()){the_post_thumbnail('thumbnail', array( 'class' => 'ms_image' ));}
			if(has_excerpt()){the_excerpt();}
		?>	
			</div>
		<?php 
			}
			echo '</div>';
		?>
		</div><!--//end masonry_container-->
	</div>
	
	<div class="col-md-3 side_panel">
		<div class="logo">
			<a href="http://syncxd.com"><img src="<?php  echo get_stylesheet_directory_uri() ?>/images/sync_animated_logo.gif?>"/></a>
		</div><!--//end logo-->&nbsp;
		<?php dynamic_sidebar( 'right-sidebar' ); ?>
	</div><!--//end side_panel-->
</div>
<?
if(!is_home()){get_footer();}//get html footer
?>