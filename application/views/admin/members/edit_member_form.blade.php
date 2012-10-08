@layout('admin.master')

@section('content')
	<div class="container">

		<h2>Edit member</h2>

		@if(Session::has('success'))
			{{ Session::get('success') }}
		@endif

		@if($errors->messages)
			<ul>
				@foreach($errors->all('<li>:message</li>') as $message)
					{{$message}}
				@endforeach
			</ul>
		@endif

		@if(!empty($member->image))
			{{ HTML::image('uploads/members/' . $member->image->filename) }}
		@endif

			{{ Form::open('admin/member/update', 'POST', array('enctype' => 'multipart/form-data')) }}
			{{ Form::hidden('id', $member->id) }}
			{{ Form::file('member_image') }}
			{{ Form::text('firstname', $member->firstname) }}
			{{ Form::text('lastname', $member->lastname) }}
			{{ Form::textarea('info', $member->info, array('class' => 'editor')) }}
			{{ Form::submit('Update') }}

	</div>
@endsection
