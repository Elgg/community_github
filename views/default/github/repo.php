<?php
/**
 * Github repository view
 *
 * @uses $vars['repo']
 */

$name = elgg_view('output/url', array(
	'text' => $vars['repo']->name,
	'href' => $vars['repo']->html_url,
));
$description = $vars['repo']->description;
$update = sprintf(elgg_echo('community_github:update'), elgg_get_friendly_time($vars['repo']->timestamp));
$watchers = elgg_view('output/url', array(
	'text' => $vars['repo']->watchers,
	'href' => $vars['repo']->html_url . '/watchers',
	'title' => elgg_echo('community_github:watchers'),
));
$forks = elgg_view('output/url', array(
	'text' => $vars['repo']->forks,
	'href' => $vars['repo']->html_url . '/network',
	'title' => elgg_echo('community_github:forks'),
));

echo <<<HTML
<ul class="github-stats">
	<li class="github-watchers">$watchers</li>
	<li class="github-forks">$forks</li>
</ul>
<h3>$name</h3>
<div class="github-body">
	<div class="github-description">$description</div>
	<div class="github-updated-at">$update</div>
</div>
HTML;
