<x-layouts.base>
    {{-- Nav --}}
    @include('layouts.nav')
    {{-- SideNav --}}
    @include('admin.sidenav')

    <main class="content">
        <link rel="stylesheet" href="/css/style.css">
        <form method="POST" class="d-block ajaxForm" action="{{ route('admin.routine.store') }}">
            @csrf
            <div class="form-row">
                <div class="fpb-7">
                    <label for="class_id_on_routine_creation" class="eForm-label">Class</label>
                    <select name="class_id" id="class_id_on_routine_creation"
                        class="form-select eForm-select eChoice-multiple-with-remove" required
                        onchange="classWiseSectionForRoutineCreate(this.value)">
                        <option value="">Select a class</option>
                        {{-- <?php foreach($classes as $class): ?>
                        <option value="{{ $class['id'] }}">{{ $class['name'] }}</option>
                        <?php endforeach; ?> --}}
                    </select>
                </div>

                <div class="fpb-7">
                    <label for="section_id_on_routine_creation" class="eForm-label">Section</label>
                    <select name="section_id" id="section_id_on_routine_creation"
                        class="form-select eForm-select eChoice-multiple-with-remove" required>
                        <option value="">Select section</option>
                    </select>
                </div>

                <div class="fpb-7">
                    <label for="subject_id_on_routine_creation" class="eForm-label">Subject</label>
                    <select name="subject_id" id="subject_id_on_routine_creation"
                        class="form-select eForm-select eChoice-multiple-with-remove" required>
                        <option value="">Select subject</option>
                    </select>
                </div>

                <div class="fpb-7">
                    <label for="teacher" class="eForm-label">Teacher</label>
                    <select name="teacher_id" id="teacher_on_routine_creation"
                        class="form-select eForm-select eChoice-multiple-with-remove" required>
                        <option value="">Assign a teacher</option>
                        {{-- <?php foreach($teachers as $teacher): ?>
                        <option value="{{ $teacher['id'] }}">{{ $teacher->name }}</option>
                        <?php endforeach; ?> --}}
                    </select>
                </div>

                <div class="fpb-7">
                    <label for="class_room_id" class="eForm-label">Class room</label>
                    <select name="class_room_id" id="class_room_id_on_routine_creation"
                        class="form-select eForm-select eChoice-multiple-with-remove" required>
                        <option value="">Select a class room</option>
                        {{-- <?php foreach($class_rooms as $class_room): ?>
                        <option value="{{ $class_room['id'] }}">{{ $class_room['name'] }}</option>
                        <?php endforeach; ?> --}}
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
                    <button class="btn-form" type="submit">Add routine</button>
                </div>

            </div>
        </form>

        {{-- Footer --}}
        @include('layouts.footer')
    </main>
</x-layouts.base>
