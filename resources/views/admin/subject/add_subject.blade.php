<x-layouts.base>
  {{-- Nav --}}
  @include('layouts.nav')
  {{-- SideNav --}}
  @include('admin.sidenav')

  <main class="content">

    @include('layouts.topbar')
    <title>SMS Project Dashboard</title>
    <link rel="stylesheet" href="/css/style.css">

    <div class="p-2 mb-0 mt-2">
      <div class="row" style="margin-right: 600px">
        <div class="col-12 col-md-4 col-xl-6">
          <p class="mb-0 text-center text-lg-start"><b>Subject</b></p>
          <p class="mb-0 text-center text-lg-start"><small class="">Add - Academic - 
              Subject</small></p>
        </div>
      </div>
    </div>

    <section class="section" style="margin-top: -120px">
      <a class="btn btn-primary" type="button" href="{{ route('admin.subject') }}"
        style="margin-left: 880px; margin-top: -45px">Back</a>
    <div class="bg-white rounded p-4 mb-4 mt-2">
      @if(Session::has('success'))
      <div class="alert alert-success">
          {{ Session::get('success') }}
          @php
              Session::forget('success');
          @endphp
      </div>
      @endif
  
      <!-- Way 1: Display All Error Messages -->
      @if ($errors->any())
          <div class="alert alert-danger">
              <strong>Whoops!</strong> There were some problems with your input.<br><br>
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif
      <form action="{{ route('admin.store.subject') }}" method="POST">
        @csrf
        <div class="row">
          <div class="col-md-6 mb-3">
            <div>
              <label for="name">Name</label>
              <input class="form-control @error('name') is-invalid @enderror" name="name" type="text"
                placeholder="Provide a subject name" required>
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <div class="form-group">
              <label for="class_id">Class</label>
              <select name="class_id" class="form-select eChoice-multiple-with-remove" required
                  onchange="classWiseSection(this.value)">
                  <option value="">Select a class</option>
                  @foreach ($classes as $class)
                      <option value="{{ $class->id }}">{{ $class->name }}</option>
                  @endforeach
              </select>
          </div>
          </div>
        </div>
        <div class="mt-3">
          <button type="submit" class="btn btn-primary mt-2 animate-up-2">Add New Subject</button>
        </div>
      </form>
    </div>
  </div>
  </section>

    {{-- Footer --}}
    @include('layouts.footer')
  </main>
</x-layouts.base>