<x-layouts.base>
    {{-- Nav --}}
    @include('layouts.nav')
    {{-- SideNav --}}
    @include('admin.sidenav')

    <main class="content">

        <div class="p-2 mb-0 mt-2">
            <div class="row" style="margin-right: 550px">
                <div class="col-12 col-md-4 col-xl-6">
                    <p class="mb-0 text-center text-lg-start"><b class="">Class Routine</b></p>
                    <p class="mb-0 text-center text-lg-start"><small class="">Add - Academic - Class
                        Routine</small>
                    </p>
                </div>
            </div>
        </div>

        <section class="section" style="margin-top: -120px">
            <a class="btn btn-primary" type="button" href="{{ route('admin.routine') }}"
                style="margin-left: 940px; margin-top: -45px">Back</a>
            <div class="bg-white rounded p-4 mb-4 mt-2">
                <form method="POST" class="d-block ajaxForm" action="{{ route('admin.routine.store') }}">
                    @csrf
                    <div class="form-row">
                        <div class="fpb-7">
                            <label for="class_id">Class</label>
                            <select name="class_id" id="class_id" required
                                class="form-select eForm-select eChoice-multiple-with-remove">
                                <option value="">Select a class</option>
                                @foreach ($classes as $class)
                                    <option value="{{ $class->id }}">{{ $class->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="fpb-7">
                            <label for="section_id" class="eForm-label">Section</label>
                            <select name="section_id" id="section_id_on_routine_creation"
                                class="form-select eForm-select eChoice-multiple-with-remove" required>
                                <option value="">Select section</option>
                                @foreach ($sections as $section)
                                    <option value="{{ $section->id }}">{{ $section->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="fpb-7">
                            <label for="subject_id" class="eForm-label">Subject</label>
                            <select name="subject_id" id="subject_id_on_routine_creation"
                                class="form-select eForm-select eChoice-multiple-with-remove" required>
                                <option value="">Select subject</option>
                                @foreach ($subjects as $subject)
                                    <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="fpb-7">
                            <label for="routine_creator" class="eForm-label">Teacher</label>
                            <select name="routine_creator" id="teacher_on_routine_creation"
                                class="form-select eForm-select eChoice-multiple-with-remove" required>
                                <option value="">Assign a teacher</option>
                                @foreach ($routine_creator as $teacher)
                                    <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="fpb-7">
                            <label for="room_id" class="eForm-label">Class room</label>
                            <select name="room_id" id="room_id"
                                class="form-select eForm-select eChoice-multiple-with-remove" required>
                                <option value="">Select a class room</option>
                                @foreach ($class_rooms as $class_room)
                                    <option value="{{ $class_room->id }}">{{ $class_room->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="fpb-7">
                            <label for="day" class="eForm-label">Day</label>
                            <select name="day" id="day_on_routine_creation"
                                class="form-select eForm-select eChoice-multiple-with-remove" required>
                                <option value="">Select a day</option>
                                <option value="saturday">Saturday</option>
                                <option value="sunday">Sunday</option>
                                <option value="monday">Monday</option>
                                <option value="tuesday">Tuesday</option>
                                <option value="wednesday">Wednesday</option>
                                <option value="thursday">Thursday</option>
                                <option value="friday">Friday</option>
                            </select>
                        </div>

                        <div class="fpb-7">
                            <label for="starting_hour" class="eForm-label">Starting hour</label>
                            <select name="starting_hour" id="starting_hour_on_routine_creation"
                                class="form-select eForm-select eChoice-multiple-with-remove" required>
                                <option value="">Starting hour</option>
                                <?php for($i = 0; $i <= 23; $i++){
              if ($i < 12){
                  if ($i == 0){ ?>
                                <option value="{{ $i }}">12 AM</option>
                                <?php }else{ ?>
                                <option value="{{ $i }}">{{ $i }} AM</option>
                                <?php } ?>
                                <?php }else{ ?>
                                <?php $j = $i - 12; ?>

                                <?php if ($j == 0){ ?>
                                <option value="{{ $i }}">12 PM</option>
                                <?php }else{ ?>
                                <option value="{{ $i }}">{{ $j }} PM</option>
                                <?php } ?>
                                <?php } ?>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="fpb-7">
                            <label for="starting_minute" class="eForm-label">Starting minute</label>
                            <select name="starting_minute" id="starting_minute_on_routine_creation"
                                class="form-select eForm-select eChoice-multiple-with-remove" required>
                                <option value="">Starting minute</option>
                                <?php for($i = 0; $i <= 55; $i = $i+5){ ?>
                                <option value="{{ $i }}">{{ $i }}</option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="fpb-7">
                            <label for="ending_hour" class="eForm-label">Ending hour</label>
                            <select name="ending_hour" id="ending_hour_on_routine_creation"
                                class="form-select eForm-select eChoice-multiple-with-remove" required>
                                <option value="">Ending hour</option>
                                <?php for($i = 0; $i <= 23; $i++){
                            if ($i < 12){
                            if ($i == 0){ 
                             ?>
                                <option value="{{ $i }}">12 AM</option>
                                <?php }else{ ?>
                                <option value="{{ $i }}">{{ $i }} AM</option>
                                <?php } ?>
                                <?php }else{ ?>
                                <?php $j = $i - 12; ?>

                                <?php if ($j == 0){ ?>
                                <option value="{{ $i }}">12 PM</option>
                                <?php }else{ ?>
                                <option value="{{ $i }}">{{ $j }} PM</option>
                                <?php } ?>
                                <?php } ?>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="fpb-7">
                            <label for="ending_minute" class="eForm-label">Ending minute</label>
                            <select name="ending_minute" id="ending_minute_on_routine_creation"
                                class="form-select eForm-select eChoice-multiple-with-remove" required>
                                <option value="">Ending minute</option>
                                <?php for($i = 0; $i <= 55; $i = $i+5){ ?>
                                <option value="{{ $i }}">{{ $i }}</option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="fpb-7 pt-2">
                            <button class="btn btn-primary" type="submit">Add new routine</button>
                        </div>

                    </div>
                </form>
            </div>
        </section>
        {{-- Footer --}}
        @include('layouts.footer')
    </main>
</x-layouts.base>
