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
          <p class="mb-0 text-center text-lg-start"><b>Section</b></p>
          <p class="mb-0 text-center text-lg-start"><small class="">Add - New
            Section</small></p>
        </div>
      </div>
    </div>

    <div class="bg-white rounded p-4 mb-4 mt-2">
      <div class="export-btn-area">
        <h5 class="">Add New Section</h5>
        <a class="export_btn" type="button" href="{{ route('admin.section') }}" style="margin-left: 850px">Back</a>
      </div>
      <form action="{{ route('admin.store.section') }}" method="POST">
        @csrf
        <div class="row">
          <div class="col-md-6 mb-3">
            <div class="form-group">
              <label for="section_name">Section</label>
              <select name="section_name" class="form-select eChoice-multiple-with-remove" required
                onchange="classWiseSection(this.value)">
                <option value="">Select a section</option>
                @foreach ($sections as $section)
                <option value="{{ $section->id }}">{{ $section->name }}</option>
                @endforeach
              </select>
            </div>
          </div>
        </div>
        <div class="mt-3">
          <button type="submit" class="btn btn-gray-800 mt-2 animate-up-2">Add New section</button>
        </div>
      </form>
    </div>
    </div>

    {{-- Footer --}}
    @include('layouts.footer')
  </main>
</x-layouts.base>