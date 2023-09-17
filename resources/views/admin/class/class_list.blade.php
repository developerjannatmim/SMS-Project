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
<div class="row">
	<div class="col-12">
		@if (session('success'))
				<div class="alert alert-success">
          {{ session('success') }}
        </div>
		@endif
			<div class="eSection-wrap pb-2">
					<div class="search-filter-area d-flex justify-content-md-between justify-content-center align-items-center flex-wrap gr-15">
							<form action="#">
								<div
									class="search-input d-flex justify-content-start align-items-center"
								>
									<span>
										<svg
											xmlns="http://www.w3.org/2000/svg"
											width="16"
											height="16"
											viewBox="0 0 16 16"
										>
											<path
												id="Search_icon"
												data-name="Search icon"
												d="M2,7A4.951,4.951,0,0,1,7,2a4.951,4.951,0,0,1,5,5,4.951,4.951,0,0,1-5,5A4.951,4.951,0,0,1,2,7Zm12.3,8.7a.99.99,0,0,0,1.4-1.4l-3.1-3.1A6.847,6.847,0,0,0,14,7,6.957,6.957,0,0,0,7,0,6.957,6.957,0,0,0,0,7a6.957,6.957,0,0,0,7,7,6.847,6.847,0,0,0,4.2-1.4Z"
												fill="#797c8b"
											/>
										</svg>
									</span>
									<input
										type="text"
										id="search"
										name="search"
										value=""
										placeholder="Search user"
										class="form-control"
									/>
								</div>
							</form>
							<!-- Export Button -->
							@if(count($students) > 0)
							<div class="position-relative">
								<button
									class="eBtn-3 dropdown-toggle"
									type="button"
									id="defaultDropdown"
									data-bs-toggle="dropdown"
									data-bs-auto-close="true"
									aria-expanded="false"
								>
									<span class="pr-10">
										<svg
											xmlns="http://www.w3.org/2000/svg"
											width="12.31"
											height="10.77"
											viewBox="0 0 10.771 12.31"
										>
											<path
												id="arrow-right-from-bracket-solid"
												d="M3.847,1.539H2.308a.769.769,0,0,0-.769.769V8.463a.769.769,0,0,0,.769.769H3.847a.769.769,0,0,1,0,1.539H2.308A2.308,2.308,0,0,1,0,8.463V2.308A2.308,2.308,0,0,1,2.308,0H3.847a.769.769,0,1,1,0,1.539Zm8.237,4.39L9.007,9.007A.769.769,0,0,1,7.919,7.919L9.685,6.155H4.616a.769.769,0,0,1,0-1.539H9.685L7.92,2.852A.769.769,0,0,1,9.008,1.764l3.078,3.078A.77.77,0,0,1,12.084,5.929Z"
												transform="translate(0 12.31) rotate(-90)"
												fill="#00a3ff"
											/>
										</svg>
									</span>
									{{ get_phrase('Export') }}
								</button>
								<ul
									class="dropdown-menu dropdown-menu-end eDropdown-menu-2"
								>
									<li>
											<a class="dropdown-item" id="pdf" href="javascript:;" onclick="Export()">{{ get_phrase('PDF') }}</a>
									</li>
									<li>
											<a class="dropdown-item" id="print" href="javascript:;" onclick="printableDiv('child_list')">{{ get_phrase('Print') }}</a>
									</li>
								</ul>
							</div>
							@endif
					</div>
				@if(count($students) > 0)
			<table id="basic-datatable" class="table eTable eTable-2">
					<thead>
							<tr>
								<th scope="col">#</th>
								<th scope="col">{{ get_phrase('Name') }}</th>
								<th scope="col">{{ get_phrase('Email') }}</th>
								<th scope="col">{{ get_phrase('User Info') }}</th>
								<th scope="col">{{ get_phrase('Id card') }}</th>
							</tr>
					</thead>
					<tbody>
											@foreach($students as $key => $student)
													<?php
													$info = json_decode($student->user_information);
													if(!empty($info->photo)){
															$user_image = 'uploads/user-images/'.$info->photo;
													}else{
															$user_image = 'uploads/user-images/thumbnail.png';
													}
													$school = School::find($student->school_id)->title;
													?>
													<tr>
															<th scope="row">
																	<p class="row-number">{{ $students->firstItem() + $key }}</p>
															</th>
															<td>
																	<div class="dAdmin_profile d-flex align-items-center min-w-200px">
																			<div class="dAdmin_profile_img">
																				<img
																					class="img-fluid"
																					width="50"
																					height="50"
																					src="{{ asset('public/assets') }}/{{ $user_image }}"
																				/>
																			</div>
																			<div class="dAdmin_profile_name">
																				<h4>{{ $student->name }}</h4>
																				<p>{{ $school }}</p>
																			</div>
																	</div>
															</td>
															<td>
																	<div class="dAdmin_info_name min-w-250px">
																			<p>{{ $student->email }}</p>
																	</div>
															</td>
															<td>
																	<div class="dAdmin_info_name min-w-250px">
																			<p><span>{{ get_phrase('Phone') }}:</span> {{ $info->phone }}</p>
																			<p>
																				<span>{{ get_phrase('Address') }}:</span> {{ $info->address }}
																			</p>
																	</div>
															</td>
															<td>
																	<a href="javascript:;" class="btn btn-light-success py-1 px-2 text-14px mt-1" data-bs-toggle="tooltip" title="Id Card" onclick="largeModal('{{ route('parent.student.id_card', ['id' => $student->id]) }}', '{{ get_phrase('Generate id card') }}')"><i class="bi bi-person-badge"></i></a>
															</td>
													</tr>
											@endforeach
									</tbody>
			</table>
			{!! $students->appends(request()->all())->links() !!}
		@endif
		</div>
	</div>
</div>

{{-- Footer --}}
@include('layouts.footer')
</main>
</x-layouts.base>