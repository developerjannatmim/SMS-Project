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
					<p class="mb-0 text-center text-lg-start"><b class="">Student List</b></p>
					<p class="mb-0 text-center text-lg-start"><small class="">Home - Users - Student List</small></p>
			</div>
	</div>
</div>

<!-- Start Students area -->
<table class="table table-striped">
	<thead class="table table-dark">
		<tr>
			<th>Name</th>
			<th>Email</th>
			<th>Class ID</th>
			<th>Birthday</th>
			<th>Gender</th>
			<th>Phone</th>
			<th>Blood_group</th>
			<th>Address</th>
			<th>Photo</th>
		</tr>
	</thead>
	<tbody>
		@foreach($students as $data)
		<tr>
			<td>{{$data->name}}</td>
			<td>{{$data->email}}</td>
			<td>{{$data->class_id}}</td>
			<td>{{$data->birthday}}</td>
			<td>{{$data->gender}}</td>
			<td>{{$data->phone}}</td>
			<td>{{$data->blood_group}}</td>
			<td>{{$data->address}}</td>
			<td>{{$data->photo}}</td>
		</tr>
		@endforeach
	</tbody>
</table>

{{-- Footer --}}
@include('layouts.footer')
</main>
</x-layouts.base>