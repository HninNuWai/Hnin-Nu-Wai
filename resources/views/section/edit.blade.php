@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<form action="{{ route('student.update', $id)  }}" method="post">
				{{csrf_field()}}
				<div class="form-group">
					<label for="name"> Name</label>
					<input type="text" name="name" id="name" placeholder="Enter Your section" class="form-control">
				</div>
	
				<div class="form-group">
					<select name="category" class="form-control">
						@foreach($categories as $key => $value)
						<option value="{{ $key }}">{{ $value }}</option>
						@endforeach
					</select>
				</div>
				<button type="submit" class="btn btn-success">Submit</button>
			</form>
		</div>
	</div>
</div>
@endsection