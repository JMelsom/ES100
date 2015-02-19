<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title><?php bloginfo('title'); ?></title>
<link href="<?php bloginfo('stylesheet_url') ?>" rel="stylesheet">
<script src="<?php bloginfo('template_url'); ?>/js/jquery-2.1.1.min.js"></script>
<script src="<?php bloginfo('template_url'); ?>/js/script.js"></script>
<script src="<?php bloginfo('template_url'); ?>/js/jquery.elastic.source.js"></script>
<?php wp_head(); ?>
</head>

<body>
<div role="page">
<?php get_sidebar(); ?>