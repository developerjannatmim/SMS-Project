<x-layouts.base>
    {{-- Nav --}}
    @include('layouts.nav')
    {{-- SideNav --}}
    @include('admin.sidenav')
    
    <main class="content">
        <link rel="stylesheet" href="/css/style.css">
    <div class="p-2 mb-0 mt-2">
      <div class="row">
          <div class="col-12 col-md-4 col-xl-6">
              <p class="mb-0 text-center text-lg-start"><b class="">Grade</b></p>
              <p class="mb-0 text-center text-lg-start"><small class="">Add - 
                Examination - 
                Grade</small></p>
          </div>
      </div>
  </div>
  
  <section class="section" style="margin-top: -120px">
    <a class="btn btn-primary" type="button" href="{{ route('admin.grade') }}"
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
    <form method="POST" action="{{ route('admin.store.grade') }}">
        @csrf 
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="grade" class="eForm-label">Grade</label>
                <input type="text" class="form-control eForm-control @error('grade') is-invalid @enderror"  id="grade" name ="grade" placeholder="Grade" required>
            </div>
  
            <div class="col-md-6 mb-3">
                <label for="grade_point" class="eForm-label">Grade point</label>
                <input type="number" class="form-control eForm-control @error('grade_point') is-invalid @enderror" id="grade_point" name ="grade_point" step=".01" min="0" placeholder="Provide grade point" required>
            </div>
        </div>
  
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="mark_from" class="eForm-label">Mark From</label>
                <input type="number" class="form-control eForm-control @error('mark_from') is-invalid @enderror" id="mark_from" name ="mark_from" min="0" placeholder="Mark from" required>
            </div>
  
            <div class="col-md-6 mb-3">
                <label for="mark_upto" class="eForm-label">Mark upto</label>
                <input type="number" class="form-control eForm-control @error('mark_upto') is-invalid @enderror" id="mark_upto" name ="mark_upto" min="0" placeholder="Mark upto" required>
            </div>
        </div>
  
            <div class="col-md-6 mb-3 pt-2">
                <button class="btn btn-primary" type="submit">Add</button>
            </div>
        </div>
    </form>
  </div>
</div>
</section>
  
  {{-- Footer --}}
  @include('layouts.footer')
  </main>
  </x-layouts.base>
  