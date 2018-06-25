<form action="{{ route('section.destroy', $model['id']) }}" method="post" 
	onclick="return confirm('Do you want to delete this item?')">
		{{ csrf_field() }}
		{{ method_field("delete") }}
		<button class="btn btn-danger btn-sm">delete</button>
</form>
