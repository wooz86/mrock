@layout('admin.master')

@section('content')
	<div class="container">

		<h2>Edit intro text</h2>

		@if($errors->messages)
			<ul>
				@foreach($errors->all('<li>:message</li>') as $message)
					{{$message}}
				@endforeach
			</ul>
		@endif

		{{ Form::open('admin/home/edit/intro_text', 'POST') }}
		{{ Form::text('intro_text_title', $intro_text->title) }}
		{{ Form::textarea('intro_text', $intro_text->content) }}
		{{ Form::token() }}
		{{ Form::submit('Update') }}

	</div>
@endsection