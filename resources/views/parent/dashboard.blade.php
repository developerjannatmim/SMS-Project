<x-layouts.base>
  {{-- Nav --}}
  @include('layouts.nav')
  {{-- SideNav --}}
  @include('parent.sidenav')
  
  <main class="content">
  
  @include('layouts.topbar')
<title>SMS Project Dashboard</title>

<div class="p-2 mb-0 mt-2">
    <div class="row">
        <div class="col-12 col-md-4 col-xl-6">
            <p class="mb-0 text-center text-lg-start"><b class="">Dashboard</b></p>
            <p class="mb-0 text-center text-lg-start"><small class="">Home - Dashboard</small></p>
        </div>
    </div>
</div>

<div class="bg-white rounded p-4 mb-4 mt-2">
    <div class="row">
        <div class="col-12 col-md-4 col-xl-6 mb-4 mb-md-0">
			<span><b>{{auth()->user()->name}}</b></span><br/>
			<small>Parent</small><br/>
            <small class="mb-0 text-center text-lg-start">Welcome, to Paramount Secondary School</small>
        </div>
        <div class="col-12 col-md-8 col-xl-6 text-center text-lg-start">
        </div>
    </div>
</div>

<div class="row ">
  <div class="col-12 col-xl-8">
        <!-- Project 1 -->
					<div class="row mb-4 mt-5">
						<div class="col-6 mb-4">
							<div class="card border-0 shadow">
								<div class="card-body">
									<div class="row d-block d-xl-flex align-items-center">
										<div class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
											<div style="background-color: rgb(59, 195, 249)" class="icon-shape icon-shape-primary rounded me-4 me-sm-0">
													<svg style="background-color: rgb(23, 166, 223)" class="icon rounded" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"></path></svg>
											</div>
											<div class="d-sm-none">
											</div>
											</div>
											<div class="col-12 col-xl-7 px-xl-0">
												<div class="d-none d-sm-block">
														<h2 class="h6 text-gray-400 mb-0">Students</h2>
														<h3 class="fw-extrabold mb-2">20</h3>
												</div>
												<small class="d-flex align-items-center text-gray-500">
													Total Student
												</small>
												<div class="small d-flex mt-1">
														<div></div>
												</div>
										</div>
									</div>
								</div>
							</div>
					</div>

				<div class="col-6 mb-4">
						<div class="card border-0 shadow">
								<div class="card-body">
										<div class="row d-block d-xl-flex align-items-center">
												<div class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
														<div style="background-color: rgb(72, 237, 35)" class="icon-shape icon-shape-primary rounded me-4 me-sm-0">
																<svg style="background-color: rgb(62, 211, 29)" class="icon rounded" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"></path></svg>
														</div>
														<div class="d-sm-none">
														</div>
												</div>
												<div class="col-12 col-xl-7 px-xl-0">
													<div class="d-none d-sm-block">
															<h2 class="h6 text-gray-400 mb-0">Teachers</h2>
															<h3 class="fw-extrabold mb-2">10</h3>
													</div>
													<small class="d-flex align-items-center text-gray-500">
														Total Teacher
													</small>
													<div class="small d-flex mt-1">
															<div></div>
													</div>
											</div>
										</div>
								</div>
						</div>
				</div>
		</div>


<!-- Project 2 -->
<div class="row mb-4">
		<div class="col-6 mb-4">
				<div class="card border-0 shadow">
						<div class="card-body">
								<div class="row d-block d-xl-flex align-items-center">
										<div class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
												<div style="background-color: rgb(249, 246, 32)" class="icon-shape icon-shape-primary rounded me-4 me-sm-0">
														<svg style="background-color: rgb(210, 207, 15)" class="icon rounded" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"></path></svg>
												</div>
												<div class="d-sm-none">
												</div>
										</div>
										<div class="col-12 col-xl-7 px-xl-0">
											<div class="d-none d-sm-block">
													<h2 class="h6 text-gray-400 mb-0">Parents</h2>
													<h3 class="fw-extrabold mb-2">20</h3>
											</div>
											<small class="d-flex align-items-center text-gray-500">
												Total Parent
											</small>
											<div class="small d-flex mt-1">
													<div></div>
											</div>
									</div>
								</div>
						</div>
				</div>
		</div>

		<div class="col-6 mb-4">
				<div class="card border-0 shadow">
						<div class="card-body">
								<div class="row d-block d-xl-flex align-items-center">
										<div class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
												<div style="background-color: rgb(247, 36, 106)" class="icon-shape icon-shape-primary rounded me-4 me-sm-0">
														<svg style="background-color: rgb(214, 14, 81)" class="icon rounded" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"></path></svg>
												</div>
												<div class="d-sm-none">
												</div>
										</div>
										<div class="col-12 col-xl-7 px-xl-0">
											<div class="d-none d-sm-block">
													<h2 class="h6 text-gray-400 mb-0">Staff</h2>
													<h3 class="fw-extrabold mb-2">7</h3>
											</div>
											<small class="d-flex align-items-center text-gray-500">
												Total Staff
											</small>
											<div class="small d-flex mt-1">
													<div></div>
											</div>
									</div>
								</div>
						</div>
				</div>
		</div>
</div>
</div>



    <div class="col-4 px-0 mt-2 rounded" style="background-color: #f3416c">
          <div class="card border-0 p-3" style="background-color: #f3416c">
                <div class="card-body" style="background-color: #f3416c">
                    <div class="d-flex align-items-center justify-content-between border-bottom pb-3">
                        <div>
                            <div class="h5 mb-0 d-flex align-items-center" style="color: white">
                                <svg style="color: white" class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM4.332 8.027a6.012 6.012 0 011.912-2.706C6.512 5.73 6.974 6 7.5 6A1.5 1.5 0 019 7.5V8a2 2 0 004 0 2 2 0 011.523-1.943A5.977 5.977 0 0116 10c0 .34-.028.675-.083 1H15a2 2 0 00-2 2v2.197A5.973 5.973 0 0110 16v-2a2 2 0 00-2-2 2 2 0 01-2-2 2 2 0 00-1.668-1.973z" clip-rule="evenodd"></path></svg>
                                Upcoming Events
                            </div>
                        </div>
                        <div>
                            <a href="#" class="d-flex align-items-center fw-bold">
                            </a>
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-between border-bottom py-3">
                        <div>
                            <div class="h6 mb-0 d-flex align-items-center">
                              <svg style="color: white" class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 6a3 3 0 013-3h10a1 1 0 01.8 1.6L14.25 8l2.55 3.4A1 1 0 0116 13H6a1 1 0 00-1 1v3a1 1 0 11-2 0V6z" clip-rule="evenodd"></path></svg>
                              <small style="color: white">SCHOOL FOUNDATION DAY</small>
                            </div>
                            <div class="small card-stats" style="color: white">
															Sun, Sep 17 2023
                            </div>
                        </div>
                        <div>
                            <a href="#" class="d-flex align-items-center fw-bold">
                            </a>
                        </div>
                    </div>

                    <div class="d-flex align-items-center justify-content-between border-bottom py-3">
											<div>
													<div class="h6 mb-0 d-flex align-items-center">
														<svg style="color: white" class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 6a3 3 0 013-3h10a1 1 0 01.8 1.6L14.25 8l2.55 3.4A1 1 0 0116 13H6a1 1 0 00-1 1v3a1 1 0 11-2 0V6z" clip-rule="evenodd"></path></svg>
														<small style="color: white">Unique Special Event Ideas</small>
													</div>
													<div class="small card-stats" style="color: white">
														Sun, Sep 17 2023
													</div>
											</div>
											<div>
													<a href="#" class="d-flex align-items-center fw-bold">
													</a>
											</div>
									</div>

									<div class="d-flex align-items-center justify-content-between border-bottom py-3">
										<div>
												<div class="h6 mb-0 d-flex align-items-center">
													<svg style="color: white" class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 6a3 3 0 013-3h10a1 1 0 01.8 1.6L14.25 8l2.55 3.4A1 1 0 0116 13H6a1 1 0 00-1 1v3a1 1 0 11-2 0V6z" clip-rule="evenodd"></path></svg>
													<small style="color: white">REPUBLIC DAY</small>
												</div>
												<div style="color: white" class="small card-stats">
													Sun, Sep 17 2023
												</div>
										</div>
										<div>
												<a href="#" class="d-flex align-items-center fw-bold">
												</a>
										</div>
								</div>
								<div class="mt-2" style="background-color: rgb(246, 84, 111)">
									<button type="button" class="btn mt-2 animate-up-2" style="background-color: rgb(244, 115, 137); color: white">See All</button>
							</div>
              </div>
            </div>
        </div>
    </div>
</div>

{{-- Footer --}}
@include('layouts.footer')
</main>
</x-layouts.base>