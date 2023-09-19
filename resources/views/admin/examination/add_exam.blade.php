<x-layouts.base>
    {{-- Nav --}}
    @include('layouts.nav')
    {{-- SideNav --}}
    @include('admin.sidenav')

    <main class="content">

    @include('layouts.topbar')
        <div class="p-2 mb-0 mt-2">
          <div class="row">
              <div class="col-12 col-md-4 col-xl-6">
                  <p class="mb-0 text-center text-lg-start"><b class="">School Exam</b></p>
                  <p class="mb-0 text-center text-lg-start"><small class="">Add -
                    Examination -
                    School Exam</small></p>
              </div>
          </div>
      </div>

      <div class="">
        <form method="POST" action="{{ route('admin.store.exam') }}">
            @csrf
            <div class="form-row">
                <div class="fpb-7">
                    <label for="exam_name" class="eForm-label">Exam</label>
                    <input type="text" class="form-control eForm-control" id="exam_name" name ="exam_name" placeholder="exam name" required>
                </div>

                <div class="fpb-7">
                    <label for="exam_type" class="eForm-label">Exam Type</label>
                    <input type="text" class="form-control eForm-control" id="exam_type" name ="exam_type" placeholder="exam type" required>
                </div>

                <div class="fpb-7">
                    <label for="class_id" class="eForm-label">Class</label>
                    <select name="class_id" id="class_id">
                        <option value="">Select a class</option>
                        @foreach ($classes as $class)
                        <option value="{{ $class->id }}">{{ $class->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="fpb-7">
                    <label for="section_id" class="eForm-label">Section</label>
                    <select name="section_id" id="section_id">
                        <option value="">Select a section</option>
                        @foreach ($sections as $section)
                        <option value="{{ $section->id }}">{{ $section->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="fpb-7">
                    <label for="starting_date" class="eForm-label">Starting date</label>
                    <input type="date" class="form-control eForm-control" id="starting_date" name ="starting_date" min="0" value="{{ date('Y-m-d') }}" placeholder="Mark upto" required>
                </div>

                <div class="fpb-7">
                    <label for="starting_time" class="eForm-label">Starting time</label>
                    <input type="time" class="form-control eForm-control" id="starting_time" name ="starting_time" min="0" value="{{ date('H:i') }}" required>
                </div>

                <div class="fpb-7">
                    <label for="ending_date" class="eForm-label">Ending date</label>
                    <input type="date" class="form-control eForm-control" id="ending_date" name = "ending_date" min="0" value="{{ date('Y-m-d') }}" placeholder="Mark upto" required>
                </div>

                <div class="fpb-7">
                    <label for="ending_time" class="eForm-label">Ending time</label>
                    <input type="time" class="form-control eForm-control" id="ending_time" name = "ending_time" min="0" value="{{ date('H:i') }}" placeholder="Mark upto" required>
                </div>

                <div class="fpb-7">
                    <label for="total_marks" class="eForm-label">Ending date</label>
                    <input type="number" class="form-control eForm-control" id="total_marks" name = "total_marks" min="0" placeholder="Total Marks" required>
                </div>

                <div class="fpb-7 pt-2">
                    <button class="btn btn-primary" type="submit">Add</button>
                </div>
            </div>
        </form>
      </div>

      {{-- Footer --}}
      @include('layouts.footer')
      </main>
      </x-layouts.base>
