@layout('admin.master')

@section('content')
	<div class="container">

		<h2>Manage members</h2>

		@if(Session::has('success'))
			{{ Session::get('success') }}
		@endif

		@if(!empty($errors->messages))
			<ul>
				@foreach($errors->all('<li>:message</li>') as $message)
					{{ $message }}
				@endforeach
			</ul>
		@endif

		<h3>Add new member</h3>
		
		{{ Form::open('admin/member/save', 'POST', array('enctype' => 'multipart/form-data')) }}

		<table class="container">
			<tbody>
				<tr>
					<td>
						{{ Form::file('member_image') }}
						{{ Form::text('firstname', Input::old('firstname'), array('placeholder' => 'Firstname')) }}
						{{ Form::text('lastname', Input::old('lastname'), array('placeholder' => 'Lastname')) }}
					</td>
					<td>
						{{ Form::textarea('info', null, array('class' => 'editor')) }}
					</td>
		
				</tr>
			</tbody>
		</table>
			{{ Form::submit('Add member') }}

		

		@if(!empty($members))
		<hr>
		<h3>Members</h3>
			<table>
				<th>
					<tr>
						<td>Image</td>
						<td>Name</td>
						<td>Created at</td>
						<td>Updated at</td>
						<td>Manage</td>
					</tr>
				</th>
				<tbody>
					@foreach($members as $member)
						<tr>
							@if(!empty($member->image->filename))
								<td>{{ HTML::image('uploads/members/' . $member->image->filename, $member->firstname . ' ' . $member->lastname, array('class' => 'thumbnail')) }}</td>
							@else
								<td><a href="biography/member/{{ $member->id }}">{{ HTML::image('img/silhouette.png', $member->firstname . ' ' . $member->lastname, array('class' => 'thumbnail')) }}</a><br/></td>	
							@endif
							<td>{{ $member->firstname }} {{ $member->lastname }}</td>
							<td>{{ $member->created_at }}</td>
							<td>{{ $member->updated_at }}</td>
							<td>{{HTML::link('admin/member/' . $member->id . '/edit', 'Edit')}} {{HTML::link('url', 'Delete')}}</td>
						</tr>
					@endforeach
				</tbody>
			</table>

		@endif


	</div>
@endsection
