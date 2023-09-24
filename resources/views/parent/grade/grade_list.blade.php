<x-layouts.base>
    {{-- Nav --}}
    @include('layouts.nav')
    {{-- SideNav --}}
    @include('parent.sidenav')
  
    <main class="content">
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
  
      <section class="ftco-section mt-3">
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