@layout('admin.master')

@section('content')
	<header>
			<h1>Laravel</h1>
			<h2>A Framework For Web Artisans</h2>

			<p class="intro-text" style="margin-top: 45px;">
			</p>
	</header>
		Hello, {{ $firstname }} {{ $lastname }}.
@endsection
