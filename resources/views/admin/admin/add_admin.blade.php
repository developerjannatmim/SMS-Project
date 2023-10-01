<x-layouts.base>
	{{-- Nav --}}
	@include('layouts.nav')
	{{-- SideNav --}}
	@include('admin.sidenav')

	<main class="content">

		<title>SMS Project Dashboard</title>
		<link rel="stylesheet" href="/css/style.css">

		<div class="p-2 mb-0 mt-2">
			<div class="row" style="margin-right: 40px">
				<div class="col-12 col-md-4 col-xl-6">
					<p class="mb-0 text-center text-lg-start"><b class="">Admin</b></p>
					<p class="mb-0 text-center text-lg-start"><small class="">Home - Users - Create Admin</small>
					</p>
				</div>
			</div>
		</div>

		<section class="section" style="margin-top: -120px">
			<a class="btn btn-primary" type="button" href="{{ route('admin.admin') }}"
				style="margin-left: 900px; margin-top: -45px">Back</a>
			<div class="bg-white rounded p-4 mb-4 mt-2">
				@if(Session::has('success'))
				<div class="alert alert-success">
					{{ Session::get('success') }}
					@php
						Session::forget('success');
					@endphp
				</div>
				@endif
			
				<!-- Way 1: Display All Error Messages -->
				@if ($errors->any())
					<div class="alert alert-danger">
						<strong>Whoops!</strong> There were some problems with your input.<br><br>
						<ul>
							@foreach ($errors->all() as $error)
								<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
				@endif
				<h2 class="h5 mb-4">Create Admin information</h2>
				<form action="{{ route('admin.admin.store') }}" method="POST" enctype="multipart/form-data">
					@csrf
					<div class="row">
						<div class="col-md-6 mb-3">
							<div>
								<label for="name">Name</label>
								<input class="form-control @error('name') is-invalid @enderror" name="name" type="text"
									placeholder="Enter your name" required>
							</div>
						</div>
						<div class="col-md-6 mb-3">
							<div class="form-group">
								<label for="email">Email</label>
								<input class="form-control @error('email') is-invalid @enderror" name="email" type="email"
									placeholder="name@gmail.com" required>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-12 mb-3">
							<div>
								<label for="password">Password</label>
								<input class="form-control @error('password') is-invalid @enderror" name="password"
									type="password" placeholder="Enter your password" required>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-6 mb-3">
							<div>
								<label for="gender" class="eForm-label">Gender</label>
								<select name="gender" id="gender"
									class="form-select eForm-select eChoice-multiple-with-remove" required>
									<option value="">Select gender</option>
									<option value="Male">Male</option>
									<option value="Female">Female</option>
									<option value="Others">Others</option>
								</select>
							</div>
						</div>
						<div class="col-md-6 mb-3">
							<label for="birthday" class="eForm-label">Birthday</label>
							<input type="date" class="form-control eForm-control" id="eInputDate" name="birthday"
								value="{{ date('Y-m-d') }}" required />
						</div>
					</div>

					<div class="row">
						<div class="col-sm-6 mb-3">
							<div class="form-group">
								<label for="address">Address</label>
								<input class="form-control @error('address') is-invalid @enderror" name="address"
									type="text" placeholder="Enter your home address">
							</div>
						</div>
						<div class="col-md-6 mb-3">
							<div class="form-group">
								<label for="phone">Phone</label>
								<input class="form-control @error('phone') is-invalid @enderror" name="phone"
									type="number" placeholder="+12-345 678 910">
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-6 mb-3">
							<Label for="form-label" class="">Add Photo</Label>
							<input class="form-control @error('photo') is-invalid @enderror" type="file" name="photo"
								placeholder="Add Photo...">
						</div>
						<div class="col-md-6 mb-3">
							<label for="blood_group" class="form-label">Blood group</label>
							<select name="blood_group" class="form-select eForm-select eChoice-multiple-with-remove">
								<option selected>Select a blood group</option>
								<option value="a+">A+</option>
								<option value="a-">A-</option>
								<option value="b+">B+</option>
								<option value="b-">B-</option>
								<option value="ab+">AB+</option>
								<option value="ab-">AB-</option>
								<option value="o+">O+</option>
								<option value="o-">O-</option>
							</select>
						</div>
					</div>

					<div class="mt-3">
						<button type="submit" class="btn btn-primary mt-2 animate-up-2">Add New Admin Info</button>
					</div>
				</form>
			</div>
			</div>
		</section>



		{{-- Footer --}}
		@include('layouts.footer')
	</main>
</x-layouts.base>