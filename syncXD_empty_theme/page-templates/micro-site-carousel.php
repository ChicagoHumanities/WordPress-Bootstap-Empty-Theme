<?php
/*
Template Name: Children - Carousel
*/

if(!is_home()){get_header();}//get html header

/*--Note: the first slide is the parent slide. Remaining slide are either child pages or child categories.
* The parent slide sets the template. Use Carousel settings within the editor for the parent and child
pages or categories to manipulate this template--*/

$current_id=$post->ID;
$first_slide=new WP_Query( 'page_id='.$post->ID );

echo '<div id="slideshow_'.$current_id.'" class="carousel slide" data-ride="carousel" data-interval="8000">';
while($first_slide->have_posts())
{
	$first_slide->the_post(); 

  // Wrapper for first slide
  echo '<div class="carousel-inner">';
    echo '<div id="'.$current_id->post_name.'" class="item active">';
    
    if ( has_post_thumbnail() ) //slide image
    {
		the_post_thumbnail('full', array( 'class' => 'slideshow' ));
	}else 
		{
			echo '<img class="slidshow" src="' . get_bloginfo( 'stylesheet_directory' ) . '/images/blank.png" />';
		}
	
	if(simple_fields_value("show_title")=='1')
	{
		echo '<div class="carousel-title">'.get_the_title().'</div>';
	}
	if(has_excerpt()) //slide caption
	{
		echo '<div class="carousel-caption">';
        the_excerpt();
      	echo '</div>';
	}	

    echo '</div>';	
}

wp_reset_postdata();

  //Wrapper for remaining slides
  $args=array('post_parent' => $current_id, 'post_type' => 'page');
  $slides=new WP_Query($args);
  while($slides->have_posts())
  {
  	$slides->the_post();
  	echo '<div id="'.$slide->post_name.'" class="item">';
		if ( has_post_thumbnail() ) //slide image
	    {
			the_post_thumbnail('full', array( 'class' => 'slideshow' ));
		}else 
			{
				echo '<img class="slideshow" src="' . get_bloginfo( 'stylesheet_directory' ) . '/images/blank.png" />';
			}
	
		if(simple_fields_value("show_title")=='1')
		{
			echo '<div class="carousel-title">'.get_the_title().'</div>';
		}
		if(has_excerpt()) //slide caption
		{
			echo '<div class="carousel-caption">';
	        the_excerpt();
	      	echo '</div>';
		}
	    echo '</div>';
  }
  
  echo '</div>';
  wp_reset_postdata();
  
  //-- Controls -->
  
  	$slide_counter=0;
	$indicators=new WP_Query($args);
	  
	  //left control------
	  if($indicators->have_posts())
	  {
		  echo '<div style="display:inline;white-space:nowrap;margin:0 12px;">';
		  echo '<a class="left carousel-control" href="#slideshow_'.$current_id.'" role="button" data-slide="prev">';
		    echo '<span class="glyphicon glyphicon-chevron-left"></span>';
		  echo '</a></div>';
	  }
	  
	  //indictors
	  echo '<ol class="carousel-indicators">';
		    echo '<li data-target="#'.$current_id->post_name.'" data-slide-to="'.$slide_counter.'" class="active"></li>';
	  while($indicators->have_posts())
	  {
	  	$indicators->the_post();
	  	$slide_counter++;
		echo '	<li data-target="#'.$indicators->post_name.'" data-slide-to="'.$slide_counter.'"></li>';
	  	
	  }
	  echo '</ol>';
	  
	  //right control------
	  if($indicators->have_posts())
	  {
	    echo '<div style="display:inline;white-space:nowrap;margin:0 12px;">';
	    echo '<a class="right carousel-control" href="#slideshow_'.$current_id->ID.'" role="button" data-slide="next">';
		    echo '<span class="glyphicon glyphicon-chevron-right"></span>';
		echo '</a></div>';
	  }
	
echo '</div>';

if(!is_home()){get_footer();}//get html footer
?>