<?php
/*
Template Name: Children - Featured
*/

if(!is_home()){get_header();}
$current=$post->ID;
$args = array('post_parent' => $post->ID,'orderby'=>'menu_order','order'=> 'ASC');
$features=get_children($args);
$feature_count=count($features);

$column_counter=0;

if(!is_home())
{
?>
<div class="row">
	<div class="col-md-9 content_container">
		<div class="row">
			<div class="col-md-12">
				<div class="intro">
					<?php the_title('<h1>',':</h1>'); ?>
					<?php echo (has_excerpt()) ? '<div class="teaser">'.get_the_excerpt().'</div>' : ''; ?>
				</div><!--//end intro-->
			</div><!--//end col-md-12-->
		</div>
		
		<div class="row">
			<div class="col-md-4 features">
				<?php
					if($feature_count>0)
					{
						foreach($features as $feature)
						{
							echo '<div class="feature_container gradient_brown no_border">';
								echo '<h3>'.get_the_title( $feature->ID ).'</h3>';
								echo (has_post_thumbnail($feature->ID)) ? get_the_post_thumbnail($feature->ID,'medium',array( 'class' => 'featured_image' )) : '';
								echo (has_excerpt($feature->ID)) ? '<a class="pull-right" href="'.get_permalink($feature->ID).'"><span style="color:#59514b" class="glyphicon glyphicon-circle-arrow-right"></span></a>'.$feature->post_excerpt : ''; 
							echo '</div>';//end feature_container
						}
					}
				?>
			</div><!--//end features-->
			<div class="col-md-8"><div class="post_content"><?php echo $post->post_content;?></div><!--//end post_content--></div><!--//end col-md-8-->
		</div>
	</div><!--//end content_container-->
	
	<div class="col-md-3 side_panel">
		<div class="logo">
			<a href="http://syncxd.com"><img src="<?php  echo get_stylesheet_directory_uri() ?>/images/sync_animated_logo.gif?>"/></a>
		</div><!--//end logo-->&nbsp;
		<?php dynamic_sidebar( 'right-sidebar' ); ?>
	</div><!--//end side_panel-->
</div>

<?php
}else
	{
		echo '<div class="row loader">';
		while($column_counter<=$feature_count)
		{
			if($column_counter==0)
			{
				switch($feature_count+1)
				{
					case 1:
						echo '<div class="col-md-12">';
						break;
					case 2:
						echo '<div class="col-md-6">';
						break;
					case 3:
						echo '<div class="col-md-4">';
						break;
					default:
						echo '<div class="col-md-3">';
				}
				echo '<div class="feature_container no_border">';
				the_title('<h2><a href="'.get_permalink().'">','</a></h2>');
				(has_excerpt()) ? the_excerpt() : '';
				echo '</div>';//end post-content_container no_border
				echo '</div>';//end col-md
				$column_counter++;
			}
				
					if($column_counter>0 && $feature_count>0)
					{
						
						foreach($features as $feature)
						{
							switch($feature_count+1)
							{
								case 1:
									echo '<div class="col-md-12">';
									$thumbnail_size='full';
									break;
								case 2:
									echo '<div class="col-md-6">';
									$thumbnail_size='large';
									break;
								case 3:
									echo '<div class="col-md-4">';
									$thumbnail_size='medium';
									break;
								default:
									echo '<div class="col-md-3">';
									$thumbnail_size='thumbnail';
							}
							echo '<div class="feature_container">';
							echo '<h3><a href="'.get_permalink($feature->ID).'">'.get_the_title( $feature->ID ).'</a></h3>';
							echo (has_post_thumbnail($feature->ID)) ? get_the_post_thumbnail($feature->ID,$thumbnail_size,array( 'class' => 'featured' )) : '';
							echo (has_excerpt($feature->ID)) ? '<a class="pull-right" href="'.get_permalink($feature->ID).'"><span class="glyphicon glyphicon-circle-arrow-right"></span></a>'.$feature->post_excerpt : ''; 
							echo '</div>';//end post-content_container no_border
							echo '</div>';//end col-md
							$column_counter++;	
						}
					}
				
		}
		echo '</div>';//end row loader
	}

if(!is_home()){get_footer();}

?>