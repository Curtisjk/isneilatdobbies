<?php
	require_once('getStatus.php');
?>
<html>
	<head>
		<title>Is Neil at Dobbies?</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <meta name="description" content="Is Neil at Dobbies today? Find out here!">
	    <meta name="keywords" content="Neil,Dobbies,Bolton,SSC,Location">

	    <!-- Styles -->
	    <link href='http://fonts.googleapis.com/css?family=Raleway:800' rel='stylesheet' type='text/css'>
	    <link href="css/bootstrap.min.css" rel="stylesheet">
	    <link href="css/style.css" rel="stylesheet">

	    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	    <!--[if lt IE 9]>
	      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
	    <![endif]-->
	    
	    <script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		  ga('create', 'UA-47575344-1', 'isneilatdobbi.es');
		  ga('send', 'pageview');

		</script>
	</head>
	<body>
		<div id="fb-root"></div>
		<script>(function(d, s, id) {
		  var js, fjs = d.getElementsByTagName(s)[0];
		  if (d.getElementById(id)) return;
		  js = d.createElement(s); js.id = id;
		  js.src = "//connect.facebook.net/en_GB/all.js#xfbml=1&appId=721161077918183";
		  fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));</script>
		<!-- Wrap all page content here -->
	    <div id="wrap">
	      <!-- Begin page content -->
	      <div class="container">
	      	<div class="fb">
	      		<div class="fb-like" data-href="http://isneilatdobbi.es" data-layout="box_count" data-action="like" data-show-faces="true" data-share="true"></div>
	      	</div>
	        <div class="title">IS NEIL AT DOBBIES?</div>
	        <div class="largeText">
	        	<div class="ProportionateFont"><?=getStatus()?></div>
	        </div>
	      </div>
	    </div>

	    <div id="footer">
	      <div class="container">
	        <p class="text-muted">
	        	&copy; Is Neil at Dobbies? - 2014</br>Created by <a href="http://twitter.com/Curtisjk">@Curtisjk</a> and <a href="http://twitter.com/JayBriers">@JayBriers</a>. Fork us on <a href="https://github.com/Curtisjk/isneilatdobbies" target="_blank">GitHub</a>.</p>
	      </div>
	    </div>
	</body>
</html>