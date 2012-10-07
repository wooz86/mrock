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
		<script src="http://code.jquery.com/jquery-1.8.1.min.js"></script>
		{{ Asset::container('laramce')->scripts() }}

		{{	
			RTE::initialize_script(
				array(
					'selector'=>'editor',
					'mode'	=>'advanced',
	                'setup'	=> array(
	                	'skin'			=>'o2k7',
	                    'skin_variant'	=>'black',
	                    'width'			=> '100%',
	                    'height' 		=> '400px',
	                    'theme_advanced_disable' => '|, justifyleft, justifycenter, outdent, indent, anchor, justifyright, justifyfull, image, code, hr, styleselect, fontselect, formatselect, fontsizeselect, forecolor, backcolor, forecolorpicker, backcolorpicker, newdocument, blockquote, visualaid, separator',
	                    'theme_advanced_buttons1' => 'bold,italic,underline, strikethrough, bullist, numlist, undo, redo, link, unlink, cleanup, removeformat, subscript, superscript, charmap, help',
	                    'theme_advanced_buttons2' => '',
	                    'theme_advanced_buttons3' => '',
                	)
                )
            )
        }}

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
