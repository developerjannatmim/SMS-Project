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
		@foreach($students as $key => $data)
		<?php
			$student = DB::table('users')->where('id', $data->id)->first();
			$info = json_decode($student->user_information);

		?>
		<tr>
			<td>{{$student->name}}</td>
			<td>{{$student->email}}</td>
			{{-- @if ($student->class_id == $classes->id)
			<td>{{$class->class_name}}</td>
			@endif --}}
			<td>{{$info->birthday}}</td>
			<td>{{$info->gender}}</td>
			<td>{{$info->phone}}</td>
			<td>{{$info->blood_group}}</td>
			<td>{{$info->address}}</td>
			<td>{{$info->photo}}</td>
		</tr>
		@endforeach
	</tbody>
</table>

{{-- Footer --}}
@include('layouts.footer')
</main>
</x-layouts.base>