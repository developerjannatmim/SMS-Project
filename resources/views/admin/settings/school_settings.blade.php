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
      <div class="row" style="margin-right: 690px">
        <div class="col-12 col-md-4 col-xl-6">
          <p class="mb-0 text-center text-lg-start"><b class="">School Settings</b></p>
        </div>
      </div>
    </div>

    <div class="bg-white rounded p-4 mb-4 mt-2">
      <form action="{{ route('admin.school.update') }}" method="POST">
        @csrf
        <div class="row">
          <div class="col-md-6 mb-3">
            <div class="form">
              <label for="title">School Name</label>
              <input class="form-control @error('title') is-valid @enderror" name="title" type="text"
                value="{{ $school->title }}" required>
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <div class="form">
              <label for="email">Email Details</label>
              <input class="form-control @error('email') is-valid @enderror" name="email" type="text"
                value="{{ $school->email }}" required>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6 mb-3">
            <div class="form">
              <label for="address">Address</label>
              <input class="form-control @error('address') is-valid @enderror" name="address" type="text"
                value="{{ $school->address }}" required>
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <div class="form">
              <label for="phone">School Phone</label>
              <input class="form-control @error('phone') is-valid @enderror" name="phone" type="text"
                value="{{ $school->phone }}" required>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6 mb-3">
            <div class="form">
              <label for="school_info">School Information</label>
              <input class="form-control @error('school_info') is-valid @enderror" name="school_info" type="text"
                value="{{ $school->school_info }}" required>
            </div>
          </div>
          @if( Auth()->user()->school_id == 1 )
          <div class="col-md-3 mb-3" style="margin-top:40px">
            <div class="btn-group btn-group-toggle" data-toggle="buttons">
              <label for="status">
                <input type="radio" name="status" id="status" autocomplete="off" checked>Active
              </label>
            </div>
          </div>
          @elseif( Auth()->user()->school_id == 2 )
          <div class="col-md-3 mb-3">
            <div class="btn-group btn-group-toggle" data-toggle="buttons">
              <label for="status">
                <input type="radio" name="status" id="status" autocomplete="off" checked>Active
              </label>
            </div>
          </div>
          @endif
        </div>

        <div class="mt-3">
          <button type="submit" class="btn btn-primary mt-2 animate-up-2">Update school info</button>
        </div>
      </form>
    </div>
    </div>

    {{-- Footer --}}
    @include('layouts.footer')
  </main>
</x-layouts.base>