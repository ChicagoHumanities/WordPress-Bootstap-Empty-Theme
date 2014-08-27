/**
 * CHF scripts
 *
 *
 */
 
( function( $ ) {
	$(window).bind('load', function()
	{
		//Change labels ------------------------------------------------------
		$('.wp-submenu li a').each(function()
		{
			if($(this).text()=='Calendar')
			{
				$(this).text('Editorial Calendar');
			}
			
		});//end change labels 
		
		
	});//bind
} )( jQuery ); 