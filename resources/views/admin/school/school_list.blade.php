<x-layouts.base>
{{-- Nav --}}
@include('layouts.nav')
{{-- SideNav --}}
@include('layouts.sidenav')

<main class="content">

@include('layouts.topbar')
<title>SMS Project Dashboard</title>

<div class="p-2 mb-0 mt-2">
	<div class="row">
			<div class="col-12 col-md-4 col-xl-6">
					<p class="mb-0 text-center text-lg-start"><b class="">School List</b></p>
					<p class="mb-0 text-center text-lg-start"><small class="">Home - School List</small></p>
			</div>
	</div>
</div>

<!-- Start school area -->
<table class="table table-striped">
	<thead class="table table-dark">
		<tr>
			<th>Title</th>
			<th>Email</th>
			<th>Address</th>
			<th>Phone</th>
			<th>School Info</th>
			<th>Status</th>
		</tr>
	</thead>
	<tbody>
		@foreach($school as $data)
		<tr>
			<td>{{$data->title}}</td>
			<td>{{$data->email}}</td>
			<td>{{$data->phone}}</td>
			<td>{{$data->address}}</td>
			<td>{{$data->school_info}}</td>
			<td>{{$data->status}}</td>
			@endforeach
		</tr>
	</tbody>
</table>
<div class="mb-3">
	<a href="{{ route('admin.student.edit_student') }}" class="btn">Edit</a>
</div>

{{-- Footer --}}
@include('layouts.footer')
</main>
</x-layouts.base>