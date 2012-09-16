<!DOCTYPE html>
<html>
	<head>
		 <meta charset="UTF-8">
		 
		 <title>TITLE</title>
		 
		 <meta name="author" content="NAME">
		 <meta name="description" content="DESCRIPTION">
		 <meta name="keywords" content="KEYWORDS,HERE">
		 <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		 
		 <link rel="shortcut icon" href="FAVICON.ico" type="image/vnd.microsoft.icon">
		 {{ HTML::style('laravel/css/style.css') }}

		 <!--[if lt IE 9]>
			<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
	</head>
	<body style="background: #222; color: #ddd">

		<div class="wrapper">
			@yield('content')
		</div>
	  
	 	
	</body>
</html>