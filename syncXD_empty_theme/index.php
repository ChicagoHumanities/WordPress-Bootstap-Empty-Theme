<?php
/**
 * The main template file
 * Author:Shon L. Burns
 * Author URI: http://syncxd.com
 */

get_header();//start html header 
?>
<div class="container-fluid">
	<?php get_template_part('page_header');?>
	<div class="row body_content">
  	<div class="col-md-12">
 <?php
 /**********************
  * Refer to http://getbootstrap.com/css/ for info on configuring the grid system columns.
  * 
  * In addition to the Loop, you can use dyanamic sidebars or the function insert_module([post_id]) to add pages or categories 
  * as modular content within grid columns.
  * 
  * Using insert_module([post_id]): The selected page or category template will loop through posts and nest the related 
  * bootstrap grid and component functionality.
  * 
  * Available templates: (Children refers to the rendering of child pages and sub-category posts)
  * - Body Only
  * - Children: Accordian
  * - Children: Aside
  * - Children: Carousel (slideshow)
  * - Children: Featured
  * - Children: Masonry
  * - Children: Tabs - horizontal
  * - Children: Tabs - vertical
  * - Default
  * - Modal
  * 
  * Update css/skin.css to stylize themplates.
  * 
  **********************/ 
 ?>
    </div><!--//end col-md-12-->
 	</div><!--//end row body_content--> 
</div><!--//end container-->

<?php
get_footer();//end html header
?>
