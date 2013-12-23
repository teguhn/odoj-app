<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<?php $base_url = base_url(); ?>
		<title>{{title}}</title>

		<meta charset='utf-8'>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta name="title" content="{{meta_title}}" />
		<meta name="description" content="{{meta_description}}" />
		<meta name="keywords" content="{{meta_keywords}}" />
		<meta property="og:title" content="{{meta_title}}" />
		<meta property="og:description" content="{{meta_description}}" />
		<meta property="og:image" content="{{meta_image}}" />
		{{metas}}
		<style>
			body{padding-top:60px;}
		</style>
		{{styles}}
		<!-- <link rel="stylesheet" type="text/css" href="<?= $base_url; ?>assets/css/style.css?v=<?= FILE_VERSION; ?>"/>		 -->
		<!-- <link rel="shortcut icon" href="<?= $base_url; ?>favicon.ico" /> -->

		<script type="text/javascript" src="<?= $base_url; ?>assets/js/jquery.js"></script>
		{{scripts}}

		{{other_script}}

	</head>

	<body>
		{{header}}
		<div class="container">
			{{content}}
		</div>
		{{additional_content}}
		{{footer}}
	</body>
</html>