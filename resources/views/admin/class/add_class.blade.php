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
            <p class="mb-0 text-center text-lg-start"><b class="">Create Student</b></p>
            <p class="mb-0 text-center text-lg-start"><small class="">Home - Users - Create Student</small></p>
        </div>
    </div>
</div>

<div class="bg-white rounded p-4 mb-4 mt-2">
            {{-- <h5>{{auth()->user()->name}}</h5> --}}
                  <h2 class="h5 mb-4">Create Student information</h2>
                  <form action="{{route('admin.student.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                      <div class="row">
                          <div class="col-md-6 mb-3">
                              <div>
                                  <label for="name">Name</label>
                                  <input class="form-control @error('name') is-valid @enderror" id="name" type="text"
                                      placeholder="Enter your name" required>
                              </div>
                          </div>
                          <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input  class="form-control @error('email') is-valid @enderror" id="text" type="email"
                                    placeholder="name@gmail.com" required>
                            </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6 mb-3">
                            <div>
                                <label for="password">Password</label>
                                <input class="form-control @error('password') is-valid @enderror" id="password" type="password"
                                    placeholder="Enter your password" required>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                          <div class="form-group">
                              <label for="class_id">Class ID</label>
                              <input  class="form-control @error('class_id') is-valid @enderror" id="class_id" type="text"
                                  placeholder="name@gmail.com" required>
                          </div>
                      </div>
                    </div>
                      <div class="row align-items-center">
                          <div class="col-md-6 mb-3">
                              <label for="birthday">Birthday</label>
                              <div class="input-group">
                                  <span class="input-group-text"><svg class="icon icon-xs" fill="currentColor"
                                          viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                          <path fill-rule="evenodd"
                                              d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                              clip-rule="evenodd"></path>
                                      </svg></span>
                                  <input data-datepicker=""
                                      class="form-control datepicker-input" id="birthday" type="text"
                                      placeholder="yyyy/mm/dd" required>
                              </div>
                          </div>
                          <div class="col-md-6 mb-3">
                              <label for="gender">Gender</label>
                              <select class="form-select mb-0 @error('gender') is-valid @enderror" id="gender"
                                  aria-label="Gender select example">
                                  <option selected>Gender</option>
                                  <option value="Female">Female</option>
                                  <option value="Male">Male</option>
                                  <option value="Other">Other</option>
                              </select>
                          </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-6 mb-3">
                          <div class="form-group">
                              <label for="address">Address</label>
                              <input  class="form-control @error('address') is-valid @enderror" id="address" type="text"
                                  placeholder="Enter your home address">
                          </div>
                      </div>
                          <div class="col-md-6 mb-3">
                              <div class="form-group">
                                  <label for="phone">Phone</label>
                                  <input class="form-control @error('phone') is-valid @enderror" id="phone" type="number"
                                      placeholder="+12-345 678 910">
                              </div>
                          </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6 mb-3">
                            <Label for="form-label" class="">Add Photo</Label>
                            <input class="form-control @error('photo') is-valid @enderror" type="file" name="photo" placeholder="Add Photo..." >
                      </div>
                      <div class="col-md-6 mb-3">
                        <label for="blood_group" class="form-label">Blood group</label>
                        <select name="blood_group" id="blood_group" class="form-select eForm-select eChoice-multiple-with-remove">
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
                          <button type="submit" class="btn btn-gray-800 mt-2 animate-up-2">Save</button>
                      </div>
                  </form>
              </div>
          </div>


{{-- Footer --}}
@include('layouts.footer')
</main>
</x-layouts.base>
 