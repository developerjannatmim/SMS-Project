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
      <div class="row" style="margin-right: 550px">
        <div class="col-12 col-md-4 col-xl-6">
          <p class="mb-0 text-center text-lg-start"><b class="">Student</b></p>
          <p class="mb-0 text-center text-lg-start"><small class="">Update - Users - Student Info</small>
          </p>
        </div>
      </div>
    </div>

    <section class="section" style="margin-top: -120px">
      <a class="btn btn-primary" type="button" href="{{ route('admin.student') }}"
        style="margin-left: 880px; margin-top: -45px">Back</a>
    <div class="bg-white rounded p-4 mb-4 mt-2">
      <form action="{{ route('admin.student.update', $student->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
          <div class="col-md-6 mb-3">
            <div>
              <label for="name">Name</label>
              <input class="form-control @error('name') is-invalid @enderror" name="name" type="text"
                value="{{ $student->name }}" required>
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <div class="form-group">
              <label for="email">Email</label>
              <input class="form-control @error('email') is-invalid @enderror" name="email" type="email"
                value="{{ $student->email }}" required>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12 mb-3">
            <div class="form-group">
              <label for="class_id">Class</label>
              <select name="class_id" class="form-select eChoice-multiple-with-remove" required
                onchange="classWiseSection(this.value)">
                <option value="">Select a class</option>
                @foreach ($classes as $class)
                <option value="{{ $class->id }}" {{ $student->class_id == $class->id ? 'selected' : '' }}>{{
                  $class->name }}
                </option>
                @endforeach
              </select>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6 mb-3">
            <div class="form-group">
              <label for="section_id">Section</label>
              <select name="section_id" class="form-select eChoice-multiple-with-remove" required>
                <option value="">Select a section</option>
                @foreach ($sections as $section)
                <option value="{{ $section->id }}" {{ $student->section_id == $section->id ? 'selected' : '' }}>{{
                  $section->name }}
                </option>
                @endforeach
              </select>
            </div>
          </div>
          <?php
            $info = json_decode($student->user_information);
            ?>
          <div class="col-md-6 mb-3">
            <label for="birthday" class="eForm-label">Birthday</label>
            <input type="date" class="form-control eForm-control inputDate" id="birthday" name="birthday"
              value="{{ $info->birthday }}" required />
          </div>
        </div>

        <div class="row">
          <div class="col-md-12 mb-3">
            <div>
              <label for="gender" class="eForm-label">Gender</label>
              <select name="gender" id="gender" class="form-select eForm-select eChoice-multiple-with-remove" required>
                <option value="">Select gender</option>
                <option value="Male" {{ $info->gender == 'Male' ? 'selected':'' }}>Male</option>
                <option value="Female" {{ $info->gender == 'Female' ? 'selected':'' }}>Female</option>
                <option value="Others" {{ $info->gender == 'Others' ? 'selected':'' }}>Others</option>
              </select>
            </div>
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
              <option value="a+" {{ $info->blood_group == 'a+' ? 'selected':''}}>A+</option>
              <option value="a-" {{ $info->blood_group == 'a-' ? 'selected':''}}>A-</option>
              <option value="b+" {{ $info->blood_group == 'b+' ? 'selected':''}}>B+</option>
              <option value="b-" {{ $info->blood_group == 'b-' ? 'selected':''}}>B-</option>
              <option value="ab+" {{ $info->blood_group == 'ab+' ? 'selected':''}}>AB+</option>
              <option value="ab-" {{ $info->blood_group == 'ab-' ? 'selected':''}}>AB-</option>
              <option value="o+" {{ $info->blood_group == 'o+' ? 'selected':''}}>O+</option>
              <option value="o-" {{ $info->blood_group == 'o-' ? 'selected':''}}>O-</option>
            </select>
          </div>
        </div>

        <div class="mt-3">
          <button type="submit" class="btn btn-primary mt-2 animate-up-2">Update Student Info</button>
        </div>
      </form>
    </div>
    </div>
    </section>


    {{-- Footer --}}
    @include('layouts.footer')
  </main>
</x-layouts.base>