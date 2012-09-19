@layout('admin.master')

@section('content')
	<header>
			<h1>Laravel</h1>
			<h2>A Framework For Web Artisans</h2>

			<p class="intro-text" style="margin-top: 45px;">
			</p>
	</header>
		@if($firstname && $lastname)	
			<h1>Edit Account for: {{ $firstname }} {{ $lastname }}.</h1>
		@else
			<h1>Edit Account for: {{ $email }}.</h1>
		@endif

		<?php Form::open('admin/user/'); ?>
		<?php Form::close(); ?>


@endsection
