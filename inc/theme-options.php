<?php
function industrious_integrated_vc(){
	vc_map(array(
		'name' => __('First Section','industrious'),
		'description' => 'Theme First Sectin With Video Background',
		'base' => 'section_1_base',
		'category' => 'Industrious',
		'icon' => '/images/favicon.ico',
		'params' => array(
			array(
				'param_name' => 'video',
				'type' => 'video',
				'heading' => 'Add Image',
			)
		),
	));
}
add_action('vc_before_init','industrious_integrated_vc');
?>