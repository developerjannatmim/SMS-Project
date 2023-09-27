<x-layouts.base>
    {{-- Nav --}}
    @include('layouts.nav')
    {{-- SideNav --}}
    @include('parent.sidenav')
  
    <main class="content">
      <title>SMS Project Dashboard</title>
      <link rel="stylesheet" href="/css/style.css">
  
      <div class="p-2 mb-0 mt-2">
        <div class="row" style="margin-right: 600px">
          <div class="col-12 col-md-4 col-xl-6">
            <p class="mb-0 text-center text-lg-start"><b class="">Students</b></p>
            <p class="mb-0 text-center text-lg-start"><small class="">Home -Users - Students
                List</small>
            </p>
          </div>
        </div>
      </div>
  
      <!-- Start Students area -->
      <section class="section " style="margin-top: -80px">
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
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($students as $student)
                    <?php
                        $info = json_decode($student->user_information);
                        $user_image = $info->photo;
                        ?>
                    <tr class="alert" role="alert">
                      <td class="d-flex align-items-center">
                        @if(!empty($user_image))
                        <img class="image" style="border-radius: 50px" width="40" height="40" src="{{ url('students-images/'.$user_image ) }}" alt="">
                        @endif
                        <div class="pl-3 email">
                          <strong>{{ $student->name }}</strong>
                          <span style="color: rgb(147,128,139)"><b style="color: black">Class:
                            </b>
                            <select name="" id="">
                              @foreach ($classes as $class)
                              <option value="{{ $class->id }}" {{ $student->class_id == $class->id ? 'selected' : '' }}>{{
                                $class->name }}
                              </option>
                              @endforeach
                            </select>
                          </span>
                          <span><b style="color: black">Section:
                            </b>
                            <select name="" id="">
                              @foreach ($sections as $section)
                              <option value="{{ $section->id }}" {{ $student->section_id == $section->id ? 'selected' : ''
                                }}>{{
                                $section->name }}
                              </option>
                              @endforeach
                            </select>
                          </span>
                        </div>
                      </td>
                      <td>{{ $student->email }}</td>
                      <td class="align-items-center">
                        <div class="pl-3 user_info">
                          <span><b style="color: black">Phone:
                            </b>{{ $info->phone }}</span>
                          <span><b style="color: black">Address:
                            </b>{{ $info->address }}</span>
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