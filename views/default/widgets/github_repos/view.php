<?php
/**
 * View a list of github repositories
 */

$number = $vars['entity']->num_display;
$user = page_owner_entity();
$repos = community_github_get_users_repos($user, $number);
if (count($repos) == 0) {
	echo '<div class="contentWrapper">';
	echo elgg_echo('community_github:no_repos');
	echo '</div>';
	return true;
}

echo '<div class="contentWrapper">';

echo '<ul class="github-repos">';
foreach ($repos as $repo) {
	echo '<li>';
	echo elgg_view('github/repo', array('repo' => $repo));
	echo '</li>';
}
echo '<ul>';

echo '</div>';
