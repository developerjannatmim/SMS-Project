<?php use App\Models\Classes; ?>

<x-layouts.base>
  {{-- Nav --}}
  @include('layouts.nav')
  {{-- SideNav --}}
  @include('admin.sidenav')

  <main class="content">
    @include('layouts.topbar')
    <title>SMS Project Dashboard</title>
    <link rel="stylesheet" href="/css/style.css">

    <div class="p-2 mt-3">
      <div class="row" style="margin-right: 500px">
        <div class="col-12 col-md-4 col-xl-6">
          <p class="mb-0 text-center text-lg-start"><b class="">Class List</b></p>
          <p class="mb-0 text-center text-lg-start"><small class="">Home - Users - Class
              List</small>
          </p>
        </div>
      </div>
    </div>

    <!-- Start classs area -->
    <section class="section" style="margin-top: -120px">
      <a class="btn btn-primary" type="button" href="{{ route('admin.class.create') }}"
        style="margin-left: 880px; margin-top: -50px">+ Add</a>
      <div class="container bg-white rounded">
        <div class="row">
          <div class="col-md-12">
            <div class="table-wrap">
              <table class="table mt-3">
                <thead class="thead-primary">
                  <tr>
                    <th><b>#</b></th>
                    <th><b>Name</b></th>
                    <th><b>Section</b></th>
                    <th><b>Option</b></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($sections as $section)
                  <?php
                    $class = Classes::get()
                        ->where('id', $section->class_id)
                        ->first();
                    ?>
                  <tr>
                    <th scope="row" class="scope">{{ $loop->index + 1 }}</th>
                    <td>{{ $class->name }}</td>
                    <td>{{ $section->name }}</td>
                    <td class="text-start">
                      <div class="adminTable-action ms-0">
                        <button type="button" class="btn btn-primary dropdown-toggle table-action-btn-2"
                          data-bs-toggle="dropdown" aria-expanded="false">
                          Actions
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end eDropdown-menu-2 eDropdown-table-action">
                          <li>
                            <a class="dropdown-item"
                              href="{{ route('admin.edit.section', ['id' => $section->id]) }}">Edit
                              section</a>
                          </li>
                          <li>
                            <a class="dropdown-item" href="{{ route('admin.edit.class', ['id' => $class->id]) }}">Edit
                              class</a>
                          </li>
                          <li>
                            <a class="dropdown-item"
                              href="{{ route('admin.class.delete', ['id' => $class->id]) }}">Delete</a>
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