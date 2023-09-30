<?php
use Illuminate\Support\Facades\Auth;

?>
<x-layouts.base>
  {{-- Nav --}}
  @include('layouts.nav')
  {{-- SideNav --}}
  @include('admin.sidenav')

  <main class="content">
    <title>SMS Project Dashboard</title>
    <link rel="stylesheet" href="/css/style.css">
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" /> --}}

    <div class="p-2 mb-0 mt-2">
      <div class="row" style="margin-left: 3px">
        <div class="col-12 col-md-4 col-xl-6">
          <p class="mb-0 text-center text-lg-start"><b class="">Admin</b></p>
          <p class="mb-0 text-center text-lg-start"><small class="">Home - Users - Admin List</small>
          </p>
        </div>
      </div>
    </div>

    <!-- Start admins area -->
    <section class="section" style="margin-top: -120px">
      <a class="btn btn-primary" type="button" href="{{ route('admin.admin.create') }}"
        style="margin-left: 940px; margin-top: -50px">+ Add</a>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="search-filter-area mb-3 mt-4 d-flex justify-content-md-between justify-content-center align-items-center flex-wrap gr-15">
              <form action="{{ route('admin.admin') }}" >
                <div
                  class="search-input d-flex justify-content-start align-items-center"
                >
                  <input
                    type="text"
                    id="search"
                    name="search"
                    value="{{ $search }}"
                    placeholder="Search user"
                    class="form-control"
                  />
                  <button type="submit" class="btn btn-primary" style="margin-left: 5px">search</button>
                </div>
              </form>
            </div>
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
                  @foreach ($admins as $admin)
                  <?php
                    $info = json_decode($admin->user_information);
                    $user_image = $info->photo;
                  ?>
                  <tr class="alert" role="alert">
                    <td class="d-flex align-items-center">
                      @if(!empty($user_image))
                      <img class="image" style="border-radius: 50px" width="40" height="40"
                      src="{{ url('admin-images/'.$user_image ) }}" alt="">
                      @endif
                      <div class="pl-3 email">
                        <strong>{{ $admin->name }}</strong>
                      </div>
                    </td>
                    <td>{{ $admin->email }}</td>
                    <td class="align-items-center">
                      <div class="pl-3 user_info">
                        <span><b style="color: black">Phone:
                          </b>{{ $info->phone }}</span>
                        <span><b style="color: black">Address:
                          </b>{{ $info->address }}</span>
                      </div>
                    </td>
                    <td class="text-start">
                      <div class="ms-0">
                        <button type="button" class="btn btn-primary dropdown-toggle table-action-btn-2
                         form-select" data-bs-toggle="dropdown" aria-expanded="false">
                          Actions
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end eDropdown-menu-2 eDropdown-table-action">
                          @if ($admin->id == Auth()->user()->id)
                          <li>
                            <a class="dropdown-item" href="{{ route('admin.admin.edit', $admin->id) }}">Edit</a>
                          </li>
                          <li>
                            <a onclick="return confirm('{{__('Are you sure you want to delete this article ?')}}')" class="dropdown-item" href="{{ route('admin.admin.delete', $admin->id) }}">Delete</a>
                          </li>
                          @else
                          <li>
                            <a class="dropdown-item" href="{{ route('admin.profile') }}">Profile</a>
                          </li>
                          @endif
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