<?php
function industrious_section_1($atts,$content){
	extract(shortcode_atts(array(
		'color' => 'black',
		'size' => '25px',

	),$atts));
	$content = do_shortcode($content);
return "<p style='color:".$color.";font-size:".$size."'>".$content."</p>";
}
add_shortcode('section_1_base','industrious_section_1');

function nested_shortcode($atts,$content){
	extract(shortcode_atts(array(
		'color' => 'black',
		'size' => '25px',

	),$atts));
	$content = do_shortcode($content);
return "<p style='color:".$color.";font-size:".$size."'>".$content."</p>";
}
add_shortcode('academy','nested_shortcode');
add_filter('widget_text','do_shortcode');
?>