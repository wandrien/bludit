<!DOCTYPE html>
<html lang="<?php echo HTML::lang() ?>">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="generator" content="Bludit">

	<!-- Generate <title>...</title> -->
	<?php echo HTML::metaTagTitle(); ?>

	<!-- Generate <meta name="description" content="..."> -->
	<?php echo HTML::metaTagDescription(); ?>

	<!-- Generate <link rel="icon" href="..."> -->
	<?php echo HTML::favicon('img/favicon.png'); ?>

	<!-- Include CSS Bootstrap file from Bludit Core -->
	<?php echo HTML::cssBootstrap(); ?>

	<!-- Include CSS Styles from this theme -->
	<?php echo HTML::css('css/style.css'); ?>

	<!-- Execute Bludit plugins for the hook "Site head" -->
	<?php execPluginsByHook('siteHead'); ?>
</head>
<body>

	<!-- Execute Bludit plugins for the hook "Site body begin" -->
	<?php execPluginsByHook('siteBodyBegin'); ?>

	<!-- Navbar -->
	<?php include(THEME_DIR_PHP.'navbar.php'); ?>

	<!-- Content -->
	<?php
		// $WHERE_AM_I variable provides where the user is browsing
		// If the user is watching a particular page the variable takes the value "page"
		// If the user is watching the frontpage the variable takes the value "home"
		// If the user is watching a particular category the variable takes the value "category"
		if ($WHERE_AM_I == 'page') {
			// Check if the page has a template
			$template = $page->template();
			if (($template) && file_exists(THEME_DIR_TEMPLATES.$template)) {
				include(THEME_DIR_TEMPLATES.$template);
			} else {
				include(THEME_DIR_PHP.'page.php');
			}
		} else {
			include(THEME_DIR_PHP.'home.php');
		}
	?>

	<!-- Footer -->
	<?php include(THEME_DIR_PHP.'footer.php'); ?>

	<!-- Include Jquery file from Bludit Core -->
	<?php echo HTML::jquery(); ?>

	<!-- Include javascript Bootstrap file from Bludit Core -->
	<?php echo HTML::jsBootstrap(); ?>

	<!-- Execute Bludit plugins for the hook "Site body end" -->
	<?php execPluginsByHook('siteBodyEnd'); ?>

</body>
</html>