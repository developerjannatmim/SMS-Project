<?php

use App\Models\Routine;
use App\Models\Subject;
use App\Models\User;
use App\Models\ClassRoom;

?>

<x-layouts.base>
  {{-- Nav --}}
  @include('layouts.nav')
  {{-- SideNav --}}
  @include('admin.sidenav')

  <main class="content">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
      integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
      crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/fontawesome.min.css"
      integrity="sha512-siarrzI1u3pCqFG2LEzi87McrBmq6Tp7juVsdmGY1Dr8Saw+ZBAzDzrGwX3vgxX1NkioYNCFOVC0GpDPss10zQ=="
      crossorigin="anonymous" referrerpolicy="no-referrer" />

    <div class="p-2 mb-0 mt-2">
      <div class="row" style="margin-right: 550px">
        <div class="col-12 col-md-4 col-xl-6">
          <p class="mb-0 text-center text-lg-start"><b class="">Create Routine</b></p>
          <p class="mb-0 text-center text-lg-start"><small class="">Home - Academic - Class
              Routine</small>
          </p>
        </div>
      </div>
    </div>

    <section class="section" style="margin-top: -120px">
      <a class="btn btn-primary" type="button" href="{{ route('admin.routine.create') }}"
        style="margin-left: 940px; margin-top: -45px">+Add</a>
      <div class="bg-white rounded p-4 mb-4 mt-2">
        <ul class="class_routine_content pt-4" id="class_routines">
          <li class="classRoutines-item d-flex align-items-center">
            <h4 class="title">Saturday</h4>
            <div class="classTime-items d-flex">
              <?php $perday_routines = Routine::where(['school_id' => auth()->user()->school_id, 'day' => 'saturday'])->get();
                foreach($perday_routines as $perday_routine) { ?>
              <div class="classTime-item">
                <?php $subject = Subject::find($perday_routine['subject_id']); ?>
                <div class="d-flex">
                  <h4 class="subjectName">{{ $subject->name }}</h4>
                  <div class="btn-group ms-auto">
                    <button type="button" class="icon btn" data-bs-toggle="dropdown" aria-expanded="false">
                      <i class="fa-solid fa-ellipsis-vertical fa-sm" style="color: #000000;"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                      <li>
                        <a class="text-16px ps-2"
                          href="{{ route('admin.routine.edit', ['id' => $perday_routine['id']]) }}">Edit</a>
                      </li>
                      <li>
                        <a class="text-16px ps-2"
                          href="{{ route('admin.routine.delete', ['id' => $perday_routine['id']]) }}">Delete</a>
                      </li>
                    </ul>
                  </div>
                </div>

                <ul class="classDetails">
                  <li class="classDetails-info d-flex align-items-center" style="margin-top: -22px; margin-left: -35px">
                    <div class="icon">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16.03" height="16.03" viewBox="0 0 11.777 11.777">
                        <path id="schedule_FILL0_wght600_GRAD0_opsz24"
                          d="M8.679,9.634a.605.605,0,0,0,.464.2.674.674,0,0,0,.492-.211.679.679,0,0,0,0-.956L8.088,7.119V5.306A.641.641,0,0,0,7.9,4.834a.658.658,0,0,0-.485-.189.643.643,0,0,0-.485.2.662.662,0,0,0-.19.478V7.372a.787.787,0,0,0,.056.3.7.7,0,0,0,.155.239ZM7.414,13.3a5.724,5.724,0,0,1-2.3-.464,5.909,5.909,0,0,1-3.12-3.12,5.724,5.724,0,0,1-.464-2.3,5.724,5.724,0,0,1,.464-2.3,5.909,5.909,0,0,1,3.12-3.12,5.724,5.724,0,0,1,2.3-.464,5.724,5.724,0,0,1,2.3.464,5.9,5.9,0,0,1,3.12,3.12,5.724,5.724,0,0,1,.464,2.3,5.724,5.724,0,0,1-.464,2.3,5.9,5.9,0,0,1-3.12,3.12A5.724,5.724,0,0,1,7.414,13.3Zm0-5.889Zm0,4.4a4.253,4.253,0,0,0,3.113-1.279,4.234,4.234,0,0,0,1.286-3.12,4.234,4.234,0,0,0-1.286-3.12A4.253,4.253,0,0,0,7.414,3.015,4.251,4.251,0,0,0,4.3,4.294a4.233,4.233,0,0,0-1.286,3.12A4.233,4.233,0,0,0,4.3,10.534,4.251,4.251,0,0,0,7.414,11.813Z"
                          transform="translate(-1.525 -1.525)" fill="#00A3FF" />
                      </svg>
                    </div>
                    <p class="info" style="margin-top: 11px; margin-left: 15px">
                      {{ $perday_routine['starting_hour'] .
                      ':' .
                      $perday_routine['starting_minute'] .
                      ' -
                      ' .
                      $perday_routine['ending_hour'] .
                      ':' .
                      $perday_routine['ending_minute'] }}
                    </p>
                  </li>
                  <li class="classDetails-info d-flex align-items-center" style="margin-top: -22px; margin-left: -33px">
                    <div class="icon">
                      <svg xmlns="http://www.w3.org/2000/svg" width="11.33" height="14.71" viewBox="0 0 13.275 14.944">
                        <g id="user_icon" data-name="user icon" transform="translate(-1368.531 -147.15)">
                          <g id="Ellipse_1" data-name="Ellipse 1" transform="translate(1370.609 147.15)" fill="none"
                            stroke="#00A3FF" stroke-width="2">
                            <ellipse cx="4.576" cy="4.435" rx="4.576" ry="4.435" stroke="none" />
                            <ellipse cx="4.576" cy="4.435" rx="3.576" ry="3.435" fill="none" />
                          </g>
                          <path id="Path_41" data-name="Path 41"
                            d="M1485.186,311.087a5.818,5.818,0,0,1,5.856-4.283,5.534,5.534,0,0,1,5.466,4.283"
                            transform="translate(-115.686 -149.241)" fill="none" stroke="#00A3FF" stroke-width="2" />
                        </g>
                      </svg>
                    </div>
                    <?php $teacher = User::find($perday_routine['routine_creator']); ?>
                    <p class="info" style="margin-top: 11px; margin-left: 15px">
                      {{ $teacher->name }}</p>
                  </li>
                  <li class="classDetails-info d-flex align-items-center" style="margin-top: -22px; margin-left: -35px">
                    <div class="icon">
                      <svg xmlns="http://www.w3.org/2000/svg" width="18.641" height="16.589"
                        viewBox="0 0 18.641 16.589">
                        <path id="house_FILL0_wght400_GRAD0_opsz48"
                          d="M13.263,23.089H8.311a.72.72,0,0,1-.743-.743v-7.18H5.563a.35.35,0,0,1-.347-.235.329.329,0,0,1,.1-.409L14.006,6.7a.718.718,0,0,1,.99,0l4.457,3.937V8.481a.72.72,0,0,1,.743-.743h.5a.72.72,0,0,1,.743.743v3.986l2.253,2.055a.363.363,0,0,1-.248.644H21.434v7.18a.72.72,0,0,1-.743.743H15.739V17.146H13.263ZM9.054,21.6h2.724V16.4a.72.72,0,0,1,.743-.743h3.961a.72.72,0,0,1,.743.743v5.2h2.724V13.16L14.5,8.208,9.054,13.16ZM12.4,12.937h4.209a1.689,1.689,0,0,0-.631-1.349,2.3,2.3,0,0,0-2.946,0A1.689,1.689,0,0,0,12.4,12.937Zm.124,2.724h0Z"
                          transform="translate(-5.183 -6.5)" fill="#00a3ff" />
                      </svg>
                    </div>
                    <?php $class_room = ClassRoom::find($perday_routine['room_id']); ?>
                    <p class="info" style="margin-top: 11px; margin-left: 15px">
                      {{ $class_room->name }}</p>
                  </li>
                </ul>
              </div>
              <?php } ?>
            </div>
          </li>

          <li class="classRoutines-item d-flex align-items-center">
            <h4 class="title">Sunday</h4>
            <div class="classTime-items d-flex">
              <?php $perday_routines = Routine::where(['school_id' => auth()->user()->school_id, 'day' => 'sunday'])->get();
                foreach($perday_routines as $perday_routine) { ?>
              <div class="classTime-item">
                <?php $subject = Subject::find($perday_routine['subject_id']); ?>
                <div class="d-flex">
                  <h4 class="subjectName">{{ $subject->name }}</h4>
                  <div class="btn-group ms-auto">
                    <button type="button" class="icon btn" data-bs-toggle="dropdown" aria-expanded="false">
                      <i class="fa-solid fa-ellipsis-vertical fa-sm" style="color: #000000;"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                      <li>
                        <a class="text-16px ps-2"
                          href="{{ route('admin.routine.edit', ['id' => $perday_routine['id']]) }}">Edit</a>
                      </li>
                      <li>
                        <a class="text-16px ps-2"
                          href="{{ route('admin.routine.delete', ['id' => $perday_routine['id']]) }}">Delete</a>
                      </li>
                    </ul>
                  </div>
                </div>

                <ul class="classDetails">
                  <li class="classDetails-info d-flex align-items-center" style="margin-top: -22px; margin-left: -35px">
                    <div class="icon">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16.03" height="16.03" viewBox="0 0 11.777 11.777">
                        <path id="schedule_FILL0_wght600_GRAD0_opsz24"
                          d="M8.679,9.634a.605.605,0,0,0,.464.2.674.674,0,0,0,.492-.211.679.679,0,0,0,0-.956L8.088,7.119V5.306A.641.641,0,0,0,7.9,4.834a.658.658,0,0,0-.485-.189.643.643,0,0,0-.485.2.662.662,0,0,0-.19.478V7.372a.787.787,0,0,0,.056.3.7.7,0,0,0,.155.239ZM7.414,13.3a5.724,5.724,0,0,1-2.3-.464,5.909,5.909,0,0,1-3.12-3.12,5.724,5.724,0,0,1-.464-2.3,5.724,5.724,0,0,1,.464-2.3,5.909,5.909,0,0,1,3.12-3.12,5.724,5.724,0,0,1,2.3-.464,5.724,5.724,0,0,1,2.3.464,5.9,5.9,0,0,1,3.12,3.12,5.724,5.724,0,0,1,.464,2.3,5.724,5.724,0,0,1-.464,2.3,5.9,5.9,0,0,1-3.12,3.12A5.724,5.724,0,0,1,7.414,13.3Zm0-5.889Zm0,4.4a4.253,4.253,0,0,0,3.113-1.279,4.234,4.234,0,0,0,1.286-3.12,4.234,4.234,0,0,0-1.286-3.12A4.253,4.253,0,0,0,7.414,3.015,4.251,4.251,0,0,0,4.3,4.294a4.233,4.233,0,0,0-1.286,3.12A4.233,4.233,0,0,0,4.3,10.534,4.251,4.251,0,0,0,7.414,11.813Z"
                          transform="translate(-1.525 -1.525)" fill="#00A3FF" />
                      </svg>
                    </div>
                    <p class="info" style="margin-top: 11px; margin-left: 15px">
                      {{ $perday_routine['starting_hour'] .
                      ':' .
                      $perday_routine['starting_minute'] .
                      ' -
                      ' .
                      $perday_routine['ending_hour'] .
                      ':' .
                      $perday_routine['ending_minute'] }}
                    </p>
                  </li>
                  <li class="classDetails-info d-flex align-items-center" style="margin-top: -22px; margin-left: -33px">
                    <div class="icon">
                      <svg xmlns="http://www.w3.org/2000/svg" width="11.33" height="14.71" viewBox="0 0 13.275 14.944">
                        <g id="user_icon" data-name="user icon" transform="translate(-1368.531 -147.15)">
                          <g id="Ellipse_1" data-name="Ellipse 1" transform="translate(1370.609 147.15)" fill="none"
                            stroke="#00A3FF" stroke-width="2">
                            <ellipse cx="4.576" cy="4.435" rx="4.576" ry="4.435" stroke="none" />
                            <ellipse cx="4.576" cy="4.435" rx="3.576" ry="3.435" fill="none" />
                          </g>
                          <path id="Path_41" data-name="Path 41"
                            d="M1485.186,311.087a5.818,5.818,0,0,1,5.856-4.283,5.534,5.534,0,0,1,5.466,4.283"
                            transform="translate(-115.686 -149.241)" fill="none" stroke="#00A3FF" stroke-width="2" />
                        </g>
                      </svg>
                    </div>
                    <?php $teacher = User::find($perday_routine['routine_creator']); ?>
                    <p class="info" style="margin-top: 11px; margin-left: 15px">
                      {{ $teacher->name }}</p>
                  </li>
                  <li class="classDetails-info d-flex align-items-center" style="margin-top: -22px; margin-left: -35px">
                    <div class="icon">
                      <svg xmlns="http://www.w3.org/2000/svg" width="18.641" height="16.589"
                        viewBox="0 0 18.641 16.589">
                        <path id="house_FILL0_wght400_GRAD0_opsz48"
                          d="M13.263,23.089H8.311a.72.72,0,0,1-.743-.743v-7.18H5.563a.35.35,0,0,1-.347-.235.329.329,0,0,1,.1-.409L14.006,6.7a.718.718,0,0,1,.99,0l4.457,3.937V8.481a.72.72,0,0,1,.743-.743h.5a.72.72,0,0,1,.743.743v3.986l2.253,2.055a.363.363,0,0,1-.248.644H21.434v7.18a.72.72,0,0,1-.743.743H15.739V17.146H13.263ZM9.054,21.6h2.724V16.4a.72.72,0,0,1,.743-.743h3.961a.72.72,0,0,1,.743.743v5.2h2.724V13.16L14.5,8.208,9.054,13.16ZM12.4,12.937h4.209a1.689,1.689,0,0,0-.631-1.349,2.3,2.3,0,0,0-2.946,0A1.689,1.689,0,0,0,12.4,12.937Zm.124,2.724h0Z"
                          transform="translate(-5.183 -6.5)" fill="#00a3ff" />
                      </svg>
                    </div>
                    <?php $class_room = ClassRoom::find($perday_routine['room_id']); ?>
                    <p class="info" style="margin-top: 11px; margin-left: 15px">
                      {{ $class_room->name }}</p>
                  </li>
                </ul>
              </div>
              <?php } ?>
            </div>
          </li>

          <li class="classRoutines-item d-flex align-items-center">
            <h4 class="title">Monday</h4>
            <div class="classTime-items d-flex">
              <?php $perday_routines = Routine::where(['school_id' => auth()->user()->school_id, 'day' => 'monday'])->get();
                foreach($perday_routines as $perday_routine) { ?>
              <div class="classTime-item">
                <?php $subject = Subject::find($perday_routine['subject_id']); ?>
                <div class="d-flex">
                  <h4 class="subjectName">{{ $subject->name }}</h4>
                  <div class="btn-group ms-auto">
                    <button type="button" class="icon btn" data-bs-toggle="dropdown" aria-expanded="false">
                      <i class="fa-solid fa-ellipsis-vertical fa-sm" style="color: #000000;"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                      <li>
                        <a class="text-16px ps-2"
                          href="{{ route('admin.routine.edit', ['id' => $perday_routine['id']]) }}">Edit</a>
                      </li>
                      <li>
                        <a class="text-16px ps-2"
                          href="{{ route('admin.routine.delete', ['id' => $perday_routine['id']]) }}">Delete</a>
                      </li>
                    </ul>
                  </div>
                </div>

                <ul class="classDetails">
                  <li class="classDetails-info d-flex align-items-center" style="margin-top: -22px; margin-left: -35px">
                    <div class="icon">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16.03" height="16.03" viewBox="0 0 11.777 11.777">
                        <path id="schedule_FILL0_wght600_GRAD0_opsz24"
                          d="M8.679,9.634a.605.605,0,0,0,.464.2.674.674,0,0,0,.492-.211.679.679,0,0,0,0-.956L8.088,7.119V5.306A.641.641,0,0,0,7.9,4.834a.658.658,0,0,0-.485-.189.643.643,0,0,0-.485.2.662.662,0,0,0-.19.478V7.372a.787.787,0,0,0,.056.3.7.7,0,0,0,.155.239ZM7.414,13.3a5.724,5.724,0,0,1-2.3-.464,5.909,5.909,0,0,1-3.12-3.12,5.724,5.724,0,0,1-.464-2.3,5.724,5.724,0,0,1,.464-2.3,5.909,5.909,0,0,1,3.12-3.12,5.724,5.724,0,0,1,2.3-.464,5.724,5.724,0,0,1,2.3.464,5.9,5.9,0,0,1,3.12,3.12,5.724,5.724,0,0,1,.464,2.3,5.724,5.724,0,0,1-.464,2.3,5.9,5.9,0,0,1-3.12,3.12A5.724,5.724,0,0,1,7.414,13.3Zm0-5.889Zm0,4.4a4.253,4.253,0,0,0,3.113-1.279,4.234,4.234,0,0,0,1.286-3.12,4.234,4.234,0,0,0-1.286-3.12A4.253,4.253,0,0,0,7.414,3.015,4.251,4.251,0,0,0,4.3,4.294a4.233,4.233,0,0,0-1.286,3.12A4.233,4.233,0,0,0,4.3,10.534,4.251,4.251,0,0,0,7.414,11.813Z"
                          transform="translate(-1.525 -1.525)" fill="#00A3FF" />
                      </svg>
                    </div>
                    <p class="info" style="margin-top: 11px; margin-left: 15px">
                      {{ $perday_routine['starting_hour'] .
                      ':' .
                      $perday_routine['starting_minute'] .
                      ' -
                      ' .
                      $perday_routine['ending_hour'] .
                      ':' .
                      $perday_routine['ending_minute'] }}
                    </p>
                  </li>
                  <li class="classDetails-info d-flex align-items-center" style="margin-top: -22px; margin-left: -33px">
                    <div class="icon">
                      <svg xmlns="http://www.w3.org/2000/svg" width="11.33" height="14.71" viewBox="0 0 13.275 14.944">
                        <g id="user_icon" data-name="user icon" transform="translate(-1368.531 -147.15)">
                          <g id="Ellipse_1" data-name="Ellipse 1" transform="translate(1370.609 147.15)" fill="none"
                            stroke="#00A3FF" stroke-width="2">
                            <ellipse cx="4.576" cy="4.435" rx="4.576" ry="4.435" stroke="none" />
                            <ellipse cx="4.576" cy="4.435" rx="3.576" ry="3.435" fill="none" />
                          </g>
                          <path id="Path_41" data-name="Path 41"
                            d="M1485.186,311.087a5.818,5.818,0,0,1,5.856-4.283,5.534,5.534,0,0,1,5.466,4.283"
                            transform="translate(-115.686 -149.241)" fill="none" stroke="#00A3FF" stroke-width="2" />
                        </g>
                      </svg>
                    </div>
                    <?php $teacher = User::find($perday_routine['routine_creator']); ?>
                    <p class="info" style="margin-top: 11px; margin-left: 15px">
                      {{ $teacher->name }}</p>
                  </li>
                  <li class="classDetails-info d-flex align-items-center" style="margin-top: -22px; margin-left: -35px">
                    <div class="icon">
                      <svg xmlns="http://www.w3.org/2000/svg" width="18.641" height="16.589"
                        viewBox="0 0 18.641 16.589">
                        <path id="house_FILL0_wght400_GRAD0_opsz48"
                          d="M13.263,23.089H8.311a.72.72,0,0,1-.743-.743v-7.18H5.563a.35.35,0,0,1-.347-.235.329.329,0,0,1,.1-.409L14.006,6.7a.718.718,0,0,1,.99,0l4.457,3.937V8.481a.72.72,0,0,1,.743-.743h.5a.72.72,0,0,1,.743.743v3.986l2.253,2.055a.363.363,0,0,1-.248.644H21.434v7.18a.72.72,0,0,1-.743.743H15.739V17.146H13.263ZM9.054,21.6h2.724V16.4a.72.72,0,0,1,.743-.743h3.961a.72.72,0,0,1,.743.743v5.2h2.724V13.16L14.5,8.208,9.054,13.16ZM12.4,12.937h4.209a1.689,1.689,0,0,0-.631-1.349,2.3,2.3,0,0,0-2.946,0A1.689,1.689,0,0,0,12.4,12.937Zm.124,2.724h0Z"
                          transform="translate(-5.183 -6.5)" fill="#00a3ff" />
                      </svg>
                    </div>
                    <?php $class_room = ClassRoom::find($perday_routine['room_id']); ?>
                    <p class="info" style="margin-top: 11px; margin-left: 15px">
                      {{ $class_room->name }}</p>
                  </li>
                </ul>
              </div>
              <?php } ?>
            </div>
          </li>

          <li class="classRoutines-item d-flex align-items-center">
            <h4 class="title">Tuesday</h4>
            <div class="classTime-items d-flex">
              <?php $perday_routines = Routine::where(['school_id' => auth()->user()->school_id, 'day' => 'tuesday'])->get();
                foreach($perday_routines as $perday_routine) { ?>
              <div class="classTime-item">
                <?php $subject = Subject::find($perday_routine['subject_id']); ?>
                <div class="d-flex">
                  <h4 class="subjectName">{{ $subject->name }}</h4>
                  <div class="btn-group ms-auto">
                    <button type="button" class="icon btn" data-bs-toggle="dropdown" aria-expanded="false">
                      <i class="fa-solid fa-ellipsis-vertical fa-sm" style="color: #000000;"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                      <li>
                        <a class="text-16px ps-2"
                          href="{{ route('admin.routine.edit', ['id' => $perday_routine['id']]) }}">Edit</a>
                      </li>
                      <li>
                        <a class="text-16px ps-2"
                          href="{{ route('admin.routine.delete', ['id' => $perday_routine['id']]) }}">Delete</a>
                      </li>
                    </ul>
                  </div>
                </div>

                <ul class="classDetails">
                  <li class="classDetails-info d-flex align-items-center" style="margin-top: -22px; margin-left: -35px">
                    <div class="icon">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16.03" height="16.03" viewBox="0 0 11.777 11.777">
                        <path id="schedule_FILL0_wght600_GRAD0_opsz24"
                          d="M8.679,9.634a.605.605,0,0,0,.464.2.674.674,0,0,0,.492-.211.679.679,0,0,0,0-.956L8.088,7.119V5.306A.641.641,0,0,0,7.9,4.834a.658.658,0,0,0-.485-.189.643.643,0,0,0-.485.2.662.662,0,0,0-.19.478V7.372a.787.787,0,0,0,.056.3.7.7,0,0,0,.155.239ZM7.414,13.3a5.724,5.724,0,0,1-2.3-.464,5.909,5.909,0,0,1-3.12-3.12,5.724,5.724,0,0,1-.464-2.3,5.724,5.724,0,0,1,.464-2.3,5.909,5.909,0,0,1,3.12-3.12,5.724,5.724,0,0,1,2.3-.464,5.724,5.724,0,0,1,2.3.464,5.9,5.9,0,0,1,3.12,3.12,5.724,5.724,0,0,1,.464,2.3,5.724,5.724,0,0,1-.464,2.3,5.9,5.9,0,0,1-3.12,3.12A5.724,5.724,0,0,1,7.414,13.3Zm0-5.889Zm0,4.4a4.253,4.253,0,0,0,3.113-1.279,4.234,4.234,0,0,0,1.286-3.12,4.234,4.234,0,0,0-1.286-3.12A4.253,4.253,0,0,0,7.414,3.015,4.251,4.251,0,0,0,4.3,4.294a4.233,4.233,0,0,0-1.286,3.12A4.233,4.233,0,0,0,4.3,10.534,4.251,4.251,0,0,0,7.414,11.813Z"
                          transform="translate(-1.525 -1.525)" fill="#00A3FF" />
                      </svg>
                    </div>
                    <p class="info" style="margin-top: 11px; margin-left: 15px">
                      {{ $perday_routine['starting_hour'] .
                      ':' .
                      $perday_routine['starting_minute'] .
                      ' -
                      ' .
                      $perday_routine['ending_hour'] .
                      ':' .
                      $perday_routine['ending_minute'] }}
                    </p>
                  </li>
                  <li class="classDetails-info d-flex align-items-center" style="margin-top: -22px; margin-left: -33px">
                    <div class="icon">
                      <svg xmlns="http://www.w3.org/2000/svg" width="11.33" height="14.71" viewBox="0 0 13.275 14.944">
                        <g id="user_icon" data-name="user icon" transform="translate(-1368.531 -147.15)">
                          <g id="Ellipse_1" data-name="Ellipse 1" transform="translate(1370.609 147.15)" fill="none"
                            stroke="#00A3FF" stroke-width="2">
                            <ellipse cx="4.576" cy="4.435" rx="4.576" ry="4.435" stroke="none" />
                            <ellipse cx="4.576" cy="4.435" rx="3.576" ry="3.435" fill="none" />
                          </g>
                          <path id="Path_41" data-name="Path 41"
                            d="M1485.186,311.087a5.818,5.818,0,0,1,5.856-4.283,5.534,5.534,0,0,1,5.466,4.283"
                            transform="translate(-115.686 -149.241)" fill="none" stroke="#00A3FF" stroke-width="2" />
                        </g>
                      </svg>
                    </div>
                    <?php $teacher = User::find($perday_routine['routine_creator']); ?>
                    <p class="info" style="margin-top: 11px; margin-left: 15px">
                      {{ $teacher->name }}</p>
                  </li>
                  <li class="classDetails-info d-flex align-items-center" style="margin-top: -22px; margin-left: -35px">
                    <div class="icon">
                      <svg xmlns="http://www.w3.org/2000/svg" width="18.641" height="16.589"
                        viewBox="0 0 18.641 16.589">
                        <path id="house_FILL0_wght400_GRAD0_opsz48"
                          d="M13.263,23.089H8.311a.72.72,0,0,1-.743-.743v-7.18H5.563a.35.35,0,0,1-.347-.235.329.329,0,0,1,.1-.409L14.006,6.7a.718.718,0,0,1,.99,0l4.457,3.937V8.481a.72.72,0,0,1,.743-.743h.5a.72.72,0,0,1,.743.743v3.986l2.253,2.055a.363.363,0,0,1-.248.644H21.434v7.18a.72.72,0,0,1-.743.743H15.739V17.146H13.263ZM9.054,21.6h2.724V16.4a.72.72,0,0,1,.743-.743h3.961a.72.72,0,0,1,.743.743v5.2h2.724V13.16L14.5,8.208,9.054,13.16ZM12.4,12.937h4.209a1.689,1.689,0,0,0-.631-1.349,2.3,2.3,0,0,0-2.946,0A1.689,1.689,0,0,0,12.4,12.937Zm.124,2.724h0Z"
                          transform="translate(-5.183 -6.5)" fill="#00a3ff" />
                      </svg>
                    </div>
                    <?php $class_room = ClassRoom::find($perday_routine['room_id']); ?>
                    <p class="info" style="margin-top: 11px; margin-left: 15px">
                      {{ $class_room->name }}</p>
                  </li>
                </ul>
              </div>
              <?php } ?>
            </div>
          </li>

          <li class="classRoutines-item d-flex align-items-center">
            <h4 class="title">Wednesday</h4>
            <div class="classTime-items d-flex">
              <?php $perday_routines = Routine::where(['school_id' => auth()->user()->school_id, 'day' => 'wednesday'])->get();
                foreach($perday_routines as $perday_routine) { ?>
              <div class="classTime-item">
                <?php $subject = Subject::find($perday_routine['subject_id']); ?>
                <div class="d-flex">
                  <h4 class="subjectName">{{ $subject->name }}</h4>
                  <div class="btn-group ms-auto">
                    <button type="button" class="icon btn" data-bs-toggle="dropdown" aria-expanded="false">
                      <i class="fa-solid fa-ellipsis-vertical fa-sm" style="color: #000000;"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                      <li>
                        <a class="text-16px ps-2"
                          href="{{ route('admin.routine.edit', ['id' => $perday_routine['id']]) }}">Edit</a>
                      </li>
                      <li>
                        <a class="text-16px ps-2"
                          href="{{ route('admin.routine.delete', ['id' => $perday_routine['id']]) }}">Delete</a>
                      </li>
                    </ul>
                  </div>
                </div>

                <ul class="classDetails">
                  <li class="classDetails-info d-flex align-items-center" style="margin-top: -22px; margin-left: -35px">
                    <div class="icon">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16.03" height="16.03" viewBox="0 0 11.777 11.777">
                        <path id="schedule_FILL0_wght600_GRAD0_opsz24"
                          d="M8.679,9.634a.605.605,0,0,0,.464.2.674.674,0,0,0,.492-.211.679.679,0,0,0,0-.956L8.088,7.119V5.306A.641.641,0,0,0,7.9,4.834a.658.658,0,0,0-.485-.189.643.643,0,0,0-.485.2.662.662,0,0,0-.19.478V7.372a.787.787,0,0,0,.056.3.7.7,0,0,0,.155.239ZM7.414,13.3a5.724,5.724,0,0,1-2.3-.464,5.909,5.909,0,0,1-3.12-3.12,5.724,5.724,0,0,1-.464-2.3,5.724,5.724,0,0,1,.464-2.3,5.909,5.909,0,0,1,3.12-3.12,5.724,5.724,0,0,1,2.3-.464,5.724,5.724,0,0,1,2.3.464,5.9,5.9,0,0,1,3.12,3.12,5.724,5.724,0,0,1,.464,2.3,5.724,5.724,0,0,1-.464,2.3,5.9,5.9,0,0,1-3.12,3.12A5.724,5.724,0,0,1,7.414,13.3Zm0-5.889Zm0,4.4a4.253,4.253,0,0,0,3.113-1.279,4.234,4.234,0,0,0,1.286-3.12,4.234,4.234,0,0,0-1.286-3.12A4.253,4.253,0,0,0,7.414,3.015,4.251,4.251,0,0,0,4.3,4.294a4.233,4.233,0,0,0-1.286,3.12A4.233,4.233,0,0,0,4.3,10.534,4.251,4.251,0,0,0,7.414,11.813Z"
                          transform="translate(-1.525 -1.525)" fill="#00A3FF" />
                      </svg>
                    </div>
                    <p class="info" style="margin-top: 11px; margin-left: 15px">
                      {{ $perday_routine['starting_hour'] .
                      ':' .
                      $perday_routine['starting_minute'] .
                      ' -
                      ' .
                      $perday_routine['ending_hour'] .
                      ':' .
                      $perday_routine['ending_minute'] }}
                    </p>
                  </li>
                  <li class="classDetails-info d-flex align-items-center" style="margin-top: -22px; margin-left: -33px">
                    <div class="icon">
                      <svg xmlns="http://www.w3.org/2000/svg" width="11.33" height="14.71" viewBox="0 0 13.275 14.944">
                        <g id="user_icon" data-name="user icon" transform="translate(-1368.531 -147.15)">
                          <g id="Ellipse_1" data-name="Ellipse 1" transform="translate(1370.609 147.15)" fill="none"
                            stroke="#00A3FF" stroke-width="2">
                            <ellipse cx="4.576" cy="4.435" rx="4.576" ry="4.435" stroke="none" />
                            <ellipse cx="4.576" cy="4.435" rx="3.576" ry="3.435" fill="none" />
                          </g>
                          <path id="Path_41" data-name="Path 41"
                            d="M1485.186,311.087a5.818,5.818,0,0,1,5.856-4.283,5.534,5.534,0,0,1,5.466,4.283"
                            transform="translate(-115.686 -149.241)" fill="none" stroke="#00A3FF" stroke-width="2" />
                        </g>
                      </svg>
                    </div>
                    <?php $teacher = User::find($perday_routine['routine_creator']); ?>
                    <p class="info" style="margin-top: 11px; margin-left: 15px">
                      {{ $teacher->name }}</p>
                  </li>
                  <li class="classDetails-info d-flex align-items-center" style="margin-top: -22px; margin-left: -35px">
                    <div class="icon">
                      <svg xmlns="http://www.w3.org/2000/svg" width="18.641" height="16.589"
                        viewBox="0 0 18.641 16.589">
                        <path id="house_FILL0_wght400_GRAD0_opsz48"
                          d="M13.263,23.089H8.311a.72.72,0,0,1-.743-.743v-7.18H5.563a.35.35,0,0,1-.347-.235.329.329,0,0,1,.1-.409L14.006,6.7a.718.718,0,0,1,.99,0l4.457,3.937V8.481a.72.72,0,0,1,.743-.743h.5a.72.72,0,0,1,.743.743v3.986l2.253,2.055a.363.363,0,0,1-.248.644H21.434v7.18a.72.72,0,0,1-.743.743H15.739V17.146H13.263ZM9.054,21.6h2.724V16.4a.72.72,0,0,1,.743-.743h3.961a.72.72,0,0,1,.743.743v5.2h2.724V13.16L14.5,8.208,9.054,13.16ZM12.4,12.937h4.209a1.689,1.689,0,0,0-.631-1.349,2.3,2.3,0,0,0-2.946,0A1.689,1.689,0,0,0,12.4,12.937Zm.124,2.724h0Z"
                          transform="translate(-5.183 -6.5)" fill="#00a3ff" />
                      </svg>
                    </div>
                    <?php $class_room = ClassRoom::find($perday_routine['room_id']); ?>
                    <p class="info" style="margin-top: 11px; margin-left: 15px">
                      {{ $class_room->name }}</p>
                  </li>
                </ul>
              </div>
              <?php } ?>
            </div>
          </li>

          <li class="classRoutines-item d-flex align-items-center">
            <h4 class="title">Thursday</h4>
            <div class="classTime-items d-flex">
              <?php $perday_routines = Routine::where(['school_id' => auth()->user()->school_id, 'day' => 'thursday'])->get();
                foreach($perday_routines as $perday_routine) { ?>
              <div class="classTime-item">
                <?php $subject = Subject::find($perday_routine['subject_id']); ?>
                <div class="d-flex">
                  <h4 class="subjectName">{{ $subject->name }}</h4>
                  <div class="btn-group ms-auto">
                    <button type="button" class="icon btn" data-bs-toggle="dropdown" aria-expanded="false">
                      <i class="fa-solid fa-ellipsis-vertical fa-sm" style="color: #000000;"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                      <li>
                        <a class="text-16px ps-2"
                          href="{{ route('admin.routine.edit', ['id' => $perday_routine['id']]) }}">Edit</a>
                      </li>
                      <li>
                        <a class="text-16px ps-2"
                          href="{{ route('admin.routine.delete', ['id' => $perday_routine['id']]) }}">Delete</a>
                      </li>
                    </ul>
                  </div>
                </div>

                <ul class="classDetails">
                  <li class="classDetails-info d-flex align-items-center" style="margin-top: -22px; margin-left: -35px">
                    <div class="icon">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16.03" height="16.03" viewBox="0 0 11.777 11.777">
                        <path id="schedule_FILL0_wght600_GRAD0_opsz24"
                          d="M8.679,9.634a.605.605,0,0,0,.464.2.674.674,0,0,0,.492-.211.679.679,0,0,0,0-.956L8.088,7.119V5.306A.641.641,0,0,0,7.9,4.834a.658.658,0,0,0-.485-.189.643.643,0,0,0-.485.2.662.662,0,0,0-.19.478V7.372a.787.787,0,0,0,.056.3.7.7,0,0,0,.155.239ZM7.414,13.3a5.724,5.724,0,0,1-2.3-.464,5.909,5.909,0,0,1-3.12-3.12,5.724,5.724,0,0,1-.464-2.3,5.724,5.724,0,0,1,.464-2.3,5.909,5.909,0,0,1,3.12-3.12,5.724,5.724,0,0,1,2.3-.464,5.724,5.724,0,0,1,2.3.464,5.9,5.9,0,0,1,3.12,3.12,5.724,5.724,0,0,1,.464,2.3,5.724,5.724,0,0,1-.464,2.3,5.9,5.9,0,0,1-3.12,3.12A5.724,5.724,0,0,1,7.414,13.3Zm0-5.889Zm0,4.4a4.253,4.253,0,0,0,3.113-1.279,4.234,4.234,0,0,0,1.286-3.12,4.234,4.234,0,0,0-1.286-3.12A4.253,4.253,0,0,0,7.414,3.015,4.251,4.251,0,0,0,4.3,4.294a4.233,4.233,0,0,0-1.286,3.12A4.233,4.233,0,0,0,4.3,10.534,4.251,4.251,0,0,0,7.414,11.813Z"
                          transform="translate(-1.525 -1.525)" fill="#00A3FF" />
                      </svg>
                    </div>
                    <p class="info" style="margin-top: 11px; margin-left: 15px">
                      {{ $perday_routine['starting_hour'] .
                      ':' .
                      $perday_routine['starting_minute'] .
                      ' -
                      ' .
                      $perday_routine['ending_hour'] .
                      ':' .
                      $perday_routine['ending_minute'] }}
                    </p>
                  </li>
                  <li class="classDetails-info d-flex align-items-center" style="margin-top: -22px; margin-left: -33px">
                    <div class="icon">
                      <svg xmlns="http://www.w3.org/2000/svg" width="11.33" height="14.71" viewBox="0 0 13.275 14.944">
                        <g id="user_icon" data-name="user icon" transform="translate(-1368.531 -147.15)">
                          <g id="Ellipse_1" data-name="Ellipse 1" transform="translate(1370.609 147.15)" fill="none"
                            stroke="#00A3FF" stroke-width="2">
                            <ellipse cx="4.576" cy="4.435" rx="4.576" ry="4.435" stroke="none" />
                            <ellipse cx="4.576" cy="4.435" rx="3.576" ry="3.435" fill="none" />
                          </g>
                          <path id="Path_41" data-name="Path 41"
                            d="M1485.186,311.087a5.818,5.818,0,0,1,5.856-4.283,5.534,5.534,0,0,1,5.466,4.283"
                            transform="translate(-115.686 -149.241)" fill="none" stroke="#00A3FF" stroke-width="2" />
                        </g>
                      </svg>
                    </div>
                    <?php $teacher = User::find($perday_routine['routine_creator']); ?>
                    <p class="info" style="margin-top: 11px; margin-left: 15px">
                      {{ $teacher->name }}</p>
                  </li>
                  <li class="classDetails-info d-flex align-items-center" style="margin-top: -22px; margin-left: -35px">
                    <div class="icon">
                      <svg xmlns="http://www.w3.org/2000/svg" width="18.641" height="16.589"
                        viewBox="0 0 18.641 16.589">
                        <path id="house_FILL0_wght400_GRAD0_opsz48"
                          d="M13.263,23.089H8.311a.72.72,0,0,1-.743-.743v-7.18H5.563a.35.35,0,0,1-.347-.235.329.329,0,0,1,.1-.409L14.006,6.7a.718.718,0,0,1,.99,0l4.457,3.937V8.481a.72.72,0,0,1,.743-.743h.5a.72.72,0,0,1,.743.743v3.986l2.253,2.055a.363.363,0,0,1-.248.644H21.434v7.18a.72.72,0,0,1-.743.743H15.739V17.146H13.263ZM9.054,21.6h2.724V16.4a.72.72,0,0,1,.743-.743h3.961a.72.72,0,0,1,.743.743v5.2h2.724V13.16L14.5,8.208,9.054,13.16ZM12.4,12.937h4.209a1.689,1.689,0,0,0-.631-1.349,2.3,2.3,0,0,0-2.946,0A1.689,1.689,0,0,0,12.4,12.937Zm.124,2.724h0Z"
                          transform="translate(-5.183 -6.5)" fill="#00a3ff" />
                      </svg>
                    </div>
                    <?php $class_room = ClassRoom::find($perday_routine['room_id']); ?>
                    <p class="info" style="margin-top: 11px; margin-left: 15px">
                      {{ $class_room->name }}</p>
                  </li>
                </ul>
              </div>
              <?php } ?>
            </div>
          </li>

          <li class="classRoutines-item d-flex align-items-center">
            <h4 class="title">Friday</h4>
            <div class="classTime-items d-flex">
              <?php $perday_routines = Routine::where(['school_id' => auth()->user()->school_id, 'day' => 'friday'])->get();
                foreach($perday_routines as $perday_routine) { ?>
              <div class="classTime-item">
                <?php $subject = Subject::find($perday_routine['subject_id']); ?>
                <div class="d-flex">
                  <h4 class="subjectName">{{ $subject->name }}</h4>
                  <div class="btn-group ms-auto">
                    <button type="button" class="icon btn" data-bs-toggle="dropdown" aria-expanded="false">
                      <i class="fa-solid fa-ellipsis-vertical fa-sm" style="color: #000000;"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                      <li>
                        <a class="text-16px ps-2"
                          href="{{ route('admin.routine.edit', ['id' => $perday_routine['id']]) }}">Edit</a>
                      </li>
                      <li>
                        <a class="text-16px ps-2"
                          href="{{ route('admin.routine.delete', ['id' => $perday_routine['id']]) }}">Delete</a>
                      </li>
                    </ul>
                  </div>
                </div>

                <ul class="classDetails">
                  <li class="classDetails-info d-flex align-items-center" style="margin-top: -22px; margin-left: -35px">
                    <div class="icon">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16.03" height="16.03" viewBox="0 0 11.777 11.777">
                        <path id="schedule_FILL0_wght600_GRAD0_opsz24"
                          d="M8.679,9.634a.605.605,0,0,0,.464.2.674.674,0,0,0,.492-.211.679.679,0,0,0,0-.956L8.088,7.119V5.306A.641.641,0,0,0,7.9,4.834a.658.658,0,0,0-.485-.189.643.643,0,0,0-.485.2.662.662,0,0,0-.19.478V7.372a.787.787,0,0,0,.056.3.7.7,0,0,0,.155.239ZM7.414,13.3a5.724,5.724,0,0,1-2.3-.464,5.909,5.909,0,0,1-3.12-3.12,5.724,5.724,0,0,1-.464-2.3,5.724,5.724,0,0,1,.464-2.3,5.909,5.909,0,0,1,3.12-3.12,5.724,5.724,0,0,1,2.3-.464,5.724,5.724,0,0,1,2.3.464,5.9,5.9,0,0,1,3.12,3.12,5.724,5.724,0,0,1,.464,2.3,5.724,5.724,0,0,1-.464,2.3,5.9,5.9,0,0,1-3.12,3.12A5.724,5.724,0,0,1,7.414,13.3Zm0-5.889Zm0,4.4a4.253,4.253,0,0,0,3.113-1.279,4.234,4.234,0,0,0,1.286-3.12,4.234,4.234,0,0,0-1.286-3.12A4.253,4.253,0,0,0,7.414,3.015,4.251,4.251,0,0,0,4.3,4.294a4.233,4.233,0,0,0-1.286,3.12A4.233,4.233,0,0,0,4.3,10.534,4.251,4.251,0,0,0,7.414,11.813Z"
                          transform="translate(-1.525 -1.525)" fill="#00A3FF" />
                      </svg>
                    </div>
                    <p class="info" style="margin-top: 11px; margin-left: 15px">
                      {{ $perday_routine['starting_hour'] .
                      ':' .
                      $perday_routine['starting_minute'] .
                      ' -
                      ' .
                      $perday_routine['ending_hour'] .
                      ':' .
                      $perday_routine['ending_minute'] }}
                    </p>
                  </li>
                  <li class="classDetails-info d-flex align-items-center" style="margin-top: -22px; margin-left: -33px">
                    <div class="icon">
                      <svg xmlns="http://www.w3.org/2000/svg" width="11.33" height="14.71" viewBox="0 0 13.275 14.944">
                        <g id="user_icon" data-name="user icon" transform="translate(-1368.531 -147.15)">
                          <g id="Ellipse_1" data-name="Ellipse 1" transform="translate(1370.609 147.15)" fill="none"
                            stroke="#00A3FF" stroke-width="2">
                            <ellipse cx="4.576" cy="4.435" rx="4.576" ry="4.435" stroke="none" />
                            <ellipse cx="4.576" cy="4.435" rx="3.576" ry="3.435" fill="none" />
                          </g>
                          <path id="Path_41" data-name="Path 41"
                            d="M1485.186,311.087a5.818,5.818,0,0,1,5.856-4.283,5.534,5.534,0,0,1,5.466,4.283"
                            transform="translate(-115.686 -149.241)" fill="none" stroke="#00A3FF" stroke-width="2" />
                        </g>
                      </svg>
                    </div>
                    <?php $teacher = User::find($perday_routine['routine_creator']); ?>
                    <p class="info" style="margin-top: 11px; margin-left: 15px">
                      {{ $teacher->name }}</p>
                  </li>
                  <li class="classDetails-info d-flex align-items-center" style="margin-top: -22px; margin-left: -35px">
                    <div class="icon">
                      <svg xmlns="http://www.w3.org/2000/svg" width="18.641" height="16.589"
                        viewBox="0 0 18.641 16.589">
                        <path id="house_FILL0_wght400_GRAD0_opsz48"
                          d="M13.263,23.089H8.311a.72.72,0,0,1-.743-.743v-7.18H5.563a.35.35,0,0,1-.347-.235.329.329,0,0,1,.1-.409L14.006,6.7a.718.718,0,0,1,.99,0l4.457,3.937V8.481a.72.72,0,0,1,.743-.743h.5a.72.72,0,0,1,.743.743v3.986l2.253,2.055a.363.363,0,0,1-.248.644H21.434v7.18a.72.72,0,0,1-.743.743H15.739V17.146H13.263ZM9.054,21.6h2.724V16.4a.72.72,0,0,1,.743-.743h3.961a.72.72,0,0,1,.743.743v5.2h2.724V13.16L14.5,8.208,9.054,13.16ZM12.4,12.937h4.209a1.689,1.689,0,0,0-.631-1.349,2.3,2.3,0,0,0-2.946,0A1.689,1.689,0,0,0,12.4,12.937Zm.124,2.724h0Z"
                          transform="translate(-5.183 -6.5)" fill="#00a3ff" />
                      </svg>
                    </div>
                    <?php $class_room = ClassRoom::find($perday_routine['room_id']); ?>
                    <p class="info" style="margin-top: 11px; margin-left: 15px">
                      {{ $class_room->name }}</p>
                  </li>
                </ul>
              </div>
              <?php } ?>
            </div>
          </li>
        </ul>
      </div>
    </section>
    {{-- Footer --}}
    @include('layouts.footer')
  </main>
</x-layouts.base>