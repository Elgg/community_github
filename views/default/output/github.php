<?php
/**
 * Display link to github account
 */

$link = "https://github.com/{$vars['value']}";

echo elgg_view('output/url', array(
	'text' => $link,
	'href' => $link,
));