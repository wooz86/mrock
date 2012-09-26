@layout('admin.master')

@section('content')

		<h3>Hello, {{ $firstname }} {{ $lastname }}.</h3>

		<h5>Home</h5>
		<ul>
			<li>{{ HTML::link('admin/home/edit/intro_image', 'Edit intro image') }}</li>
			<li>{{ HTML::link('admin/home/edit/intro_text', 'Edit intro text') }}</li>
			<li>{{ HTML::link('admin/home/', '') }}</li>
		</ul>

		<h5>Music</h5>
			<br>
			<br>

		<h5>Biography</h5>
		<ul>
			<li>{{ HTML::link('admin/biography/', 'Edit band image') }}</li>
			<li>{{ HTML::link('admin/biography/', 'Edit band text') }}</li>
			<li>{{ HTML::link('admin/biography/', 'Edit members') }}</li>
		</ul>

		<h5>Gigs</h5>
		<ul>
			<li>{{ HTML::link('admin/gigs', '') }}</li>
			<li>{{ HTML::link('admin/', '') }}</li>
			<li>{{ HTML::link('admin/', '') }}</li>
		</ul>

		<h5>Gallery</h5>
		<ul>
			<li>{{ HTML::link('admin/', '') }}</li>
			<li>{{ HTML::link('admin/', '') }}</li>
			<li>{{ HTML::link('admin/', '') }}</li>
		</ul>

		<h5>Account</h5>
		<ul>
			<li>{{ HTML::link('admin/user/'.$user_id.'/edit', 'Edit account') }}</li>
		</ul>

		<h5>Logout</h5>
		{{ HTML::link('logout', 'Logout') }}

@endsection
