<x-layouts.base>
  {{-- Nav --}}
  @include('layouts.nav')
  {{-- SideNav --}}
  @include('admin.sidenav')

  <main class="content">
    <link rel="stylesheet" href="/css/style.css">

  @include('layouts.topbar')
  @if ($message = session('message'))
  <div class="alert alert-success">
    {{ $message }}
  </div>
  @endif
  <div class="p-2 mb-0 mt-2">
    <div class="row">
        <div class="col-12 col-md-4 col-xl-6">
            <p class="mb-0 text-center text-lg-start"><b class="">Grades</b></p>
            <p class="mb-0 text-center text-lg-start"><small class="">Home -
              Examination -
              Grades</small></p>
        </div>
    </div>
</div>

    <section class="section" style="margin-top: -120px">
      <a class="btn btn-primary" type="button" href="{{ route('admin.grade.create') }}" style="margin-left: 880px; margin-top: -50px">+ Add</a>
      <div class="container bg-white rounded">
        <div class="row">
          <div class="col-md-12">
            <div class="table-wrap">
              <table class="table">
                <thead class="thead-primary">
                  <tr>
                    <th><b>#</b></th>
                    <th><b>Grade</b></th>
                    <th><b>Grade Point</b></th>
                    <th><b>Mark From</b></th>
                    <th><b>Mark Upto</b></th>
                    <th><b>Action</b></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($grades as $grade)
                  <tr>
                    <th scope="row" class="scope" >{{ $loop->index + 1 }}</th>
                    <td>{{ $grade->name }}</td>
                    <td>{{ $grade->grade_point }}</td>
                    <td>{{ $grade->mark_from  }}</td>
                    <td>{{ $grade->mark_upto }}</td>
                    <td class="text-start">
                      <div class="adminTable-action ms-0">
                          <button
                            type="button"
                            class="btn btn-primary dropdown-toggle table-action-btn-2 form-select"
                            data-bs-toggle="dropdown"
                            aria-expanded="false"
                          >
                          Actions
                          </button>
                          <ul
                            class="dropdown-menu dropdown-menu-end eDropdown-menu-2 eDropdown-table-action"
                          >
                            <li>
                              <a class="dropdown-item" href="{{ route('admin.edit.grade', ['id' => $grade->id]) }}">Edit</a>
                            </li>
                            <li>
                              <a onclick="return confirm('{{__('Are you sure you want to delete this article ?')}}')" class="dropdown-item" href="{{ route('admin.grade.delete', ['id' => $grade->id]) }}">Delete</a>
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