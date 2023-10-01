<x-layouts.base>
  {{-- Nav --}}
  @include('layouts.nav')
  {{-- SideNav --}}
  @include('admin.sidenav')

  <main class="content">
    <title>SMS Project Dashboard</title>
    <link rel="stylesheet" href="/css/style.css">

    <div class="p-2 mb-0 mt-2">
      <div class="row" style="margin-right: 450px">
        <div class="col-12 col-md-4 col-xl-6">
          <p class="mb-0 text-center text-lg-start"><b class="">Admin</b></p>
          <p class="mb-0 text-center text-lg-start"><small class="">Home - Users - Update Admin
              Info</small>
          </p>
        </div>
      </div>
    </div>

    <section class="section" style="margin-top: -120px">
      <a class="btn btn-primary" type="button" href="{{ route('admin.admin') }}"
				style="margin-left: 940px; margin-top: -45px">Back</a>
      <div class="bg-white rounded p-4 mb-4 mt-2">
        <form action="{{ route('admin.admin.update', $admin->id) }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="row">
            <div class="col-md-6 mb-3">
              <div>
                <label for="name">Name</label>
                <input class="form-control @error('name') is-invalid @enderror" name="name" type="text"
                  value="{{ $admin->name }}" required>
              </div>
            </div>
            <div class="col-md-6 mb-3">
              <div class="form-group">
                <label for="email">Email</label>
                <input class="form-control @error('email') is-invalid @enderror" name="email" type="email"
                  value="{{ $admin->email }}" required>
              </div>
            </div>
          </div>
          <?php
            $info = json_decode($admin->user_information);
          ?>
  
          <div class="row">
            <div class="col-md-6 mb-3">
              <div>
                <label for="gender" class="eForm-label">Gender</label>
                <select name="gender" id="gender" class="form-select eForm-select eChoice-multiple-with-remove" required>
                  <option value="">Select gender</option>
                  <option value="Male" {{ $info->gender == 'Male' ? 'selected' : '' }}>Male</option>
                  <option value="Female" {{ $info->gender == 'Female' ? 'selected' : '' }}>Female</option>
                  <option value="Others" {{ $info->gender == 'Others' ? 'selected' : '' }}>Others</option>
                </select>
              </div>
            </div>
            <div class="col-md-6 mb-3">
              <label for="birthday">Birthday</label>
              <input type="date" class="form-control" name="birthday" value="{{ $info->birthday }}" required />
            </div>
          </div>
  
          <div class="row">
            <div class="col-sm-6 mb-3">
              <div class="form-group">
                <label for="address">Address</label>
                <input class="form-control @error('address') is-invalid @enderror" name="address" type="text"
                  value="{{ $info->address }}">
              </div>
            </div>
            <div class="col-md-6 mb-3">
              <div class="form-group">
                <label for="phone">Phone</label>
                <input class="form-control @error('phone') is-invalid @enderror" name="phone" type="number"
                  value="{{ $info->phone }}">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6 mb-3">
              <Label for="form-label" class="">Add Photo</Label>
              <input class="form-control @error('photo') is-invalid @enderror" type="file" name="photo"
                value="Add Photo...">
            </div>
            <div class="col-md-6 mb-3">
              <label for="blood_group" class="form-label">Blood group</label>
              <select name="blood_group" class="form-select eForm-select eChoice-multiple-with-remove">
                <option selected>Select a blood group</option>
                <option value="a+" {{ $info->blood_group == 'a+' ? 'selected' : '' }}>A+</option>
                <option value="a-" {{ $info->blood_group == 'a-' ? 'selected' : '' }}>A-</option>
                <option value="b+" {{ $info->blood_group == 'b+' ? 'selected' : '' }}>B+</option>
                <option value="b-" {{ $info->blood_group == 'b-' ? 'selected' : '' }}>B-</option>
                <option value="ab+" {{ $info->blood_group == 'ab+' ? 'selected' : '' }}>AB+</option>
                <option value="ab-" {{ $info->blood_group == 'ab-' ? 'selected' : '' }}>AB-</option>
                <option value="o+" {{ $info->blood_group == 'o+' ? 'selected' : '' }}>O+</option>
                <option value="o-" {{ $info->blood_group == 'o-' ? 'selected' : '' }}>O-</option>
              </select>
            </div>
          </div>
  
          <div class="mt-3">
            <button type="submit" class="btn btn-primary mt-2 animate-up-2">Update Admin Info</button>
          </div>
        </form>
      </div>
      </div>
    </section>


    {{-- Footer --}}
    @include('layouts.footer')
  </main>
</x-layouts.base>