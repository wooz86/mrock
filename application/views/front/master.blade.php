<!DOCTYPE html>
<html>
	<head>
		<!-- Basic Page Needs
		================================================== -->
		<meta charset="utf-8">
		<title>M-ROCK @if(isset($page)) - {{ $page->title }} @endif</title>
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
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,300' rel='stylesheet' type='text/css'>

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

		<!-- Mobile Navigation -->
		<div class="site-header mobile">
			<div class="container">
				<div class="sixteen columns">
					  <div class="one-third column alpha"><a href="#menu"><i class="icon-reorder"></i></a></div>
					  <div class="one-third column brand">
					  	@if(isset($page))
		                    <span>{{ $page->title }}</span>
		                @endif
					  </div>
					  <div class="one-third column omega"></div>
				</div>
			</div>
		</div>

		<!-- Header image -->
		<div class="container header-image">
			<div class="sixteen columns">
				<img src="img/header-image.png" alt="" />
			</div>
		</div>

		<!-- Desktop/Tablet Navigation -->
		<div class="site-header desktop">
			<div class="container">
				<div class="sixteen columns">
					<ul class="nav">
						@foreach(Page::all() as $nav)
						<li>
							@if($nav->title == 'Home')
								{{ HTML::link(URL::base(), $nav->title) }}
							@else
								{{ HTML::link(Str::lower($nav->title), $nav->title) }}
							@endif
						</li>
						@endforeach
					</ul>
				</div>
			</div>
		</div>

		<!-- Content
		================================================== -->
		<div role="main" class="main">
			@yield('content')
		</div>

		<!-- Footer
		================================================== -->
		@include('front.plugins.footer')
	  	
		<!-- End Document
		================================================== -->	
	</body>
</html>