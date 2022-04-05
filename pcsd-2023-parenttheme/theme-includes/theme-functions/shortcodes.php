<?php
//Display Modified Date [modified-date]
function modifiedDate_func(){
    ?>
     <p class="lastmodified"><em>Last modified: <?php the_modified_date(); ?></em></p>
    <?php
}
add_shortcode( 'modified-date', 'modifiedDate_func' );
//[directory url=""]

function directory_func($atts) {
	$category = shortcode_atts( array(
		'url' => 'something',
		//'bar' => 'something else',
	), $atts );
	$directory_url = "{$category['url']}";
	return file_get_contents($directory_url);
}
add_shortcode( 'directory', 'directory_func' );
?>
