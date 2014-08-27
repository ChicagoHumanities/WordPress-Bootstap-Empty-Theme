
/**
* 
*
**/

( function( $ ) 
{
	$(document).ready(function()
	{
		
		//Facebook javascript sdk----------------------------
		(function(d, s, id) {
		  var js, fjs = d.getElementsByTagName(s)[0];
		  if (d.getElementById(id)) return;
		  js = d.createElement(s); js.id = id;
		  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&appId=655845367856572&version=v2.0";
		  fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));
		
		// MASONRY layout for pages and categories
		var container = jQuery('#masonry_container');
		var msnry = container.data('masonry');
		var masonry_layout = new Masonry( container, {
		  itemSelector: '.masonry-item',
		  columnWidth: '.masonry-item',                
		});  
		
		
		jQuery(window).on("load resize", function()
		{
			//normailize  container width	
			jQuery( '#masonry_container' ).css( 'width', 'auto');
			var gutter=30;
			var original_container_width=jQuery('#masonry_container').width()-gutter;
			
			//determine column widths
			var item_width;		
			var item_max_width_pct=100/100;
			var container_width=item_max_width_pct*original_container_width;
	 		var item_min_width_pct=25/100;
			var min_pixel_width=225;
			var max_items_per_row=Math.floor(item_max_width_pct/item_min_width_pct);
			var item_count=$("#masonry_container > div.masonry_item").length;
			var item_counter=0;
			
			jQuery('.masonry_item').each(function()
			{
				item_counter++;
				if(item_count<=max_items_per_row || item_counter==item_count)
				{
					item_width=((item_count%max_items_per_row)*(item_min_width_pct))*container_width;
				}
				else if(item_count%max_items_per_row==1)
				{
					item_width=container_width;
				}
				else
				{
					item_width=(item_min_width_pct)*container_width;
				}
				 
				if(item_width==0)
				{
					item_width=(item_min_width_pct)*container_width;
				}
				else if(item_width<=min_pixel_width)
				{
					item_width=min_pixel_width;
				}
				
				if(container_width<min_pixel_width*2)
				{
					item_width=container_width;
				}
				
				item_width=item_width-gutter;
					
				jQuery(this).width(item_width);
			});
		});
		
		//adjust height of .content--------------------------
		//$('.content_container').height($(window).height());
		//$(window).resize(function() {
  		//	$('.content_container').height($(window).height());
		//});
		
		//make child div match the height of parent-----------
		
		$('.fix-height').each(function()
		{
			$this_height=$(this).height();
			$parent_height=$(this).parent().height();
			if($this_height<$parent_height)
			{
				$(this).height($(this).parent().height());
			}		
		});//end fix-height------------------------------------	
		
		//change style of sync:XD and sync:
		$('div:contains("sync:XD")', document.body).each(function()
		{
  			$(this).html($(this).html().replace('sync:XD', '<span style="font-variant:small-caps;">sync:XD</span>'));
		});
		$('div:contains("sync:")', document.body).each(function()
		{
  			$(this).html($(this).html().replace('sync:', '<span style="font-variant:small-caps;">sync:</span>'));
		});//end change sync:XD style--------------------------
		
		//carousel and all gifs
		
		$('img[src*=".gif"]').each(function()
		{
			$(this).prop('src',$(this).prop('src')+'?'+Math.random());
		});
		
	});//document ready
})( jQuery );