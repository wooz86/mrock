@layout('front.master')

@section('content')
	<header>
		<h1>Laravel</h1>
		<h2>A Framework For Web Artisans</h2>
		<p class="intro-text" style="margin-top: 45px;"></p>
	</header>

	@if (Session::has('login_errors'))
        <span class="error">Username or password incorrect.</span>
    @endif

	<h1>Login</h1>
	<?php print Form::open('login', 'POST'); ?>
	<?php print Form::text('email', Input::old('email')); ?><br>
	<?php print Form::password('password'); ?><br>
	<?php print Form::submit('Login'); ?><br>
	<?php print Form::token(); ?>
	<?php print Form::close(); ?>

@endsection
