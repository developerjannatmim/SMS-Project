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
          <p class="mb-0 text-center text-lg-start"><b class="">Marks</b></p>
          <p class="mb-0 text-center text-lg-start"><small class="">Home -
              Examination -
              Marks</small></p>
        </div>
      </div>
    </div>

    <div class="mark_report_content" id="mark_report">
      <a class="btn btn-primary" type="button" href="{{ route('admin.marks.create') }}" style="margin-left: 880px; margin-top: -50px">+ Add</a>
      <div class="container bg-white rounded">
        <div class="row">
          <div class="col-md-12">
            @foreach ($marks as $mark)
            @php
              $class = Classes::get()
                ->where('id', $mark->class_id)
                ->first();
              $section = Section::get()
                ->where('id', $mark->section_id)
                ->first();
            @endphp
            <div class="table-wrap">
              <div class="row mt-3">
                <div class="col-md-3">
                  <select name="class_id" id="class_id" class="form-select eForm-select eChoice-multiple-with-remove" required>
                    <option value="">Select a class</option>
                    
                    <option value=""></option>

                  </select>
                </div>
                <div class="col-md-3">
                  <select name="section_id" id="section_id" class="form-select eForm-select eChoice-multiple-with-remove" required>
                    <option value="">Select a section</option>
                    <option value=""></option>
                  </select>
                </div>
                <div class="col-md-3">
                  <select name="subject_id" id="subject_id" class="form-select eForm-select eChoice-multiple-with-remove" required>
                    <option value="">Select a subject</option>
                    <option value=""></option>
                  </select>
                </div>
                <div class="col-md-3">
                  <button type="submit" class="btn eBtn btn-primary">Filter</button>
                </div>
                <div style="background-color: rgb(239,240,245)" class="att-report-banner d-flex justify-content-center justify-content-md-between align-items-center flex-wrap mt-4 mb-4 rounded">
                  <div class="att-report-summary order-1">
                    <h4 class="title">Manage marks</h4>
                    <p class="summary-item">Class<span>{{  }}</span></p>
                    <p class="summary-item">Section<span>{{  }}</span></p>
                    <p class="summary-item">Subject<span>{{  }}</span>
                    </p>
                  </div>
                  <div class="att-banner-img order-0 order-md-1">
                    <img src="/assets/images/attendance-report-banner.png" alt="report-banner" />
                  </div>
                </div>
              </div>
              <table class="table eTable table-bordered">
                <thead>
                  <tr>
                    <th scope="col">Student name</td>
                    <th scope="col">Mark</td>
                    <th scope="col">Grade point</td>
                    <th scope="col">Comment</td>
                    <th scope="col">Action</td>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td></td>
                    <td>
                      <input class="form-control eForm-control" type="number" id="" name="mark" placeholder="mark" min="0" value="" required>
                    </td>
                    <td>
                      <span id=""></span>
                    </td>
                    <td>
                      <input class="form-control eForm-control" type="text" id="" name="comment" placeholder="comment" value="" required>
                    </td>
                    <td class="text-center">
                      <button class="btn btn-success"><i class="bi bi-check2-circle"></i></button>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            @endforeach
          </div>
          
        </div>
      </div>
    </div>


    {{-- Footer --}}
    @include('layouts.footer')
  </main>
</x-layouts.base>
