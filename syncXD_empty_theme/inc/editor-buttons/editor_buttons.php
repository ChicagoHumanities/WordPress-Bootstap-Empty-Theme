<?php
 
add_action('media_buttons','add_layout_select',11);
function add_layout_select(){
    
    echo '&nbsp;<select id="layout_select" class="thickbox custom_control e_buttons">';
    echo '<option value="">&#9638; Select layout to insert</option>';
    echo '<option value="c-100">&#9638; 1 col: 100%</option>';
    echo '<option value="c-25-75">&#9638; 2 col: 25% - 75%</option>';
    echo '<option value="c-33-66">&#9638; 2 col: 33% - 66%</option>';
    echo '<option value="c-50-50">&#9638; 2 col: 50% - 50%</option>';
    echo '<option value="c-66-33">&#9638; 2 col: 66% - 33%</option>';
    echo '<option value="c-75-25">&#9638; 2 col: 75% - 25%</option>';
    echo '<option value="c-25-25-50">&#9638; 3 col: 25% - 25% - 50%</option>';
    echo '<option value="c-25-50-25">&#9638; 3 col: 25% - 50% - 25%</option>';
    echo '<option value="c-33-33-33">&#9638; 3 col: 33% - 33% - 33%</option>';
    echo '<option value="c-50-25-25">&#9638; 3 col: 50% - 25% - 25%</option>';
    echo '<option value="c-25-25-25-25">&#9638; 4 col: 25% - 25% - 25% - 25%</option>';
    echo '</select>';
}

add_action('admin_head', 'select_js');
function select_js() {
	echo '<script type="text/javascript">
			jQuery(document).ready(function()
			{
				jQuery("#layout_select").show();
				
				//insert wireframes			
				jQuery("#layout_select").change(function()
				{
					if(jQuery(this).val() !="")
					{
						
						
						var confirm_selection = confirm(" You are about to insert a wireframe.\n Make sure your cursor is placed at the insertion point. \n Click \"OK\" to continue.\n Not Ready? Click \"Cancel\".");
						if (confirm_selection == true) 
						{
						    //process insert
						    var selected_layout="";
							var header_text="\n\t\t\t<h3>Header</h3>\n";
							var paragraph_text="\t\t\t<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ullamcorper urna dui, a auctor purus congue ac. Cras odio eros, semper quis nulla eget, vehicula congue nulla. Suspendisse ac velit mattis libero mattis imperdiet. Aenean tristique feugiat justo, nec pulvinar lorem volutpat nec.</p>\n";
							var sample_text=header_text+paragraph_text;
							switch(jQuery(this).val())
							{
								case "c-100":
									selected_layout+="\t\t<div class=\"col-md-12\"><div class=\"post-content\">"+sample_text+"\t\t</div></div></div>\n";
									break;
								case "c-25-75":
									selected_layout+="\t\t<div class=\"col-md-3\"><div class=\"post-content\">"+sample_text+"\t\t</div></div>\n";
									selected_layout+="\t\t<div class=\"col-md-9\"><div class=\"post-content\">"+sample_text+"\t\t</div></div>\n";
									break;
								case "c-33-66":
									selected_layout+="\t\t<div class=\"col-md-4\"><div class=\"post-content\">"+sample_text+"\t\t</div></div>\n";
									selected_layout+="\t\t<div class=\"col-md-8\"><div class=\"post-content\">"+sample_text+"\t\t</div></div>\n";
									break;
								case "c-50-50":
									selected_layout+="\t\t<div class=\"col-md-6\"><div class=\"post-content\">"+sample_text+"\t\t</div></div>\n";
									selected_layout+="\t\t<div class=\"col-md-6\"><div class=\"post-content\">"+sample_text+"\t\t</div></div>\n";
									break;
								case "c-66-33":
									selected_layout+="\t\t<div class=\"col-md-8\"><div class=\"post-content\">"+sample_text+"\t\t</div></div>\n";
									selected_layout+="\t\t<div class=\"col-md-4\"><div class=\"post-content\">"+sample_text+"\t\t</div></div>\n";
									break;
								case "c-75-25":
									selected_layout+="\t\t<div class=\"col-md-9\"><div class=\"post-content\">"+sample_text+"\t\t</div></div>\n";
									selected_layout+="\t\t<div class=\"col-md-3\"><div class=\"post-content\">"+sample_text+"\t\t</div></div>\n";
									break;
								case "c-25-25-50":
									selected_layout+="\t\t<div class=\"col-md-3\"><div class=\"post-content\">"+sample_text+"\t\t</div></div>\n";
									selected_layout+="\t\t<div class=\"col-md-3\"><div class=\"post-content\">"+sample_text+"\t\t</div></div>\n";
									selected_layout+="\t\t<div class=\"col-md-6\"><div class=\"post-content\">"+sample_text+"\t\t</div></div>\n";
									break;
								case "c-25-50-25":
									selected_layout+="\t\t<div class=\"col-md-3\"><div class=\"post-content\">"+sample_text+"\t\t</div></div>\n";
									selected_layout+="\t\t<div class=\"col-md-6\"><div class=\"post-content\">"+sample_text+"\t\t</div></div>\n";
									selected_layout+="\t\t<div class=\"col-md-3\"><div class=\"post-content\">"+sample_text+"\t\t</div></div>\n";
									break;
								case "c-33-33-33":
									selected_layout+="\t\t<div class=\"col-md-4\"><div class=\"post-content\">"+sample_text+"\t\t</div></div>\n";
									selected_layout+="\t\t<div class=\"col-md-4\"><div class=\"post-content\">"+sample_text+"\t\t</div></div>\n";
									selected_layout+="\t\t<div class=\"col-md-4\"><div class=\"post-content\">"+sample_text+"\t\t</div></div>\n";
									break;
								case "c-50-25-25":
									selected_layout+="\t\t<div class=\"col-md-6\"><div class=\"post-content\">"+sample_text+"\t\t</div></div>\n";
									selected_layout+="\t\t<div class=\"col-md-3\"><div class=\"post-content\">"+sample_text+"\t\t</div></div>\n";
									selected_layout+="\t\t<div class=\"col-md-3\"><div class=\"post-content\">"+sample_text+"\t\t</div></div>\n";
									break;
								case "c-25-25-25-25":
									selected_layout+="\t\t<div class=\"col-md-3\"><div class=\"post-content\">"+sample_text+"\t\t</div></div>\n";
									selected_layout+="\t\t<div class=\"col-md-3\"><div class=\"post-content\">"+sample_text+"\t\t</div></div>\n";
									selected_layout+="\t\t<div class=\"col-md-3\"><div class=\"post-content\">"+sample_text+"\t\t</div></div>\n";
									selected_layout+="\t\t<div class=\"col-md-3\"><div class=\"post-content\">"+sample_text+"\t\t</div></div>\n";
									break;
							}//end switch
							
							var insert_layout="\n\t<div class=\"row\">\n";
							insert_layout+=selected_layout;
							insert_layout+="\t</div><!--//end row-->\n<!--//end container (insert new wireframe below this point)-->&nbsp;\n";
							
							send_to_editor(insert_layout);
	        		  		return false;
						} else 
							{
						    	//do nothing
							}
 
					}					
				}); //end #layout_select change
			});//end document ready
			</script>';
}

//shortcode button
add_action('media_buttons','add_sc_select',11);
function add_sc_select(){
    global $shortcode_tags;
     /* ------------------------------------- */
     /* enter names of shortcode to exclude bellow */
     /* ------------------------------------- */
    $exclude = array("wp_caption", "embed","a3_responsive_slider","ninja_forms_field",
    "ninja_forms_sub_date","ninja_forms_field","eo_fullcalendar","nf_sub_seq_num");
    echo '&nbsp;<select id="sc_select" class="e_buttons"><option>[ ] Insert Shortcode</option>';
    foreach ($shortcode_tags as $key => $val){
            if(!in_array($key,$exclude)){
            $shortcodes_list .= '<option value="['.$key.'][/'.$key.']">[ ] '.$key.'</option>';
            }
        }
     echo $shortcodes_list;
     echo '</select>';
}
add_action('admin_head', 'button_js');
function button_js() {
        echo '<script type="text/javascript">
        jQuery(document).ready(function(){
           jQuery("#sc_select").show();
           jQuery("#sc_select").change(function() {
                          send_to_editor(jQuery("#sc_select :selected").val());
                          return false;
                });
        });
        </script>';
}
/*
//tinymce buttons
function make_mce_awesome($in) {

    $in['block_formats'] = 'h2=h2';
    $in['toolbar1']='formatselect,|,bold,italic,|,bullist,numlist,blockquote,|,link,unlink,|,pastetext,undo,redo';
    $in['toolbar2']='';
    $in['toolbar3']='';
    $in['toolbar4']='';

    return $in;
}
add_filter('tiny_mce_before_init', 'make_mce_awesome');
*/
?>