@include('teacher.topbar')
<nav id="sidebarMenu" class="sidebar d-lg-block bg-gray-800 text-white collapse" data-simplebar>
  <div class="sidebar-inner px-2 pt-3">
      <div
          class="user-card d-flex d-md-none align-items-center justify-content-between justify-content-md-center pb-4">
          <div class="d-flex align-items-center">
              <div class="avatar-lg me-4">
                  <img src="/assets/img/team/profile-picture-3.jpg" class="card-img-top rounded-circle border-white"
                      alt="Bonnie Green">
              </div>
              <div class="d-block">
                  <h2 class="h5 mb-3">Hi, Jane</h2>
                  <a href="/login" class="btn btn-secondary btn-sm d-inline-flex align-items-center">
                      <svg class="icon icon-xxs me-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                          xmlns="http://www.w3.org/2000/svg">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                          </path>
                      </svg>
                      Sign Out
                  </a>
              </div>
          </div>
          <div class="collapse-close d-md-none">
              <a href="#sidebarMenu" data-bs-toggle="collapse" data-bs-target="#sidebarMenu"
                  aria-controls="sidebarMenu" aria-expanded="true" aria-label="Toggle navigation">
                  <svg class="icon icon-xs" fill="currentColor" viewBox="0 0 20 20"
                      xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd"
                          d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                          clip-rule="evenodd"></path>
                  </svg>
              </a>
          </div>
      </div>
      <ul class="nav flex-column pt-3 pt-md-0">
          <li class="nav-item">
              <a href="#" class="nav-link d-flex align-items-center">
                  <span class="sidebar-icon me-3">
                      <img src="/assets/uploads/logo/blue gradient.png" height="25" width="25" alt="Volt Logo">
                  </span>
                  <span class="mt-1 ms-1 sidebar-text">
                      Paramount
                  </span>
              </a>
          </li>
          <li class="nav-item {{ request()->is('teacher/dashboard') ? 'showMenu' : '' }}">
              <a href="{{ route('teacher.dashboard') }}" class="nav-link">
                  <span class="sidebar-icon"> <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"
                          xmlns="http://www.w3.org/2000/svg">
                          <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                          <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                      </svg></span></span>
                  <span class="sidebar-text">Dashboard</span>
              </a>
          </li>

          <li class="nav-item">
            <span
                class="nav-link {{ request()->is('teacher/routine*') || request()->is('teacher/syllabus*') || request()->is('teacher/subject*') ? 'showMenu' : '' }} d-flex justify-content-between align-items-center"
                data-bs-toggle="collapse" data-bs-target="#submenu-apps">
                <span>
                    <span class="sidebar-icon"><svg class="icon icon-xs me-2" fill="currentColor"
                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M5 4a3 3 0 00-3 3v6a3 3 0 003 3h10a3 3 0 003-3V7a3 3 0 00-3-3H5zm-1 9v-1h5v2H5a1 1 0 01-1-1zm7 1h4a1 1 0 001-1v-1h-5v2zm0-4h5V8h-5v2zM9 8H4v2h5V8z"
                                clip-rule="evenodd"></path>
                        </svg></span>
                    <span class="sidebar-text">Academic</span>
                </span>
                <span class="link-arrow"><svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                            clip-rule="evenodd"></path>
                    </svg></span>
            </span>
            <div class="multi-level collapse" role="list" id="submenu-apps" aria-expanded="false">
                <ul class="flex-column nav">

                    <li class="nav-item {{ request()->is('teacher/routine*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('teacher.routine') }}"><small class="sidebar-text">
                                Class Routine
                            </small></a>
                    </li>
                    <li class="nav-item {{ request()->is('teacher/subject*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('teacher.subject_list') }}"><small class="sidebar-text">
                                Subjects
                            </small></a>
                    </li>
                    <li class="nav-item {{ request()->is('teacher/syllabus*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('teacher.syllabus_list') }}"><small class="sidebar-text">
                                Syllabus
                            </small>
                        </a>
                    </li>
                </ul>
            </div>
        </li>

          <li class="nav-item">
              <span
                  class="nav-link collapsed d-flex justify-content-between align-items-center {{ request()->is('teacher/marks') || request()->is('teacher/grade') ? 'showMenu' : '' }}"
                  data-bs-toggle="collapse" data-bs-target="#submenu-app" aria-expanded="false">
                  <span>
                      <span class="sidebar-icon"><svg class="icon icon-xs me-2" fill="currentColor"
                              viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                              <path fill-rule="evenodd"
                                  d="M5 4a3 3 0 00-3 3v6a3 3 0 003 3h10a3 3 0 003-3V7a3 3 0 00-3-3H5zm-1 9v-1h5v2H5a1 1 0 01-1-1zm7 1h4a1 1 0 001-1v-1h-5v2zm0-4h5V8h-5v2zM9 8H4v2h5V8z"
                                  clip-rule="evenodd"></path>
                          </svg></span>
                      <span class="sidebar-text">Examination</span>
                  </span>
                  <span class="link-arrow"><svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20"
                          xmlns="http://www.w3.org/2000/svg">
                          <path fill-rule="evenodd"
                              d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                              clip-rule="evenodd"></path>
                      </svg></span>
              </span>
              <div class="multi-level collapse" role="list" id="submenu-app" aria-expanded="false">
                  <ul class="flex-column nav">
                      <li class="nav-item {{ request()->is('teacher/marks') ? 'active' : '' }}">
                          <a class="nav-link" href="{{ route('teacher.marks') }}"><small
                                  class="sidebar-text">Marks</small></a>
                      </li>
                      <li class="nav-item {{ request()->is('teacher/grade') ? 'active' : '' }}">
                          <a class="nav-link" href="{{ route('teacher.grade_list') }}"><small class="sidebar-text">Grades</small></a>
                      </li>
                  </ul>
              </div>
          </li>

          <li class="nav-item">
              <span class="nav-link collapsed d-flex justify-content-between align-items-center"
                  data-bs-toggle="collapse" data-bs-target="#submenu-pages">
                  <span>
                      <span class="sidebar-icon"><svg class="icon icon-xs me-2" fill="currentColor"
                              viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                              <path fill-rule="evenodd"
                                  d="M2 5a2 2 0 012-2h8a2 2 0 012 2v10a2 2 0 002 2H4a2 2 0 01-2-2V5zm3 1h6v4H5V6zm6 6H5v2h6v-2z"
                                  clip-rule="evenodd"></path>
                              <path d="M15 7h1a2 2 0 012 2v5.5a1.5 1.5 0 01-3 0V7z"></path>
                          </svg></span>
                      <span class="sidebar-text">User Profile</span>
                  </span>
                  <span class="link-arrow"><svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20"
                          xmlns="http://www.w3.org/2000/svg">
                          <path fill-rule="evenodd"
                              d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                              clip-rule="evenodd"></path>
                      </svg></span>
              </span>

              <div class="multi-level collapse" role="list" id="submenu-pages" aria-expanded="false">
                  <ul class="flex-column nav">
                      <li class="nav-item">
                          <a class="nav-link" href="{{ route('teacher.profile') }}">
                              <small class="sidebar-text">Profile</small>
                          </a>
                      </li>
                  </ul>
              </div>
          </li>
      </ul>
  </div>
</nav>
