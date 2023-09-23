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
        <div class="row" style="margin-right: 550px">
          <div class="col-12 col-md-4 col-xl-6">
            <p class="mb-0 text-center text-lg-start"><b class="">Class</b></p>
            <p class="mb-0 text-center text-lg-start"><small class="">Edit -
            Class</small></p>
          </div>
        </div>
      </div>
  
      <section class="section" style="margin-top: -120px">
        <a class="btn btn-primary" type="button" href="{{ route('admin.class') }}" style="margin-left: 940px; margin-top: -50px">Back</a>
        <div class="bg-white rounded p-4 mb-4 mt-2">
          <form action="{{ route('admin.class.update', $class->id) }}" method="POST">
            @csrf
            <div class="row">
              <div class="col-md-6 mb-3">
                <div>
                  <label for="name">Name</label>
                  <input class="form-control @error('name') is-valid @enderror" name="name" type="text"
                    value="{{ $class->name }}" required>
                </div>
              </div>
            </div>
            <div class="mt-3">
              <button type="submit" class="btn btn-primary btn-gray-800 mt-2 animate-up-2">Update class</button>
            </div>
          </form>
        </div>
        </div>
      </section>
  
      {{-- Footer --}}
      @include('layouts.footer')
    </main>
  </x-layouts.base>