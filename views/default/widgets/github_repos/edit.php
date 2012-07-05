<?php
/**
 * User's github repositories widget edit view
 */

// set default value
if (!isset($vars['entity']->num_display)) {
	$vars['entity']->num_display = 4;
}

$params = array(
	'name' => 'params[num_display]',
	'value' => $vars['entity']->num_display,
	'options' => array(1, 2, 3, 4, 5, 10),
);
$dropdown = elgg_view('input/dropdown', $params);

?>
<div>
	<?php echo elgg_echo('community_github:widget:number_to_display'); ?>:
	<?php echo $dropdown; ?>
</div>
