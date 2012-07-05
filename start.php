<?php
/**
 * Elgg community site integration with Github
 */

elgg_register_event_handler('init', 'system', 'community_github_init');

function community_github_init() {
	// add github username to profile
	elgg_register_plugin_hook_handler('profile:fields', 'profile', 'community_github_profile');
	elgg_extend_view('profile/details', 'github/hack', 1);

	elgg_extend_view('css', 'github/css');
	elgg_register_widget_type('github_repos', elgg_echo('community_github:widget:title'), elgg_echo('community_github:widget:description'));

	// do a regular pull of github information
	elgg_register_plugin_hook_handler('cron', 'hourly', 'community_github_pull');
}

/**
 * Add github username to profile
 *
 * @param string $hook  The hook name
 * @param string $type  The hook type
 * @param array $fields Array of current profile fields
 * @return array
 */
function community_github_profile($hook, $type, $fields) {
	$fields['github_username'] = 'github';
	return $fields;
}

/**
 * Pull the latest information from github
 */
function community_github_pull() {

}

/**
 * Pull data from a URL
 *
 * @param string $url
 * @return string
 */
function community_github_pull_data($url) {
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_TIMEOUT, 10);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	$response = curl_exec($ch);
	curl_close($ch);
	return $response;
}

/**
 * Get a user's github repositories
 *
 * @param ElggUser $user
 * @param int      $number
 * @return array
 */
function community_github_get_users_repos($user, $number) {
	$username = $user->github_username;
	if (!$username) {
		return array();
	}

	$json = community_github_pull_data("https://api.github.com/users/$username/repos");
	if (!$json) {
		return array();
	}

	$repos = json_decode($json);
	if (!$repos || !is_array($repos)) {
		return array();
	}

	// remove forks and set timstamp
	foreach ($repos as $index => $repo) {
		if ($repo->fork) {
			unset($repos[$index]);
		}

		$repo->timestamp = strtotime($repo->pushed_at);
	}

	// sort by update date
	usort($repos, create_function('$a,$b', 'return $a->timestamp < $b->timestamp;'));

	return array_slice($repos, 0, $number);
}
