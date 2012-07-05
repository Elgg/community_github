<?php
/**
 * Ughh...better way to selectively change language string than this?
 *
 * We want to aks for the username on profile edit but display full account URL
 * when displaying the profile page.
 */

add_translation('en', array('profile:github_username' => 'Github account'));
