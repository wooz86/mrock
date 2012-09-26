<!DOCTYPE html>
<html>
	<head>
		<!-- Basic Page Needs
		================================================== -->
		<meta charset="utf-8">
		<title>ADMIN</title>
		<meta name="description" content="">
		<meta name="author" content="">
		
		<!-- Mobile Specific Metas
		================================================== -->
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		 
		<!-- CSS
  		================================================== -->
		{{ HTML::style('css/base.css') }}
		{{ HTML::style('css/skeleton.css') }}
		{{ HTML::style('css/admin/style.css') }}

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

		<div class="container">

			<!-- Top
			================================================== -->
			
			<!-- Content
			================================================== -->	
			@yield('content')

			<!-- Footer
			================================================== -->

		</div><!-- /container -->


	  
		<!-- End Document
		================================================== -->	
	</body>
</html>
