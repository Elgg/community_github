<?php
/**
 *
 */

$url = $vars['url'];

?>

.elgg-module-github {
	border-radius: 4px 4px 4px 4px;
	border: 1px solid #DDDDDD;
	margin: 0 0 10px;
	font: 13.34px/1.4 helvetica,arial,freesans,clean,sans-serif;
}
.elgg-module-github > .elgg-head {
	padding: 8px 8px 0;
}
.elgg-module-github h3 {
	font-size: 14px;
	padding-left: 20px;
	background-image: url("<?php echo $url; ?>mod/community_github/graphics/repo_public.png");
	background-repeat: no-repeat;
}
.elgg-module-github h3 > a {
	color: #4183C4;
}

.github-stats {
	float: right;
	font-size: 11px;
	font-weight: bold;
	padding-left: 15px;
	position: relative;

	margin: 0;
}
.github-stats > li {
	display: inline-block;
}
.github-stats > li a {
	padding: 0 5px 0 23px;
	height: 21px;
    line-height: 21px;
	background-repeat: no-repeat;
	background-position: 5px -2px;
	display: inline-block;
	color: #666666;
	font-weight: bold;
}
.github-stats > li a:hover {
	text-decoration: none;
}
.github-watchers a {
	background-image: url("<?php echo $url; ?>mod/community_github/graphics/repostat_watchers.png");
}
.github-forks a {
	background-image: url("<?php echo $url; ?>mod/community_github/graphics/repostat_forks.png");
}

.elgg-module-github .elgg-body {
	background: -moz-linear-gradient(center top , #FAFAFA, #EFEFEF) repeat scroll 0 0 transparent;
	background: -webkit-gradient(linear, center top, center bottom, from(#FAFAFA), to(#EFEFEF));
	border-top: 1px solid #EEEEEE;
	padding: 8px;
}
.github-description {
	margin-bottom: 5px;
}
.github-updated-at {
	color: #888888;
	font-size: 11px;
}