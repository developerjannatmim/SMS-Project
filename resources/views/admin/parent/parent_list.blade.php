<x-layouts.base>
    {{-- Nav --}}
    @include('layouts.nav')
    {{-- SideNav --}}
    @include('admin.sidenav')

    <main class="content">
        @include('layouts.topbar')
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title>SMS Project Dashboard</title>
						<link rel="stylesheet" href="/css/style.css">
        </head>
        <body>
            <div class="p-2 mb-0 mt-2">
                <div class="row">
                    <div class="col-12 col-md-4 col-xl-6">
                        <p class="mb-0 text-center text-lg-start"><b class="">Parent List</b></p>
                        <p class="mb-0 text-center text-lg-start"><small class="">Home - Users - Parent
                                List</small>
                        </p>
                    </div>
                </div>
            </div>

            <!-- Start Parents area -->
            <section class="section">
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
                                        @foreach ($parents as $parent)
                                            <?php
                                            $info = json_decode($parent->user_information);
                                            ?>
                                            <tr class="alert" role="alert">
                                                <td class="d-flex align-items-center">
                                                    <img class="image" width="40" height="40"
                                                        src="/assets/images/user.jpeg" alt="">
                                                    <div class="pl-3 email">
                                                        <strong>{{ $parent->name }}</strong>
                                                        <span style="color: rgb(147,128,139)"><b
                                                                style="color: black">Class:
                                                            </b>{{ $parent->class_id }}</span>
                                                        <span><b style="color: black">Section:
                                                            </b>{{ $parent->section_id }}</span>
                                                    </div>
                                                </td>
                                                <td>{{ $parent->email }}</td>
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
                                                        <button type="button"
                                                            class="btn btn-primary dropdown-toggle table-action-btn-2"
                                                            data-bs-toggle="dropdown" aria-expanded="false">
                                                            Actions
                                                        </button>
                                                        <ul
                                                            class="dropdown-menu dropdown-menu-end eDropdown-menu-2 eDropdown-table-action">
                                                            <li>
                                                                <a class="dropdown-item"
                                                                    href="{{ route('admin.parent.create') }}">Add</a>
                                                            </li>
                                                            <li>
                                                                <a class="dropdown-item"
                                                                    href="{{ route('admin.parent.edit', $parent->id) }}">Edit</a>
                                                            </li>
                                                            <li>
                                                                <a class="dropdown-item" href="{{ route('admin.parent.delete', $parent->id) }}">Delete</a>
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
        </body>

        </html>


        {{-- Footer --}}
        @include('layouts.footer')
    </main>
</x-layouts.base>
