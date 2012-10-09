@layout('admin.master')

@section('content')

		<h3>Hello, {{ $firstname }} {{ $lastname }}.</h3>

		<h5>Home</h5>
		<ul>
			<li>{{ HTML::link('admin/home/edit/intro_image', 'Edit intro image') }}</li>
			<li>{{ HTML::link('admin/home/edit/intro_text', 'Edit intro text') }}</li>
			<li>{{ HTML::link('admin/home/edit/intro_video', 'Edit YouTube video') }}</li>
		</ul>

		<h5>Biography</h5>
		<ul>
			<li>{{ HTML::link('admin/biography/edit/band_image', 'Edit band image') }}</li>
			<li>{{ HTML::link('admin/biography/edit/band_text', 'Edit band text') }}</li>
			<li>{{ HTML::link('admin/members/manage', 'Manage members') }}</li>
		</ul>

		<h5>Gigs</h5>
		<ul>
			<li>{{ HTML::link('admin/gigs', 'Manage gigs') }}</li>
			<li>{{ HTML::link('admin/venues', 'Manage venues') }}</li>
		</ul>

		<h5>Gallery</h5>
		<ul>
			<li>{{ HTML::link('admin/gallery', 'Manage gallery') }}</li>
		</ul>

		<h5>Account</h5>
		<ul>
			<li>{{ HTML::link('admin/user/'.$user_id.'/edit', 'Edit account') }}</li>
		</ul>

		<h5>Logout</h5>
		{{ HTML::link('logout', 'Logout') }}

@endsection
