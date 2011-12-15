<?php
/**
 * Elgg community site integration with Github
 */

register_elgg_event_handler('init', 'system', 'community_github_init');

function community_github_init() {
	register_plugin_hook('profile:fields', 'profile', 'community_github_profile');

	elgg_extend_view('profile/userdetails', 'github/hack', 1);
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
