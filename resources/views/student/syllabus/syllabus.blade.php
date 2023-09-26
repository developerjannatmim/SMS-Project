<?php use App\Models\Subject; ?>
<x-layouts.base>
  {{-- Nav --}}
  @include('layouts.nav')
  {{-- SideNav --}}
  @include('student.sidenav')

  <main class="content">

    @if ($message = session('message'))
    <div class="alert alert-success">
      {{ $message }}
    </div>
    @endif
    
    <div class="p-2 mb-0 mt-2">
      <div class="row">
        <div class="col-12 col-md-4 col-xl-6">
          <p class="mb-0 text-center text-lg-start"><b class="">Class Syllabus</b></p>
          <p class="mb-0 text-center text-lg-start"><small class="">Home - Academic - Class Syllabus</small></p>
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