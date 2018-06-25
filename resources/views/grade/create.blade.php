@extends("layouts.app")
@section("content")

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<form action="{{ route('grade.store') }}" method="post">
				{{ csrf_field() }}
				
				<div class="form-group">
					<label for="name">Name</label>
					<input type="text" class="form-control" id="student_name" name="name" placeholder="Enter Your Grade">
				</div>
				
				
				<button type="submit" class="btn btn-success">Submit</button>
			</form>
		</div>
	</div>
</div>
@endsection