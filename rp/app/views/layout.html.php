<!DOCTYPE html>
<html>
<head>
	<title><?php echo isset($title) ? _h($title) : config('blog.title') ?></title>

	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" user-scalable="no" />
	<meta name="description" content="<?php echo config('blog.description')?>" />

	<link rel="alternate" type="application/rss+xml" title="<?php echo config('blog.title')?>  Feed" href="<?php echo site_url()?>rss" />

	<?php
	if ($_SERVER["HTTP_USER_AGENT"] == "Norrland iOS App") {
	    echo "<link href='" . site_url() . "assets/css/styleApp.css' rel='stylesheet' />";
	} else {
	    echo "<link href='" . site_url() . "assets/css/style.css' rel='stylesheet' />";
	}
	?>
	
	<link href="<?php echo site_url() ?>assets/images/favicon.png" rel="shortcut icon" />
    
	<link href="https://fonts.googleapis.com/css?family=Arimo:400,400i,700|Roboto+Condensed:700" rel="stylesheet">

	<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	
</head>
<body>

	<div id="refresh" onclick="window.location.replace('http://solborg.xyz/rp')"></div>
	<aside>
        
        <img src="<?php echo site_url() ?>assets/images/flag.jpg">
		<h1><a href="<?php echo site_url() ?>"><?php echo config('blog.title') ?></a></h1>

		<p class="description"><?php echo config('blog.description')?></p>

		<ul>
			<li><a href="<?php echo site_url() ?>">Home</a></li>
			<li><a href="http://nationstates.net/region=norrland" target="_blank">Norrland Page</a></li>
			<li><a href="<?php echo site_url() ?>admin.php">Make a Post</a></li>
            		<li><a href="<?php echo site_url() ?>register.php">Register for RP</a></li>
			<li><a href="http://solborg.xyz/rp/military" target="_blank">Military Calculator</a></li>
		</ul>

		<p class="author"><?php echo config('blog.authorbio') ?></p>

	</aside>

	<section id="content">

		<?php echo content()?>

	</section>
	
	<?php
	if ($_SERVER["HTTP_USER_AGENT"] == "Norrland iOS App") {
		echo "<script src='" . site_url() . "assets/javascript/script.js'></script>";
	}
	?>

</body>
</html>