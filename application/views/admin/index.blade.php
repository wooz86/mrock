@layout('admin.master')

@section('content')
	<header>
			<h1>Laravel</h1>
			<h2>A Framework For Web Artisans</h2>

			<p class="intro-text" style="margin-top: 45px;">
			</p>
	</header>
		<h2>Hello, {{ $firstname }} {{ $lastname }}.</h2>

		<h4>Menu</h4>
		<a href="<?php print URL::base(); ?>/admin/user/{{ $user_id }}/edit">Edit account</a>		
@endsection
