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
              <label for="name">Name</label>
              <input class="form-control @error('name') is-valid @enderror" name="name" type="text"
                value="{{ $subject->name }}" required>
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <div class="form-group">
              <label for="class_id">Class</label>
              <select name="class_id" class="form-select eChoice-multiple-with-remove" required
                  onchange="classWiseSection(this.value)">
                  <option value="">Select a class</option>
                  @foreach ($classes as $class)
                      <option value="{{ $class->id }}" {{ $subject->class_id == $class->id ? 'selected':'' }}>{{ $class->name }}</option>
                  @endforeach
              </select>
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