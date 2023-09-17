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
            <p class="mb-0 text-center text-lg-start"><b class="">Create School</b></p>
            <p class="mb-0 text-center text-lg-start"><small class="">Home - Create School</small></p>
        </div>
    </div>
</div>

<div class="bg-white rounded p-4 mb-4 mt-2">
            {{-- <h5>{{auth()->user()->name}}</h5> --}}
                  <h2 class="h5 mb-4">Create School information</h2>
                  <form action="{{route('admin.school.store')}}" method="POST">
                    @csrf
                      <div class="row">
                          <div class="col-md-6 mb-3">
                              <div>
                                  <label for="title">Title</label>
                                  <input class="form-control @error('title') is-valid @enderror" name="title" type="text"
                                      placeholder="Enter your title" required>
                              </div>
                          </div>
                          <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input  class="form-control @error('email') is-valid @enderror" name="email" type="email"
                                    placeholder="name@gmail.com" required>
                            </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-6 mb-3">
                          <div class="form-group">
                              <label for="address">Address</label>
                              <input  class="form-control @error('address') is-valid @enderror" name="address" type="text"
                                  placeholder="Enter your home address">
                          </div>
                      </div>
                          <div class="col-md-6 mb-3">
                              <div class="form-group">
                                  <label for="phone">Phone</label>
                                  <input class="form-control @error('phone') is-valid @enderror" name="phone" type="text"
                                      placeholder="+12-345 678 910">
                              </div>
                          </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6 mb-3">
                            <Label for="school_info" class="">School Info</Label>
                            <input class="form-control @error('school_info') is-valid @enderror" type="text" name="school_info" placeholder="School Info..." >
                      </div>
                      <div class="col-md-6 mb-3">
                        <Label for="status" class="">Status</Label>
                        <input class="form-control @error('status') is-valid @enderror" type="text" name="status" placeholder="Status" >
                      </div>
                      </div>
                      <div class="mt-3">
                          <button type="submit" class="btn btn-gray-800 mt-2 animate-up-2">Save</button>
                      </div>
                  </form>
              </div>
          </div>


{{-- Footer --}}
@include('layouts.footer')
</main>
</x-layouts.base>
 