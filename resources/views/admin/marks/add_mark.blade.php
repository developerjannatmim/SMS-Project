<x-layouts.base>
    {{-- Nav --}}
    @include('layouts.nav')
    {{-- SideNav --}}
    @include('admin.sidenav')
  
    <main class="content">
      <title>SMS Project Dashboard</title>
      <link rel="stylesheet" href="/css/style.css">
  
      <div class="p-2 mb-0 mt-2">
        <div class="row" style="margin-right: 600px">
          <div class="col-12 col-md-4 col-xl-6">
            <p class="mb-0 text-center text-lg-start"><b>Mark</b></p>
            <p class="mb-0 text-center text-lg-start"><small class="">Add - Academic - 
                Student Mark</small></p>
          </div>
        </div>
      </div>
  
      <section class="section" style="margin-top: -120px">
        <a class="btn btn-primary" type="button" href="{{ route('admin.marks') }}"
          style="margin-left: 880px; margin-top: -45px">Back</a>
      <div class="bg-white rounded p-4 mb-4 mt-2">
        <form action="{{ route('admin.marks.store') }}" method="POST">
          @csrf
          <div class="row">
            <div class="col-md-6 mb-3">
              <div>
                <label for="user_id">Student Name</label>
                <select name="user_id" class="form-select eChoice-multiple-with-remove" required >
                    <option value="">Select a student</option>
                    @foreach ($students_name as $student_name)
                        <option value="{{ $student_name->id }}">{{ $student_name->name }}</option>
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
                  <label for="subject_id">Subject</label>
                  <select name="subject_id" class="form-select eChoice-multiple-with-remove" required>
                      <option value="">Select a subject</option>
                      @foreach ($subjects as $subject)
                          <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                      @endforeach
                  </select>
              </div>
              </div>
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

          <div class="row">
            <div class="col-md-6 mb-3">
              <div>
                <label for="marks">Mark</label>
                <input class="form-control @error('marks') is-valid @enderror" name="marks" type="text"
                  placeholder="add marks" required>
              </div>
            </div>
            <div class="col-md-6 mb-3">
                <div>
                  <label for="grade_point">Grade Point</label>
                  <input class="form-control @error('grade_point') is-valid @enderror" name="grade_point" type="text"
                    placeholder="grade point" required>
                </div>
              </div>
          </div>

          <div class="row">
            <div class="col-md-6 mb-3">
                <div>
                  <label for="exam_id">Exam</label>
                  <select name="exam_id" class="form-select eChoice-multiple-with-remove" required >
                      <option value="">Select a exam</option>
                      @foreach ($exams as $exam)
                          <option value="{{ $exam->id }}">{{ $exam->name }}</option>
                      @endforeach
                  </select>
                </div>
              </div>
            <div class="col-md-6 mb-3">
              <div>
                <label for="comment">Comment</label>
                <input class="form-control @error('comment') is-valid @enderror" name="comment" type="text"
                  placeholder="add comment" required>
              </div>
            </div>
          </div>

          <div class="mt-3">
            <button type="submit" class="btn btn-primary mt-2 animate-up-2">Add New Subject</button>
          </div>
        </form>
      </div>
    </div>
    </section>
  
      {{-- Footer --}}
      @include('layouts.footer')
    </main>
  </x-layouts.base>