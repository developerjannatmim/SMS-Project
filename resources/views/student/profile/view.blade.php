<x-layouts.base>
{{-- Nav --}}
@include('layouts.nav')
{{-- SideNav --}}
@include('admin.sidenav')

<main class="content">

@include('layouts.topbar')
<div class="container">
    <div class="main-body mt-5">
          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card" style="background-color: rgb(255,255,255)">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">
                    <div class="mt-4">
                      <h4 class="title"><b>{{ auth()->user()->name }}</b></h4>
                      <p class="text-muted mb-1">Student</p>
                      <p class="text-info" style="font-size: 13px">Verified</p>
                      <button class="btn btn-outline-primary">Message</button>
                    </div>
                  </div>
                </div>
              </div>


            </div>
            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body rounded" style="background-color: rgb(255,255,255)">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Full Name</h6>
                    </div>
                    <div class="col-sm-9 text-dark">
                        {{ auth()->user()->name }}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-dark">
                        {{ auth()->user()->email }}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Phone</h6>
                    </div>
                    <div class="col-sm-9 text-dark">
                        {{ json_decode(auth()->user()->user_information, true)['phone'] }}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Mobile</h6>
                    </div>
                    <div class="col-sm-9 text-dark">
                        {{ json_decode(auth()->user()->user_information, true)['phone'] }}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Address</h6>
                    </div>
                    <div class="col-sm-9 text-dark">
                        {{ json_decode(auth()->user()->user_information, true)['address'] }}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-12">
                      <a class="btn btn-info " target="__blank" href="{{ route('student.profile.edit') }}">Edit</a>
                    </div>
                  </div>
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