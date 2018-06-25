@extends("layouts.app")
@section("content")

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<form action="{{ route('student.store') }}" method="post">
				{{ csrf_field() }}
				
				<div class="form-group">
					<label for="name">Student Name</label>
					<input type="text" class="form-control" id="student_name" name="name" placeholder="Your name">
				</div>
				<div class="form-group">
					<label for="fathername">Father Name</label>
					<input type="text" class="form-control" id="fathername" name="fathername" placeholder="Your Father Name">
				</div>
				<div class="form-group">
					<label for="phone_no">Phone No</label>
					<input type="text" class="form-control" id="phone_no" name="phone_no" placeholder="Your Phone Number">
				</div>
				
				<div class="form-group">
					<label for="address">Address</label>
					<input type="address" class="form-control" id="address" name="address" placeholder="Enter your address">
				</div>

				<div class="form-group">
					<label for="grade">Grade</label>
					<select name="grade" class="form-control">
						@foreach($grades as $key => $value)
						<option value="{{ $key }}">{{ $value }}</option>
						@endforeach
					</select>
				</div>

				<div class="form-group">
					<label for="section">Section</label>
					<select name="section" class="form-control">
						@foreach($sections as $key => $value)
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