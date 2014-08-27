<?php
/**
 * Plugin Name: Visual Term Description Editor
 * Plugin URI:  https://github.com/bungeshea/visual-term-description-editor
 * Description: Replaces the plain-text term (category, tag) description editor with a WYSIWYG visual editor
 * Author:      Shea Bunge
 * Author URI:  http://bungeshea.com
 * License:     MIT
 * License URI: http://opensource.com/licences/MIT
 * Version:     1.1.1
 */

/* Exit if accessed directly */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Visual_Term_Description_Editor {

	/**
	 * The taxonomies which should use the visual editor
	 *
	 * @since 1.0
	 * @var   array
	 */
	public $taxonomies;

	/**
	 * The constructor function for the class
	 *
	 * @since  1.0
	 * @access public
	 * @param  array $taxonomies The taxonomies which should use a visual editor
	 * @return void
	 */
	public function __construct( $taxonomies ) {

		/* Only users with the "unfiltered_html" capability can use this feature */
		if ( ! current_user_can( 'unfiltered_html' ) )
			return;

		/* Setup the class variables */
		$this->taxonomies = (array) $taxonomies;

		/* Remove the filters which disallow HTML in term descriptions */
		remove_filter( 'pre_term_description', 'wp_filter_kses' );
		remove_filter( 'term_description', 'wp_kses_data' );

		/* Loop through the taxonomies, adding actions */
		foreach ( $this->taxonomies as $taxonomy ) {
			add_action( $taxonomy . '_edit_form_fields', array( $this, 'render_field_edit' ), 1, 2 );
			add_action( $taxonomy . '_add_form_fields', array( $this, 'render_field_add' ), 1, 1 );
		}
	}

	/**
	 * Add the visual editor to the edit tag screen
	 *
	 * @since  1.0
	 * @access public
	 * @param  object $tag      The tag currently being edited
	 * @param  string $taxonomy The taxonomy that the tag belongs to
	 * @return void
	 */
	public function render_field_edit( $tag, $taxonomy ) {

		$settings = array(
			'textarea_name' => 'description',
			'textarea_rows' => 10,
		);

		?>
		<tr class="form-field">
			<th scope="row" valign="top"><label for="description"><?php _ex( 'Description', 'Taxonomy Description' ); ?></label></th>
			<td><?php wp_editor( htmlspecialchars_decode( $tag->description ), 'html-description', $settings ); ?>
			<span class="description"><?php _e( 'The description is not prominent by default, however some themes may show it.' ); ?></span></td>
			<script type="text/javascript">
				// Remove the non-html field
				jQuery( 'textarea#description' ).closest( '.form-field' ).remove();
			</script>
		</tr>
		<?php
	}

	/**
	 * Add the visual editor to the add new tag screen
	 *
	 * @since  1.0
	 * @access public
	 * @param  string $taxonomy The taxonomy that a new tag is being added to
	 * @return void
	 */
	public function render_field_add( $taxonomy ) {

		$settings = array(
			'textarea_name' => 'description',
			'textarea_rows' => 7,
			'teeny'         => false,
			'media_buttons' => true,
		);

		?>
		<div>
			<label for="tag-description"><?php _ex( 'Description', 'Taxonomy Description' ); ?></label>
			<?php wp_editor( '', 'html-tag-description', $settings ); ?>
			<p class="description"><?php _e( 'The description is not prominent by default, however some themes may show it.' ); ?></p>
			<script type="text/javascript">
				// Remove the non-html field
				jQuery( 'textarea#tag-description' ).closest( '.form-field' ).remove();

				jQuery(function() {
					// Trigger save
					jQuery( '#addtag' ).on( 'mousedown', '#submit', function() {
							tinyMCE.triggerSave();
						});
					});

			</script>
		</div>
		<?php
	}

}

/**
 * Instantiates the class to work on all of the registered taxonomies
 *
 * @since  1.0
 * @access public
 * @return void
 */
function visual_term_description_editor() {

	/* Retrieve an array of registered taxonomies */
	$taxonomies = get_taxonomies( '', 'names' );

	/* Initialize the class */
	$GLOBALS['visual-term-description-editor'] = new Visual_Term_Description_Editor( $taxonomies );
}
add_action( 'wp_loaded', 'visual_term_description_editor', 999 );

/**
 * Fix the formatting buttons on the HTML section of
 * the visual editor from being full-width
 *
 * @since  1.1
 * @return void
 */
function fix_visual_term_description_editor_style() {
	echo '<style>.quicktags-toolbar input { width: auto; }</style>';
}

add_action( 'admin_head-edit-tags.php', 'fix_visual_term_description_editor_style' );


//wysiwyg for excerpts
function lb_editor_remove_meta_box() {
    global $post_type;

    // Check to see if the global $post_type variable exists
    // and then check to see if the current post_type supports
    // excerpts. If so, remove the default excerpt meta box
    // provided by the WordPress core. If you would like to only
    // change the excerpt meta box for certain post types replace
    // $post_type with the post_type identifier.
    if (isset($post_type) && post_type_supports($post_type, 'excerpt')) remove_meta_box('postexcerpt', $post_type, 'normal');
}
add_action('admin_menu', 'lb_editor_remove_meta_box');
 
function lb_editor_add_custom_meta_box() {
    global $post_type;
 
    // Again, check to see if the global $post_type variable
    // exists and then if the current post_type supports excerpts.
    // If so, add the new custom excerpt meta box. If you would
    // like to only change the excerpt meta box for certain post
    // types replace $post_type with the post_type identifier.
    if (isset($post_type) && post_type_supports($post_type, 'excerpt')) add_meta_box('postexcerpt', __('Excerpt'), 'lb_editor_custom_post_excerpt_meta_box', $post_type, 'normal', 'high');
}
add_action( 'add_meta_boxes', 'lb_editor_add_custom_meta_box' );
 
function lb_editor_custom_post_excerpt_meta_box( $post ) {
    // Adjust the settings for the new wp_editor. For all
    // available settings view the wp_editor reference
    // http://codex.wordpress.org/Function_Reference/wp_editor
    $settings = array( 'textarea_rows' => '6', 'quicktags' => false, 'tinymce' => true);
 
    // Create the new meta box editor and decode the current
    // post_excerpt value so the TinyMCE editor can display
    // the content as it is styled.
    wp_editor(html_entity_decode(stripcslashes($post->post_excerpt)), 'excerpt', $settings);
 
    // The meta box description - adjust as necessary
    echo '<p><em>Excerpts are optional, hand-crafted, summaries of your content.</em></p>';
}

//required class for adding fields to categories
include_once('Tax-meta-class/Tax-meta-config.php');

?>