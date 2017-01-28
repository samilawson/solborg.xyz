<!DOCTYPE html>
<html>
<head>
	<title><?php echo isset($title) ? _h($title) : config('blog.title') ?></title>

	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" user-scalable="no" />
	<meta name="description" content="<?php echo config('blog.description')?>" />

	<link rel="alternate" type="application/rss+xml" title="<?php echo config('blog.title')?>  Feed" href="<?php echo site_url()?>rss" />

	<link href="<?php echo site_url() ?>assets/css/style.css" rel="stylesheet" />
	<link href="https://fonts.googleapis.com/css?family=Droid+Serif:400,700|Montserrat:700|Roboto+Condensed:700" rel="stylesheet" />

	<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
    
    <link href="<?php echo site_url() ?>assets/images/favicon.png" rel="icon" />
	
</head>
<body>

	<div id="topbar">
        
        <img src="<?php echo site_url() ?>assets/images/logo.png">

		<h1><a href="<?php echo site_url() ?>"><?php echo config('blog.title') ?></a></h1>

		<p class="description"><?php echo config('blog.description')?></p>

		<ul>
			<li><a href="http://solborg.xyz">Home</a></li>
			<li><a href="http://nationstates.net/nation=solborg">NationStates</a></li>
			<li><a href="http://solborg.xyz/radio/">Classical Radio</a></li>
		</ul>

	</div>

	<section id="content">

		<?php echo content()?>

	</section>
    
    <p id="footer"><?php echo config('blog.authorbio')?></p>

</body>
</html>
