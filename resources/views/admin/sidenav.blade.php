
@include('admin.topbar')
<nav id="sidebarMenu" class="sidebar d-lg-block bg-gray-800 text-white collapse" data-simplebar>
  <div class="sidebar-inner px-2 pt-3">
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
      <li class="nav-item {{ request()->is('admin/dashboard') ? 'showMenu' : '' }}">
        <a href="{{ route('admin.dashboard') }}" class="nav-link">
          <span class="sidebar-icon"> <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
              <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
            </svg></span></span>
          <span class="sidebar-text">Dashboard</span>
        </a>
      </li>

      <li class="nav-item">
        <span class="nav-link collapsed d-flex justify-content-between align-items-center {{ request()->is('admin/admin*') || request()->is('admin/teacher*') || request()->is('admin/guardian') || request()->is('admin/student') ? 'showMenu' : '' }}" data-bs-toggle="collapse" data-bs-target="#submenu-laravel" aria-expanded="false">
          <span>
            <span class="sidebar-icon"><i class="fab fa-laravel me-2" style="color: #fb503b;"></i></span>
            <span class="sidebar-text" style="color: #fb503b;" onclick="">Users</span>
          </span>
          <span class="link-arrow"><svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
            </svg></span>
        </span>
        <div class="multi-level collapse { show }" role="list" id="submenu-laravel" aria-expanded="false">
          <ul class="flex-column nav">
            <li class="nav-item  {{ request()->is('admin/admin*') ? 'active' : '' }}"><a  class="nav-link" href="{{ route('admin.admin') }}"><small class="sidebar-text">
                  Admin
                </small></a>
            </li>
            <li class="nav-item {{ request()->is('admin/teacher*') ? 'active' : '' }}">
              <a class="nav-link" href="{{ route('admin.teacher') }}"><small class="sidebar-text">
                  Teacher
                </small></a>
            </li>
            <li class="nav-item {{ request()->is('admin/guardian') ? 'active' : '' }}">
              <a class="nav-link" href="{{ route('admin.guardian') }}"><small class="sidebar-text">
                  Parent
                </small></a>
            </li>
            <li class="nav-item {{ request()->is('admin/student') ? 'active' : '' }}">
              <a class="nav-link" href="{{ route('admin.student') }}"><small class="sidebar-text">
                  Student
                </small></a>
            </li>
          </ul>
        </div>
      </li>


      <li class="nav-item">
        <span class="nav-link collapsed d-flex justify-content-between align-items-center {{ request()->is('admin/marks') || request()->is('admin/grade') ? 'showMenu' : '' }}" data-bs-toggle="collapse" data-bs-target="#submenu-app" aria-expanded="false">
          <span>
            <span class="sidebar-icon"><svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M5 4a3 3 0 00-3 3v6a3 3 0 003 3h10a3 3 0 003-3V7a3 3 0 00-3-3H5zm-1 9v-1h5v2H5a1 1 0 01-1-1zm7 1h4a1 1 0 001-1v-1h-5v2zm0-4h5V8h-5v2zM9 8H4v2h5V8z" clip-rule="evenodd"></path>
              </svg></span>
            <span class="sidebar-text">Examination</span>
          </span>
          <span class="link-arrow"><svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
            </svg></span>
        </span>
        <div class="multi-level collapse" role="list" id="submenu-app" aria-expanded="false">
          <ul class="flex-column nav">
            <li class="nav-item {{ request()->is('admin/exam') ? 'active' : '' }}">
              <a class="nav-link" href="{{ route('admin.exam') }}"><small class="sidebar-text">Exam</small></a>
            </li>
            <li class="nav-item {{ request()->is('admin/marks') ? 'active' : '' }}">
              <a class="nav-link" href="{{ route('admin.marks') }}"><small class="sidebar-text">Marks</small></a>
            </li>
            <li class="nav-item {{ request()->is('admin/grade') ? 'active' : '' }}">
              <a class="nav-link" href="{{ route('admin.grade') }}"><small class="sidebar-text">Grades</small></a>
            </li>
          </ul>
        </div>
      </li>

      <li class="nav-item">
        <span class="nav-link {{ request()->is('admin/routine*') || request()->is('admin/subject*') || request()->is('admin/syllabus*') || request()->is('admin/grade*') || request()->is('admin/class*') ? 'showMenu' : '' }} d-flex justify-content-between align-items-center" data-bs-toggle="collapse" data-bs-target="#submenu-apps">
          <span>
            <span class="sidebar-icon"><svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M5 4a3 3 0 00-3 3v6a3 3 0 003 3h10a3 3 0 003-3V7a3 3 0 00-3-3H5zm-1 9v-1h5v2H5a1 1 0 01-1-1zm7 1h4a1 1 0 001-1v-1h-5v2zm0-4h5V8h-5v2zM9 8H4v2h5V8z" clip-rule="evenodd"></path>
              </svg></span>
            <span class="sidebar-text">Academic</span>
          </span>
          <span class="link-arrow"><svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
            </svg></span>
        </span>
        <div class="multi-level collapse" role="list" id="submenu-apps" aria-expanded="false">
          <ul class="flex-column nav">

            <li class="nav-item {{ request()->is('admin/routine*') ? 'active' : '' }}">
              <a class="nav-link" href="{{ route('admin.routine') }}"><small class="sidebar-text">
                  Class Routine
                </small></a>
            </li>
            <li class="nav-item {{ request()->is('admin/subject*') ? 'active' : '' }}">
              <a class="nav-link" href="{{ route('admin.subject') }}"><small class="sidebar-text">
                  Subjects
                </small></a>
            </li>
            <li class="nav-item {{ request()->is('admin/grade*') ? 'active' : '' }}">
              <a class="nav-link" href="{{ route('admin.grade') }}"><small class="sidebar-text">Grade</small>
              </a>
            </li>
            <li class="nav-item {{ request()->is('admin/syllabus*') ? 'active' : '' }}">
              <a class="nav-link" href="{{ route('admin.syllabus') }}"><small class="sidebar-text">
                  Syllabus
                </small>
              </a>
            </li>
            <li class="nav-item {{ request()->is('admin/class*') ? 'active' : '' }}">
              <a class="nav-link" href="{{ route('admin.class') }}"><small class="sidebar-text">
                  Class List
                </small>
              </a>
            </li>
          </ul>
        </div>
      </li>

      <li class="nav-item">
        <span class="nav-link collapsed d-flex justify-content-between align-items-center" data-bs-toggle="collapse" data-bs-target="#submenu-pages">
          <span>
            <span class="sidebar-icon"><svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M2 5a2 2 0 012-2h8a2 2 0 012 2v10a2 2 0 002 2H4a2 2 0 01-2-2V5zm3 1h6v4H5V6zm6 6H5v2h6v-2z" clip-rule="evenodd"></path>
                <path d="M15 7h1a2 2 0 012 2v5.5a1.5 1.5 0 01-3 0V7z"></path>
              </svg></span>
            <span class="sidebar-text">Profile</span>
          </span>
          <span class="link-arrow"><svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
            </svg></span>
        </span>

        <div class="multi-level collapse" role="list" id="submenu-pages" aria-expanded="false">
          <ul class="flex-column nav">
            <li class="nav-item">
              <a class="nav-link" href="{{ route('admin.profile') }}">
                <small class="sidebar-text">Profile</small>
              </a>
            </li>
          </ul>
        </div>
      </li>

      <li class="nav-item">
        <span class="nav-link {{ request()->is('admin/school*') ? 'showMenu' : '' }} d-flex justify-content-between align-items-center" data-bs-toggle="collapse" data-bs-target="#submenu-appss">
          <span>
            <span class="sidebar-icon"><svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M5 4a3 3 0 00-3 3v6a3 3 0 003 3h10a3 3 0 003-3V7a3 3 0 00-3-3H5zm-1 9v-1h5v2H5a1 1 0 01-1-1zm7 1h4a1 1 0 001-1v-1h-5v2zm0-4h5V8h-5v2zM9 8H4v2h5V8z" clip-rule="evenodd"></path>
              </svg></span>
            <span class="sidebar-text">Settings</span>
          </span>
          <span class="link-arrow"><svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
            </svg></span>
        </span>
        <div class="multi-level collapse" role="list" id="submenu-appss" aria-expanded="false">
          <ul class="flex-column nav">
            <li class="nav-item {{ request()->is('admin/school*') ? 'active' : '' }}">
              <a class="nav-link" href="{{ route('admin.school.info') }}"><small class="sidebar-text">
                  School settings
                </small>
              </a>
            </li>
          </ul>
        </div>
      </li>
    </ul>
  </div>
</nav>


