<x-layouts.base>
  {{-- Nav --}}
  @include('layouts.nav')
  {{-- SideNav --}}
  @include('teacher.sidenav')

  <main class="content">
    <link rel="stylesheet" href="/css/style.css">

    <div class="mb-0 mt-3" style="margin-right: 600px">
      <div class="row">
        <div class="col-12 col-md-4 col-xl-6">
          <p class="mb-0 text-center text-lg-start"><b class="">School Exams</b></p>
          <p class="mb-0 text-center text-lg-start"><small class="">Home -
            Academic - School Exams</small></p>
        </div>
      </div>
    </div>

    <section class="ftco-section" style="margin-top: -100px">
      <div class="container bg-white rounded">
        <div class="row">
          <div class="col-md-12">
            <div class="table-wrap">
              <div class="row mt-3">
                <div class="col-md-3"></div>
                <div class="col-md-4">
                  <select name="class_id" id="class_id" required>
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