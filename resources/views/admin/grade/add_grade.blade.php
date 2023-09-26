<x-layouts.base>
    {{-- Nav --}}
    @include('layouts.nav')
    {{-- SideNav --}}
    @include('admin.sidenav')
    
    <main class="content">
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
    <form method="POST" action="{{ route('admin.store.grade') }}">
        @csrf 
        <div class="form-row">
            <div class="fpb-7">
                <label for="grade" class="eForm-label">Grade</label>
                <input type="text" class="form-control eForm-control"  id="grade" name ="grade" placeholder="Grade" required>
            </div>
  
            <div class="fpb-7">
                <label for="grade_point" class="eForm-label">Grade point</label>
                <input type="number" class="form-control eForm-control" id="grade_point" name ="grade_point" step=".01" min="0" placeholder="Provide grade point" required>
            </div>
  
            <div class="fpb-7">
                <label for="mark_from" class="eForm-label">Mark From</label>
                <input type="number" class="form-control eForm-control" id="mark_from" name ="mark_from" min="0" placeholder="Mark from" required>
            </div>
  
            <div class="fpb-7">
                <label for="mark_upto" class="eForm-label">Mark upto</label>
                <input type="number" class="form-control eForm-control" id="mark_upto" name ="mark_upto" min="0" placeholder="Mark upto" required>
            </div>
  
            <div class="fpb-7 pt-2">
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
  