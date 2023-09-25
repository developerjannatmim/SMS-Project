<x-layouts.base>
  {{-- Nav --}}
  @include('layouts.nav')
  {{-- SideNav --}}
  @include('admin.sidenav')

  <main class="content">

    @include('layouts.topbar')
    <link rel="stylesheet" href="/css/style.css">

    <div class="p-2 mb-0 mt-2">
      <div class="row" style="margin-right: 550px">
        <div class="col-12 col-md-4 col-xl-6">
          <p class="mb-0 text-center text-lg-start"><b class="">Syllabus</b></p>
          <p class="mb-0 text-center text-lg-start"><small class="">Add -
              Academic -
              Class Syllabus</small></p>
        </div>
      </div>
    </div>

    <section class="section" style="margin-top: -120px">
      <a class="btn btn-primary" type="button" href="{{ route('admin.syllabus') }}"
        style="margin-left: 880px; margin-top: -45px">Back</a>
      <div class="bg-white rounded p-4 mb-4 mt-2">
        <form action="{{ route('admin.syllabus.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="row">
            <div class="col-md-6 mb-3">
              <div>
                <label for="title" class="eForm-label">Title</label>
                <input class="form-control @error('title') is-valid @enderror" name="title" type="text"
                  placeholder="Enter syllabus title" required>
              </div>
            </div>
            <div class="col-md-6 mb-3">
              <div class="form-group">
                <label for="form-label" class="eForm-label">Syllabus</label>
                <input class="form-control @error('image') is-valid @enderror" type="file" name="image"
                placeholder="Add Syllabus Image...">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6 mb-3">
              <div>
                <label for="subject_id">Subject</label>
                <select name="subject_id" id="subject_id" class="form-select eChoice-multiple-with-remove" required>
                  <option value="">select a subject</option>
                  @foreach ($subjects as $subject)
                    <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="col-md-6 mb-3">
              <div class="form-group">
                <label for="class_id">Class</label>
                <select name="class_id" class="form-select eChoice-multiple-with-remove" required>
                  <option value="">Select a class</option>
                  @foreach ($classes as $class)
                  <option value="{{ $class->id }}">{{ $class->name }}</option>
                  @endforeach
                </select>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6 mb-3">
              <div class="form-group">
                <label for="section_id">Section</label>
                <select name="section_id" class="form-select eChoice-multiple-with-remove" required >
                  <option value="">Select a section</option>
                  @foreach ($sections as $section)
                  <option value="{{ $section->id }}">{{ $section->name }}</option>
                  @endforeach
                </select>
              </div>
            </div>
          </div>

          <div class="mt-3">
            <button type="submit" class="btn btn-primary mt-2 animate-up-2">Add new syllabus</button>
          </div>
        </form>
  </div>
</section>

    {{-- Footer --}}
    @include('layouts.footer')
  </main>
</x-layouts.base>