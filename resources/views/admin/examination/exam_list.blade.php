<x-layouts.base>
  {{-- Nav --}}
  @include('layouts.nav')
  {{-- SideNav --}}
  @include('admin.sidenav')

  <main class="content">
    <link rel="stylesheet" href="/css/style.css">

    <div class="p-2 mb-0 mt-2">
      <div class="row">
        <div class="col-12 col-md-4 col-xl-6">
          <p class="mb-0 text-center text-lg-start"><b class="">School Exam</b></p>
          <p class="mb-0 text-center text-lg-start"><small class="">Home -
              Examination - School Exam List</small></p>
        </div>
      </div>
    </div>


    <section class="section" style="margin-top: -120px">
      <a class="btn btn-primary" type="button" href="{{ route('admin.exam.create') }}" style="margin-left: 880px; margin-top: -50px">+ Add</a>
      <div class="container bg-white rounded">
        <div class="row">
          <div class="col-md-12">
            <div class="table-wrap">
              <div class="row mt-3">
                <div class="col-md-3"></div>
                <div class="col-md-4">
                  <select name="class_id" id="class_id" class="form-select eForm-select eChoice-multiple-with-remove" required>
                    <option value="">Select a class</option>
                    @foreach ($classes as $class)
                    <option value="{{ $class->id }}">{{ $class->name }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="col-md-2">
                  <button type="submit" class="btn btn-primary">Filter</button>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-2"></div>
              </div>
              <table class="table mt-3">
                <thead class="thead-primary">
                  <tr>
                    <th><b>#</b></th>
                    <th><b>Exam</b></th>
                    <th><b>Starting Time</b></th>
                    <th><b>Ending Time</b></th>
                    <th><b>Total Marks</b></th>
                    <th><b>Action</b></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($exams as $exam)
                  <tr>
                    <th scope="row" class="scope">{{ $loop->index + 1 }}</th>
                    <td>{{ $exam->name }}</td>
                    <td>{{ $exam->starting_time }}</td>
                    <td>{{ $exam->ending_time }}</td>
                    <td>{{ $exam->total_marks }}</td>
                    <td class="text-start">
                      <div class="adminTable-action ms-0">
                        <button type="button" class="btn btn-primary dropdown-toggle table-action-btn-2"
                          data-bs-toggle="dropdown" aria-expanded="false">
                          Actions
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end eDropdown-menu-2 eDropdown-table-action">
                          <li>
                            <a class="dropdown-item"
                              href="{{ route('admin.edit.exam', ['id' => $exam->id])}}">Edit</a>
                          </li>
                          <li>
                            <a class="dropdown-item" onclick="return confirm('{{__('Are you sure you want to delete this article ?')}}')"
                              href="{{ route('admin.exam.delete', ['id' => $exam->id])}}">Delete</a>
                          </li>
                        </ul>
                      </div>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>

    {{-- Footer --}}
    @include('layouts.footer')
  </main>
</x-layouts.base>