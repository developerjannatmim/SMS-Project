<?php use App\Models\Subject; ?>
<x-layouts.base>
  {{-- Nav --}}
  @include('layouts.nav')
  {{-- SideNav --}}
  @include('admin.sidenav')

  <main class="content">

    @include('layouts.topbar')
    @if ($message = session('message'))
    <div class="alert alert-success">
      {{ $message }}
    </div>
    @endif
    <div class="p-2 mb-0 mt-2">
      <div class="row">
        <div class="col-12 col-md-4 col-xl-6">
          <p class="mb-0 text-center text-lg-start"><b class="">Syllabus</b></p>
          <p class="mb-0 text-center text-lg-start"><small class="">Home -
              Academic -
              Syllabus</small></p>
        </div>
      </div>
    </div>

    <section class="ftco-section mt-3">
      <div class="container bg-white rounded">
        <div class="row">
          <div class="col-md-12">
            <div class="table-wrap">
              <table class="table">
                <thead class="thead-primary">
                  <tr>
                    <th><b>#</b></th>
                    <th><b>Title</b></th>
                    <th><b>Syllabus</b></th>
                    <th><b>Subject</b></th>
                    <th><b>Action</b></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($syllabuses as $syllabus)
                  <?php
                  $subject = Subject::get()
                      ->where('id', $syllabus->subject_id)
                      ->first();
                  ?>
                  <tr>
                    <th scope="row" class="scope">{{ $loop->index + 1 }}</th>
                    <td>{{ $syllabus->title }}</td>
                    <td>{{ $syllabus->file }}</td>
                    <td>{{ $subject->name }}</td>
                    <td class="text-start">
                      <div class="adminTable-action ms-0">
                        <button type="button" class="btn btn-primary dropdown-toggle table-action-btn-2"
                          data-bs-toggle="dropdown" aria-expanded="false">
                          Actions
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end eDropdown-menu-2 eDropdown-table-action">
                          <li>
                            <a class="dropdown-item" href="{{ route('admin.syllabus.create') }}">Add</a>
                          </li>
                          <li>
                            <a class="dropdown-item"
                              href="{{ route('admin.syllabus.edit', ['id' => $syllabus->id] ) }}">Edit</a>
                          </li>
                          <li>
                            <a class="dropdown-item"
                              href="{{ route('admin.syllabus.delete', ['id' => $syllabus->id] ) }}">Delete</a>
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