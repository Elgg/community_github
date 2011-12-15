<?php
/**
 * Elgg community site integration with Github
 */

register_elgg_event_handler('init', 'system', 'community_github_init');

function community_github_init() {
	// add github username to profile
	register_plugin_hook('profile:fields', 'profile', 'community_github_profile');
	elgg_extend_view('profile/userdetails', 'github/hack', 1);

	// do a regular pull of github information
	register_plugin_hook('cron', 'hourly', 'community_github_pull');
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
