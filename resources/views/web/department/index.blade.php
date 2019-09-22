@extends('layouts.web.home')

@section('title','Department')

@section('content')

<h3 class="text-muted">Departments</h3>
<table class="table table-bordered mt-4">
	<thead>
		<tr>
			<th>Serial</th>
			<th>Project Name</th>
			<th>-</th>
		</tr>
	</thead>

	<tbody>
		@foreach($departments as $indexKey => $department)
		<tr>
			<td class="text-center">{{ ++$indexKey }}</td>
			<td>{{ $department->department_name }}</td>
			<td><a href="#"><i class="fa fa-download"></i>&nbsp; Download</a>|<a href="#"><i class="fa fa-eye"></i>&nbsp; View</a></td>
		</tr>

		@endforeach
	</tbody>
</table>  
<br>
{{ $departments->links() }}
@endsection