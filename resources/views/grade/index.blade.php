@extends('layouts.app')

@section('title')
	Product Index
@endsection

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<table class="table table-bordered">
				<caption>Grade List</caption>
				<tr>
					<th class="th">Name</th>
					<th class="th">Update</th>
					<th class="th">Delete</th>
				</tr>
				<?php 
				foreach ($grades as $grade) 
				{
				?>
					<tr>
						<td>
							{{$grade->name}}
						</td>
						<td>
							<a href="grade/<?php echo $grade->id; ?>/update" class="btn btn-success">Update</a>
						</td>
						<td>
							<a href="{{url('grade/'.$grade->id.'/delete')}}" class="btn btn-warning">Delete</a>
						</td>
				</tr>
				<?php
				}
				?>

				
			</table>
			<a href="{{route('grade.create')}}" class="btn btn-success">Create Grade</a>
		</div>
	</div>
</div>
@endsection