<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 */
 
 if(!is_home()){get_header();}
 
 ?>
 <div class="row">
	<div class="intro">
		<div class="col-md-9 post-content">
			<?php the_title('<h1>',':</h1>');?>
			<?php echo (has_excerpt()) ? '<div class="teaser">'.get_the_excerpt().'</div>' : ''; ?>
		</div>
	</div>
	<div class="col-md-3 side_panel">
		<div class="logo">
			<a href="http://syncxd.com"><img src="<?php  echo get_stylesheet_directory_uri() ?>/images/sync_animated_logo.gif?>"/></a>
		</div>
	</div>
 </div>
 
 <?php
 if(!is_home()){get_footer();}
?>