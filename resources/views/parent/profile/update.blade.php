<x-layouts.base>
  {{-- Nav --}}
  @include('layouts.nav')
  {{-- SideNav --}}
  @include('parent.sidenav')

  <main class="content">

    @include('layouts.topbar')
    <div class="container">
      <div class="main-body mt-5">
        <div class="row">
          <div class="col-lg-4">
            <div class="card">
              <div class="card-body">
                <div class="d-flex flex-column align-items-center text-center">
                  <img src="https://bootdey.com/img/Content/avatar/avatar6.png" alt="parent"
                    class="rounded-circle p-1 bg-primary" width="110">
                  <div class="mt-2">
                    <h4>John Doe</h4>
                    <p class="text-secondary mb-1">{{ auth()->user()->name }}</p>
                    <p class="text-muted font-size-sm">{{ auth()->user()->address }}</p>
                    <button class="btn btn-outline-primary">Message</button>
                  </div>
                </div>
                <div class="mt-4">
                  <b>Details Info</b>
                </div>
                <hr class="my-4">
                <div class="row mb-3">
                  <div>
                    <h6 class="mb-0">Email</h6>
                  </div>
                  <div class="col-sm-9" style="color: gray">
                    <small>{{ auth()->user()->email }}</small>
                  </div>
                </div>
                <div class="row mb-3">
                  <div>
                    <h6 class="mb-0">Phone</h6>
                  </div>
                  <div class="col-sm-9" style="color: gray">
                    <small>{{ json_decode(auth()->user()->user_information, true)['phone'] }}</small>
                  </div>
                </div>
                <div class="row mb-3">
                  <div>
                    <h6 class="mb-0">Address</h6>
                  </div>
                  <div class="col-sm-9" style="color: gray">
                      <small>{{ json_decode(auth()->user()->user_information, true)['address'] }}</small>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-8">
            <form action="{{ route('parent.profile.update', $parent->id ) }}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="card">
                <div class="card-body">
                  <div class="row mb-4 mt-4">
                    <div class="col-sm-3">
                      <label for="name" class="form-label">Name</label>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <input type="text" class="form-control" name="name" value="{{ auth()->user()->name }}"
                        placeholder="Your Name" aria-label="Your Name">
                    </div>
                  </div>
                  <div class="row mb-4">
                    <div class="col-sm-3">
                      <label for="email" class="form-label">Email</label>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <input type="text" class="form-control" name="email" value="{{ auth()->user()->email }}"
                        placeholder="example@email.com" aria-label="example@email.com">
                    </div>
                  </div>
                  <div class="row mb-4">
                    <div class="col-sm-3">
                      <label for="birthday" class="form-label">Birthday</label>
                      @php
                      $birthday = json_decode(auth()->user()->user_information, true)['birthday'];
                      if (empty($birthday)) {
                      $birthday = null;
                      }
                      @endphp
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <input type="date" class="form-control" name="birthday" value="{{ $birthday }}"
                        placeholder="Your Birthday" aria-label="Your Birthday">
                    </div>
                  </div>
                  <div class="row mb-4">
                    <div class="col-sm-3">
                      <label for="gender" class="form-label">Gender</label>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <select name="gender" class="form-select eForm-select eChoice-multiple-without-remove"
                        data-placeholder="Type to search...">
                        <option value="Male" @php strtolower(json_decode(auth()->user()->user_information,
                          true)['gender']) == 'male' ? 'selected':''; @endphp>
                          Male</option>
                        <option value="Female" @php strtolower(json_decode(auth()->user()->user_information,
                          true)['gender']) == 'female' ? 'selected':''; @endphp>
                          Female</option>
                      </select>
                    </div>
                  </div>
                  <div class="row mb-4">
                    <div class="col-sm-3">
                      <label for="phone" class="form-label">Phone</label>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <input type="text" class="form-control" name="phone"
                        value="{{ json_decode(auth()->user()->user_information, true)['phone'] }}"
                        placeholder="Your Phone" aria-label="Your Phone">
                    </div>
                  </div>
                  <div class="row mb-4">
                    <div class="col-sm-3">
                      <label for="address" class="form-label">Address</label>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <input type="text" class="form-control" name="address"
                        value="{{ json_decode(auth()->user()->user_information, true)['address'] }}"
                        placeholder="Your Name" aria-label="Your Name">
                    </div>
                  </div>
                  @php
                    $photo = json_decode(auth()->user()->user_information, true)['photo'];
                    if (empty($photo)) {
                      $photo = null;
                      }
                  @endphp
                  <div class="row mb-4">
                    <div class="col-sm-3">
                      <label for="photo" class="form-label">Photo</label>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <input type="file" class="form-control" name="photo"
                        value="{{ $photo }}"
                        placeholder="Your Photo" aria-label="Your Photo">
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-9 text-secondary">
                      <button type="submit" class="btn btn-primary px-4">Save Changes</button>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    {{-- Footer --}}
    @include('layouts.footer')
  </main>
</x-layouts.base>