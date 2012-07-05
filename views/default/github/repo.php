<?php
/**
 * Github repository view
 *
 * @uses $vars['repo']
 */

$name = elgg_view('output/url', array(
	'text' => $vars['repo']->name,
	'href' => $vars['repo']->html_url,
	'is_trusted' => true,
));
$description = $vars['repo']->description;
$update = elgg_echo('community_github:update', array(elgg_get_friendly_time($vars['repo']->timestamp)));
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

$header = <<<HTML
<ul class="github-stats">
	<li class="github-watchers">$watchers</li>
	<li class="github-forks">$forks</li>
</ul>
<h3>$name</h3>
HTML;

$body = <<<HTML
	<div class="github-description">$description</div>
	<div class="github-updated-at">$update</div>
HTML;

echo elgg_view_module('github', '', $body, array('header' => $header));
