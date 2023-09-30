<?php use App\Models\Subject; ?>
<x-layouts.base>
  {{-- Nav --}}
  @include('layouts.nav')
  {{-- SideNav --}}
  @include('admin.sidenav')

  <main class="content">
    <link rel="stylesheet" href="/css/style.css">
    
    @if ($message = session('message'))
    <div class="alert alert-success">
      {{ $message }}
    </div>
    @endif
    <div class="p-2 mb-0 mt-2">
      <div class="row" style="margin-right: 600px">
        <div class="col-12 col-md-4 col-xl-6">
          <p class="mb-0 text-center text-lg-start"><b class="">Class Syllabus</b></p>
          <p class="mb-0 text-center text-lg-start"><small class="">Home - Academic - Class Syllabus</small></p>
        </div>
      </div>
    </div>

    <section class="section" style="margin-top: -120px">
      <a class="btn btn-primary" type="button" href="{{ route('admin.syllabus.create') }}" style="margin-left: 880px; margin-top: -50px">+ Add</a>
      <div class="container bg-white rounded">
        <div class="row">
          <div class="col-md-12">
            <div class="search-filter-area mb-3 mt-4 d-flex justify-content-md-between justify-content-center align-items-center flex-wrap gr-15">
              <form action="{{ route('admin.syllabus') }}">
                <div class="search-input d-flex justify-content-start align-items-center">
                  <input type="text" id="search" name="search" value="{{ $search }}" placeholder="Search Title"
                    class="form-control" />
                  <button type="submit" class="btn btn-primary" style="margin-left: 5px">search</button>
                </div>
              </form>
            </div>
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
                        <button type="button" class="btn btn-primary dropdown-toggle table-action-btn-2 form-select"
                          data-bs-toggle="dropdown" aria-expanded="false">
                          Actions
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end eDropdown-menu-2 eDropdown-table-action">
                          <li>
                            <a class="dropdown-item"
                              href="{{ route('admin.syllabus.edit', ['id' => $syllabus->id] ) }}">Edit</a>
                          </li>
                          <li>
                            <a class="dropdown-item" onclick="return confirm('{{__('Are you sure you want to delete this article ?')}}')"
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