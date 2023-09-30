<?php use App\Models\Classes; ?>

<x-layouts.base>
  {{-- Nav --}}
  @include('layouts.nav')
  {{-- SideNav --}}
  @include('admin.sidenav')

  <main class="content">
    <title>SMS Project Dashboard</title>
    <link rel="stylesheet" href="/css/style.css">

    <div class="p-2 mt-3">
      <div class="row" style="margin-right: 500px">
        <div class="col-12 col-md-4 col-xl-6">
          <p class="mb-0 text-center text-lg-start"><b class="">Subjects</b></p>
          <p class="mb-0 text-center text-lg-start"><small class="">Home - Academic - Subjects
              List</small>
          </p>
        </div>
      </div>
    </div>

    <!-- Start Subjects area -->
    <section class="section " style="margin-top: -120px">
      <a class="btn btn-primary" type="button" href="{{ route('admin.subject.create') }}"
        style="margin-left: 880px; margin-top: -50px">+ Add</a>
      <div class="container bg-white rounded">
        <div class="row">
          <div class="col-md-12">
            <div class="search-filter-area mb-3 mt-4 d-flex justify-content-md-between justify-content-center align-items-center flex-wrap gr-15">
              <form action="{{ route('admin.subject') }}">
                <div class="search-input d-flex justify-content-start align-items-center">
                  <input type="text" id="search" name="search" value="{{ $search }}" placeholder="Search subject"
                    class="form-control" />
                  <button type="submit" class="btn btn-primary" style="margin-left: 5px">search</button>
                </div>
              </form>
            </div>
            <div class="table-wrap">
              <table class="table mt-3">
                <thead class="thead-primary">
                  <tr>
                    <th><b>#</b></th>
                    <th><b>Name</b></th>
                    <th><b>Class</b></th>
                    <th><b>Option</b></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($subjects as $subject)
                  <?php
                                        $class = Classes::get()
                                            ->where('id', $subject->class_id)
                                            ->first();
                                        ?>
                  <tr>
                    <th scope="row" class="scope">{{ $loop->index + 1 }}</th>
                    <td>{{ $subject->name }}</td>
                    <td>{{ $class->name }}</td>
                    <td class="text-start">
                      <div class="adminTable-action ms-0">
                        <button type="button" class="btn btn-primary dropdown-toggle table-action-btn-2"
                          data-bs-toggle="dropdown" aria-expanded="false">
                          Actions
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end eDropdown-menu-2 eDropdown-table-action">
                          <li>
                            <a class="dropdown-item"
                              href="{{ route('admin.edit.subject', ['id' => $subject->id]) }}">Edit</a>
                          </li>
                          <li>
                            <a class="dropdown-item"
                              onclick="return confirm('{{ __('Are you sure you want to delete this article ?') }}')"
                              href="{{ route('admin.subject.delete', ['id' => $subject->id]) }}">Delete</a>
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