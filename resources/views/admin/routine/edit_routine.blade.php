<x-layouts.base>
  {{-- Nav --}}
  @include('layouts.nav')
  {{-- SideNav --}}
  @include('admin.sidenav')

  <main class="content">
    <link rel="stylesheet" href="/css/style.css">

    <div class="p-2 mb-0 mt-2">
      <div class="row" style="margin-right: 550px">
        <div class="col-12 col-md-4 col-xl-6">
          <p class="mb-0 text-center text-lg-start"><b class="">Class Routine</b></p>
          <p class="mb-0 text-center text-lg-start"><small class="">Edit - Academic - Class
              Routine</small>
          </p>
        </div>
      </div>
    </div>

    <section class="section" style="margin-top: -120px">
      <a class="btn btn-primary" type="button" href="{{ route('admin.routine') }}"
        style="margin-left: 940px; margin-top: -45px">Back</a>
      <div class="bg-white rounded p-4 mb-4 mt-2">
        <form method="POST" class="d-block ajaxForm" action="{{ route('admin.routine.update', $routine->id ) }}">
          @csrf
          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="class_id">Class</label>
              <select name="class_id" id="class_id" required
                class="form-select eForm-select eChoice-multiple-with-remove">
                <option value="">Select a class</option>
                @foreach ($classes as $class)
                <option value="{{ $class->id }}" {{ $routine->class_id == $class->id ? 'selected':'' }}>{{ $class->name }}</option>
                @endforeach
              </select>
            </div>

            <div class="col-md-6 mb-3">
              <label for="section_id" class="eForm-label">Section</label>
              <select name="section_id" id="section_id_on_routine_creation"
                class="form-select eForm-select eChoice-multiple-with-remove" required>
                <option value="">Select section</option>
                @foreach ($sections as $section)
                <option value="{{ $section->id }}" {{ $routine->section_id == $section->id ? 'selected':'' }}>{{ $section->name }}</option>
                @endforeach
              </select>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="subject_id" class="eForm-label">Subject</label>
              <select name="subject_id" id="subject_id_on_routine_creation"
                class="form-select eForm-select eChoice-multiple-with-remove" required>
                <option value="">Select subject</option>
                @foreach ($subjects as $subject)
                <option value="{{ $subject->id }}" {{ $routine->subject_id == $subject->id ? 'selected':'' }}>{{ $subject->name }}</option>
                @endforeach
              </select>
            </div>

            <div class="col-md-6 mb-3">
              <label for="routine_creator" class="eForm-label">Teacher</label>
              <select name="routine_creator" id="teacher_on_routine_creation"
                class="form-select eForm-select eChoice-multiple-with-remove" required>
                <option value="">Assign a teacher</option>
                @foreach ($routine_creator as $teacher)
                <option value="{{ $teacher->id }}" {{ $routine->routine_creator == $teacher->id ? 'selected':'' }}>{{ $teacher->name }}</option>
                @endforeach
              </select>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="room_id" class="eForm-label">Class room</label>
              <select name="room_id" id="room_id" class="form-select eForm-select eChoice-multiple-with-remove"
                required>
                <option value="">Select a class room</option>
                @foreach ($class_rooms as $class_room)
                <option value="{{ $class_room->id }}" {{ $routine->room_id == $class_room->id ? 'selected':'' }}>{{ $class_room->name }}</option>
                @endforeach
              </select>
            </div>

            <div class="col-md-6 mb-3">
              <label for="day" class="eForm-label">Day</label>
              <select name="day" id="day_on_routine_creation"
                class="form-select eForm-select eChoice-multiple-with-remove" required>
                <option value="">Select a day</option>
                <option value="saturday" {{ $routine->day ==  'saturday' ? 'selected':'' }}>Saturday</option>
                <option value="sunday" {{ $routine->day ==  'sunday' ? 'selected':'' }}>Sunday</option>
                <option value="monday" {{ $routine->day ==  'monday' ? 'selected':'' }}>Monday</option>
                <option value="tuesday" {{ $routine->day ==  'tuesday' ? 'selected':'' }}>Tuesday</option>
                <option value="wednesday" {{ $routine->day ==  'wednesday' ? 'selected':'' }}>Wednesday</option>
                <option value="thursday" {{ $routine->day ==  'thursday' ? 'selected':'' }}>Thursday</option>
                <option value="friday" {{ $routine->day ==  'friday' ? 'selected':'' }}>Friday</option>
              </select>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="starting_hour" class="eForm-label">Starting hour</label>
              <select name="starting_hour" id="starting_hour_on_routine_creation"
                class="form-select eForm-select eChoice-multiple-with-remove" required>
                <option value="">Starting hour</option>
                <?php for($i = 0; $i <= 23; $i++){
              if ($i < 12){
                  if ($i == 0){ ?>
                <option value="{{ $i }}" {{ $routine->starting_hour == $i ? 'selected':'' }}>12 AM</option>
                <?php }else{ ?>
                <option value="{{ $i }}" {{ $routine->starting_hour == $i ? 'selected':'' }}>{{ $i }} AM</option>
                <?php } ?>
                <?php }else{ ?>
                <?php $j = $i - 12; ?>

                <?php if ($j == 0){ ?>
                <option value="{{ $i }}" {{ $routine->starting_hour == $i ? 'selected':'' }}>12 PM</option>
                <?php }else{ ?>
                <option value="{{ $i }}" {{ $routine->starting_hour == $i ? 'selected':'' }}>{{ $j }} PM</option>
                <?php } ?>
                <?php } ?>
                <?php } ?>
              </select>
            </div>

            <div class="col-md-6 mb-3">
              <label for="starting_minute" class="eForm-label">Starting minute</label>
              <select name="starting_minute" id="starting_minute_on_routine_creation"
                class="form-select eForm-select eChoice-multiple-with-remove" required>
                <option value="">Starting minute</option>
                <?php for($i = 0; $i <= 55; $i = $i+5){ ?>
                <option value="{{ $i }}" {{ $routine->starting_minute == $i ? 'selected':'' }}>{{ $i }}</option>
                <?php } ?>
              </select>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="ending_hour" class="eForm-label">Ending hour</label>
              <select name="ending_hour" id="ending_hour_on_routine_creation"
                class="form-select eForm-select eChoice-multiple-with-remove" required>
                <option value="">Ending hour</option>
                <?php for($i = 0; $i <= 23; $i++){
                            if ($i < 12){
                            if ($i == 0){ 
                             ?>
                <option value="{{ $i }}" {{ $routine->ending_hour == $i ? 'selected':'' }}>12 AM</option>
                <?php }else{ ?>
                <option value="{{ $i }}" {{ $routine->ending_hour == $i ? 'selected':'' }}>{{ $i }} AM</option>
                <?php } ?>
                <?php }else{ ?>
                <?php $j = $i - 12; ?>

                <?php if ($j == 0){ ?>
                <option value="{{ $i }}" {{ $routine->ending_hour == $i ? 'selected':'' }}>12 PM</option>
                <?php }else{ ?>
                <option value="{{ $i }}" {{ $routine->ending_hour == $i ? 'selected':'' }}>{{ $j }} PM</option>
                <?php } ?>
                <?php } ?>
                <?php } ?>
              </select>
            </div>

            <div class="col-md-6 mb-3">
              <label for="ending_minute" class="eForm-label">Ending minute</label>
              <select name="ending_minute" id="ending_minute_on_routine_creation"
                class="form-select eForm-select eChoice-multiple-with-remove" required>
                <option value="">Ending minute</option>
                <?php for($i = 0; $i <= 55; $i = $i+5){ ?>
                <option value="{{ $i }}" {{ $routine->ending_minute == $i ? 'selected':'' }}>{{ $i }}</option>
                <?php } ?>
              </select>
            </div>
          </div>

            <div class="col-md-6 mb-3 pt-2">
              <button class="btn btn-primary" type="submit">Update class routine</button>
            </div>

          </div>
        </form>
      </div>
    </section>
    {{-- Footer --}}
    @include('layouts.footer')
  </main>
</x-layouts.base>