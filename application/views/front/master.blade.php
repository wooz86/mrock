<!DOCTYPE html>
<html>
	<head>
		<!-- Basic Page Needs
		================================================== -->
		<meta charset="utf-8">
		<title>M-ROCK</title>
		<meta name="description" content="">
		<meta name="author" content="">
		
		<!-- Mobile Specific Metas
		================================================== -->
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		 
		<!-- CSS
  		================================================== -->
		{{ HTML::style('css/base.css') }}
		{{ HTML::style('css/skeleton.css') }}
		{{ HTML::style('css/font-awesome.css') }}
		{{ HTML::style('css/style.css') }}
		<script src="http://code.jquery.com/jquery-1.8.1.min.js"></script>

		 <!--[if lt IE 9]>
			<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->

		<!-- Favicons
		================================================== -->
		<link rel="shortcut icon" href="img/favicon.ico">
		<link rel="apple-touch-icon" href="img/apple-touch-icon.png">
		<link rel="apple-touch-icon" sizes="72x72" href="img/apple-touch-icon-72x72.png">
		<link rel="apple-touch-icon" sizes="114x114" href="img/apple-touch-icon-114x114.png">
		
	</head>
	<body>

		<!-- Primary Page Layout
		================================================== -->
  		
		<!-- Top
		================================================== -->
		<div class="site-header">
			<div class="container">
				<div class="sixteen columns">
					  <div class="one-third column alpha"><a href="#menu"><i class="icon-reorder"></i></a></div>
					  <div class="one-third column brand">M-ROCK</div>
					  <div class="one-third column omega"></div>
				</div>
			</div>
		</div>

		<div class= "wrapper">
			<img src="img/background2.jpg" alt="" class="background" />
			<div class="container">
				
				<!-- Content
				================================================== -->	
				@yield('content')

				<!-- Footer
				================================================== -->
				
				@if ( Auth::guest() )
					{{ HTML::link('login', 'Login') }}
				@endif

			</div><!-- /container -->
		</div><!-- /wrapper -->


	  
		<!-- End Document
		================================================== -->	
	</body>
</html>