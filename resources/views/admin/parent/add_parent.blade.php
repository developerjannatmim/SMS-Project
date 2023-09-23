<x-layouts.base>
{{-- Nav --}}
@include('layouts.nav')
{{-- SideNav --}}
@include('admin.sidenav')

<main class="content">

@include('layouts.topbar')

<title>SMS Project Dashboard</title>
<link rel="stylesheet" href="/css/style.css">

  <div class="p-2 mb-0 mt-2">
      <div class="row" style="margin-right: 600px">
          <div class="col-12 col-md-4 col-xl-6">
              <p class="mb-0 text-center text-lg-start"><b class="">Create Parent</b></p>
              <p class="mb-0 text-center text-lg-start"><small class="">Home - Users - Create Parent</small>
              </p>
          </div>
      </div>
  </div>

  <section class="section" style="margin-top: -120px">
    <a class="btn btn-primary" type="button" href="{{ route('admin.guardian') }}"
      style="margin-left: 940px; margin-top: -45px">Back</a>
  <div class="bg-white rounded p-4 mb-4 mt-2">
      <form action="{{ route('admin.guardian.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="row">
              <div class="col-md-6 mb-3">
                  <div>
                      <label for="name">Name</label>
                      <input class="form-control @error('name') is-valid @enderror" name="name" type="text"
                          placeholder="Enter your name" required>
                  </div>
              </div>
              <div class="col-md-6 mb-3">
                  <div class="form-group">
                      <label for="email">Email</label>
                      <input class="form-control @error('email') is-valid @enderror" name="email" type="email"
                        placeholder="name@gmail.com" required>
                  </div>
              </div>
          </div>

          <div class="row">
              <div class="col-md-6 mb-3">
                  <div>
                      <label for="password">Password</label>
                      <input class="form-control @error('password') is-valid @enderror" name="password"
                        type="password" placeholder="Enter your password" required>
                  </div>
              </div>
              <div class="col-md-6 mb-3">
                <div>
                    <label for="designation">Designation</label>
                    <input class="form-control @error('designation') is-valid @enderror" name="designation" type="text"
                    placeholder="Enter your designation" required>
                </div>
              </div>
          </div>

          <div class="row">
              <div class="col-md-12 mb-3">
                  <label for="birthday" class="eForm-label">Birthday</label>
                  <input type="date" class="form-control eForm-control" id="eInputDate" name="birthday"
                    value="{{ date('Y-m-d') }}" required />
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
                <div>
                    <label for="child_name">Child Name</label>
                    <input class="form-control @error('child_name') is-valid @enderror" name="child_name" type="text"
                    placeholder="Enter your child name" required>
                </div>
            </div>
          </div>

          <div class="row">
              <div class="col-sm-6 mb-3">
                  <div class="form-group">
                      <label for="address">Address</label>
                      <input class="form-control @error('address') is-valid @enderror" name="address"
                          type="text" placeholder="Enter your home address">
                  </div>
              </div>
              <div class="col-md-6 mb-3">
                  <div class="form-group">
                      <label for="phone">Phone</label>
                      <input class="form-control @error('phone') is-valid @enderror" name="phone" type="number"
                          placeholder="+12-345 678 910">
                  </div>
              </div>
          </div>

          <div class="row">
              <div class="col-md-6 mb-3">
                  <Label for="form-label" class="">Add Photo</Label>
                  <input class="form-control @error('photo') is-valid @enderror" type="file" name="photo"
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
              <button type="submit" class="btn btn-primary mt-2 animate-up-2">Add New Parent Info</button>
          </div>
      </form>
    </div>
  </div>
  </section>


        {{-- Footer --}}
        @include('layouts.footer')
    </main>
</x-layouts.base>
