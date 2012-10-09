@layout('admin.master')

@section('content')
	<div class="container">

		<h2>Gallery</h2>

		@if(Session::has('success'))
			{{ Session::get('success') }}
		@endif

		@if(!empty($errors->messages))
			<ul>
				@foreach($errors->all('<li>:message</li>') as $message)
					{{$message}}
				@endforeach
			</ul>
		@endif

		<h3>Add new image</h3>
		
		{{ Form::open('admin/gallery/image/save', 'POST', array('enctype' => 'multipart/form-data')) }}

		<table class="container">
			<tbody>
				<tr>
					<td>
						{{ Form::file('gallery_image') }}
						{{ Form::text('caption', Input::old('caption'), array('placeholder' => 'Caption')) }}
					</td>
				</tr>
			</tbody>
		</table>
			{{ Form::submit('Add image') }}
			{{ Form::close() }}

		<hr>

		<h3>Gallery images</h3>
		@if(!empty($images))
				<ul>
					@foreach($images as $image)
                    	<li>
                    		{{ HTML::image('uploads/gallery/' . $image->filename, $image->caption, array('class' => 'thumbnail')) }}
                    		<p>{{ $image->caption }}<br>
                    		{{ HTML::link('gallery/image/' . $image->id . '/edit', 'Edit') }}
                    		{{ HTML::link('gallery/image/' . $image->id . '/delete', 'Delete') }}</p>
                    	</li>
                    @endforeach
                </ul>
        @else
        	<p>No images uploaded.</p>
		@endif
	</div>
@endsection
