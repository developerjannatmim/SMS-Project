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
          <p class="mb-0 text-center text-lg-start"><b class="">Subject</b></p>
          <p class="mb-0 text-center text-lg-start"><small class="">Add - New
              Subject</small></p>
        </div>
      </div>
    </div>

    <div class="bg-white rounded p-4 mb-4 mt-2">
      {{-- <h5>{{auth()->user()->name}}</h5> --}}
      <div class="export-btn-area">
      <h5 class="">Add New Subject</h5>
      <a class="export_btn" type="button" href="{{ route('admin.subject') }}" style="margin-left: 850px">Back</a>
      </div>
      <form action="{{ route('admin.subject.update', $subject->id) }}" method="POST">
        @csrf
        <div class="row">
          <div class="col-md-6 mb-3">
            <div>
              <label for="title">School Name</label>
              <input class="form-control @error('title') is-valid @enderror" name="title" type="text"
                value="{{ $subject->title }}" required>
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <div>
              <label for="email">Email</label>
              <input class="form-control @error('email') is-valid @enderror" name="email" type="text"
                value="{{ $subject->email }}" required>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6 mb-3">
            <div>
              <label for="title">School Name</label>
              <input class="form-control @error('title') is-valid @enderror" name="title" type="text"
                value="{{ $subject->title }}" required>
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <div>
              <label for="phone">Phone Number</label>
              <input class="form-control @error('phone') is-valid @enderror" name="phone" type="text"
                value="{{ $subject->phone }}" required>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6 mb-3">
            <div>
              <label for="address">Address</label>
              <input class="form-control @error('address') is-valid @enderror" name="address" type="text"
                value="{{ $subject->address }}" required>
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <div>
              <label for="school_info">A</label>
              <input class="form-control @error('school_info') is-valid @enderror" name="school_info" type="text"
                value="{{ $subject->school_info }}" required>
            </div>
          </div>
        </div>

        <div class="mt-3">
          <button type="submit" class="btn btn-gray-800 mt-2 animate-up-2">Update Subject</button>
        </div>
      </form>
    </div>
    </div>

    {{-- Footer --}}
    @include('layouts.footer')
  </main>
</x-layouts.base>