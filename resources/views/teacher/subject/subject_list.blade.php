<?php use App\Models\Classes; ?>

<x-layouts.base>
  {{-- Nav --}}
  @include('layouts.nav')
  {{-- SideNav --}}
  @include('teacher.sidenav')

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
    <section class="section " style="margin-top: -80px">
      <div class="container bg-white rounded">
        <div class="row">
          <div class="col-md-12">
            <div class="table-wrap">
              <table class="table mt-3">
                <thead class="thead-primary">
                  <tr>
                    <th><b>#</b></th>
                    <th><b>Name</b></th>
                    <th><b>Class</b></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($subjects as $subject)
                  <?php
                  $class = Classes::get()->where('id', $subject->class_id)->first();
                  ?>
                  <tr>
                    <th scope="row" class="scope">{{ $loop->index + 1 }}</th>
                    <td>{{ $subject->name }}</td>
                    <td>{{ $class->name }}</td>
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