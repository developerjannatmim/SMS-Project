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
      <div class="row" style="margin-right: 660px">
        <div class="col-12 col-md-4 col-xl-6">
          <p class="mb-0 text-center text-lg-start"><b class="">Teachers</b></p>
          <p class="mb-0 text-center text-lg-start"><small class="">Home - Users - Teachers</small>
          </p>
        </div>
      </div>
    </div>

    <!-- Start teachers area -->
    <section class="section" style="margin-top: -120px">
      <a class="btn btn-primary" type="button" href="{{ route('admin.teacher.create') }}" style="margin-left: 940px; margin-top: -50px">+ Add</a>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="table-wrap">
              <table class="table table-responsive-xl">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>User Info</th>
                    <th>Options</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($teachers as $teacher)
                  <?php
                        $info = json_decode($teacher->user_information);
                        // $user_image = $info->photo;
                        // if (!empty($user_image)) {
                        //     $user_image = 'uploads/user-images/'.$info->photo;
                        // } else {
                        //     $user_image = 'uploads/user-images/thumbnail.png';
                        // }
                      ?>
                  <tr class="alert" role="alert">
                    <td class="d-flex align-items-center">
                      <img class="image" style="border-radius: 50px" width="40" height="40" src="/assets/images/user.jpeg" alt="">
                      <div class="pl-3 email">
                        <strong>{{ $teacher->name }}</strong>
                      </div>
                    </td>
                    <td>{{ $teacher->email }}</td>
                    <td class="align-items-center">
                      <div class="pl-3 user_info">
                        <span><b style="color: black">Phone: 
                          </b>{{ $info->phone }}</span>
                        <span><b style="color: black">Address: 
                          </b>{{ $info->address }}</span>
                      </div>
                    </td>
                    <td class="text-start">
                      <div class="adminTable-action ms-0">
                        <button type="button" class="btn btn-primary dropdown-toggle table-action-btn-2"
                          data-bs-toggle="dropdown" aria-expanded="false">
                          Actions
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end eDropdown-menu-2 eDropdown-table-action">
                          <li>
                            <a class="dropdown-item" href="{{ route('admin.teacher.edit', $teacher->id) }}">Edit</a>
                          </li>
                          <li>
                            <a class="dropdown-item" href="{{ route('admin.teacher.delete', $teacher->id) }}">Delete</a>
                          </li>
                        </ul>
                      </div>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>

    {{-- Footer --}}
    @include('layouts.footer')
  </main>
</x-layouts.base>