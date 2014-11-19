<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>

	<meta charset="<?php bloginfo( 'charset' ); ?>" />

	<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
	<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
	<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
	<!--[if gte IE 9 ]><html class="no-js ie9" lang="en"> <![endif]-->

    <title><?php wp_title('|',true,'right'); ?><?php bloginfo('name'); ?></title>

	<meta name="description" content="<?php bloginfo('description'); ?>" />

	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- mobile specific metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- favicons -->
	<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
	<link rel="icon" href="/favicon.ico" type="image/x-icon">
	<?php /*
	<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.ico">
	<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/images/apple-touch-icon.png">
	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_template_directory_uri(); ?>/images/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_template_directory_uri(); ?>/images/apple-touch-icon-114x114.png">
	*/ ?>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> itemscope itemtype="http://schema.org/WebPage">
	<div id="page">
		<?php get_pagelet('after-body'); ?>
		<div class="container">
			<?php get_pagelet('after-container'); ?>