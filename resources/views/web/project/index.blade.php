@extends('layouts.web.home')

@section('title','Project')

@section('content')

<h3 class="text-muted">Projects</h3>
<table class="table table-bordered mt-4">
	<thead>
		<tr>
			<th>Serial</th>
			<th>Project Name</th>
			<th>Project ID</th>
			<th>Category</th>
			<th>Author</th>
			<th>Attachement</th>
		</tr>
	</thead>

	<tbody>
		@foreach($projects as $indexKey => $project)
		<tr>
			<td class="text-center">{{ ++$indexKey }}</td>
			<td >{{ $project->project_title }}</td>
			<td class="text-center">{{ $project->project_id }}</td>
			<td >{{ $project->project_category->category_name }}</td>
			<td >{{ $project->author }}</td>
			<td><a href="#"><i class="fa fa-download"></i>&nbsp; Download</a>|<a href="#"><i class="fa fa-eye"></i>&nbsp; View</a></td>
		</tr>

		@endforeach
	</tbody>
</table>  
<br>
{{ $projects->links() }}
@endsection