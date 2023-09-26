<x-layouts.base>
    {{-- Nav --}}
    @include('layouts.nav')
    {{-- SideNav --}}
    @include('admin.sidenav')

    <main class="content">

        <div class="p-2 mb-0 mt-2">
            <div class="row" style="margin-right: 550px">
                <div class="col-12 col-md-4 col-xl-6">
                    <p class="mb-0 text-center text-lg-start"><b class="">Class Syllabus</b></p>
                    <p class="mb-0 text-center text-lg-start"><small class="">Edit - Academic - Class
                            Syllabus</small>
                    </p>
                </div>
            </div>
        </div>

        <section class="section" style="margin-top: -120px">
            <a class="btn btn-primary" type="button" href="{{ route('admin.syllabus') }}"
                style="margin-left: 880px; margin-top: -45px">Back</a>
            <div class="bg-white rounded p-4 mb-4 mt-2">
                <form method="POST"
                    action="{{ route('admin.syllabus.update', $syllabus->id) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="fpb-7">
                            <label for="title" class="eForm-label">Title</label>
                            <input class="form-control @error('title') is-valid @enderror" type="text" name="title"
                                id="title" value="{{ $syllabus->title }}" required>
                        </div>

                        <div class="fpb-7">
                            <label for="class_id">Class</label>
                            <select name="class_id" id="class_id" required
                                class="form-select eForm-select eChoice-multiple-with-remove">
                                <option value="">Select a class</option>
                                @foreach ($classes as $class)
                                    <option value="{{ $class->id }}"
                                        {{ $syllabus->class_id == $class->id ? 'selected' : '' }}>{{ $class->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="fpb-7">
                            <label for="section_id" class="eForm-label">Section</label>
                            <select name="section_id" id="section_id_on_syllabus_creation"
                                class="form-select eForm-select eChoice-multiple-with-remove" required>
                                <option value="">Select section</option>
                                @foreach ($sections as $section)
                                    <option value="{{ $section->id }}"
                                        {{ $syllabus->section_id == $section->id ? 'selected' : '' }}>{{ $section->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="fpb-7">
                            <label for="subject_id" class="eForm-label">Subject</label>
                            <select name="subject_id" id="subject_id_on_syllabus_creation"
                                class="form-select eForm-select eChoice-multiple-with-remove" required>
                                <option value="">Select subject</option>
                                @foreach ($subjects as $subject)
                                    <option value="{{ $subject->id }}"
                                        {{ $syllabus->subject_id == $subject->id ? 'selected' : '' }}>
                                        {{ $subject->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="fpb-7">
                            <label for="form-label" class="eForm-label">Upload Syllabus</label>
                            <input class="form-control @error('image') is-valid @enderror" type="file" name="image"
                                value="{{ $syllabus->file }}">
                        </div>

                        <div class="fpb-7 pt-2">
                            <button class="btn btn-primary" type="submit">Update class syllabus</button>
                        </div>

                    </div>
                </form>
            </div>
        </section>
        {{-- Footer --}}
        @include('layouts.footer')
    </main>
</x-layouts.base>
