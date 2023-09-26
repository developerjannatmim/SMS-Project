<?php
use App\Models\Exam;

?>
<x-layouts.base>
	{{-- Nav --}}
	@include('layouts.nav')
	{{-- SideNav --}}
	@include('admin.sidenav')

	<main class="content">
		<link rel="stylesheet" href="/css/style.css">

		<div class="p-2 mb-0 mt-2">
			<div class="row">
				<div class="col-12 col-md-4 col-xl-6">
					<p class="mb-0 text-center text-lg-start"><b class="">School Exam</b></p>
					<p class="mb-0 text-center text-lg-start"><small class="">Edit -
							Examination -
							School Exam</small></p>
				</div>
			</div>
		</div>

		<section class="section" style="margin-top: -120px">
			<a class="btn btn-primary" type="button" href="{{ route('admin.exam') }}"
				style="margin-left: 880px; margin-top: -45px">Back</a>
			<div class="bg-white rounded p-4 mb-4 mt-2">
				<form method="POST" action="{{ route('admin.exam.update', ['id' => $exam->id]) }}">
					@csrf
					<div class="row">
						<div class="col-md-6 mb-3">
							<label for="exam_name" class="eForm-label">Exam</label>
							<input type="text" class="form-control eForm-control" value="{{ $exam->name }}" id="exam_name"
								name="exam_name" required>
						</div>

						<div class="col-md-6 mb-3">
							<label for="class_id" class="eForm-label">Class</label>
							<select name="class_id" id="class_id" class="form-select eForm-select eChoice-multiple-with-remove"
								required>
								<option value="">Select a class</option>
								@foreach ($classes as $class)
								<option value="{{ $class->id }}" {{ $exam->class_id == $class->id ? 'selected':''}}>{{ $class->name }}
								</option>
								@endforeach
							</select>
						</div>
					</div>

					@php
						$starting_time = Exam::where('starting_time', $exam->starting_time )->get();
						$str_date = $starting_time->starting_date;
						$str_time = $starting_time->starting_time;
						
					@endphp

					<div class="row">
						<div class="col-md-6 mb-3">
							<label for="section_id" class="eForm-label">Section</label>
							<select name="section_id" id="section_id" class="form-select eForm-select eChoice-multiple-with-remove"
								required>
								<option value="">Select a section</option>
								@foreach ($sections as $section)
								<option value="{{ $section->id }}" {{ $exam->section_id == $section->id ? 'selected':'' }}>{{
									$section->name }}</option>
								@endforeach
							</select>
						</div>

						<div class="col-md-6 mb-3">
							<label for="starting_date" class="eForm-label">Starting date</label>
							<input type="date" class="form-control eForm-control" id="starting_date" name="starting_date" min="0"
								value="{{ $str_date }}" placeholder="Mark upto" required>
						</div>
					</div>

					<div class="row">
						<div class="col-md-6 mb-3">
							<label for="starting_time" class="eForm-label">Starting time</label>
							<input type="time" class="form-control eForm-control" id="starting_time" name="starting_time" min="0"
								value="{{ $str_time }}" required>
						</div>

						<div class="col-md-6 mb-3">
							<label for="ending_date" class="eForm-label">Ending date</label>
							<input type="date" class="form-control eForm-control" id="ending_date" name="ending_date" min="0"
								value="{{ $exam->ending_date }}" required>
						</div>
					</div>

					<div class="row">
						<div class="col-md-6 mb-3">
							<label for="ending_time" class="eForm-label">Ending time</label>
							<input type="time" class="form-control eForm-control" id="ending_time" name="ending_time" min="0"
								value="{{ $exam->ending_time }}" required>
						</div>

						<div class="col-md-6 mb-3">
							<label for="total_marks" class="eForm-label">Total Marks</label>
							<input type="number" class="form-control eForm-control" id="total_marks" name="total_marks" min="0"
								value="{{ $exam->total_marks }}" required>
						</div>
					</div>

						<div class="col-md-6 mb-3 pt-2">
							<button class="btn btn-primary" type="submit">Update</button>
						</div>
					</div>
				</form>
			</div>
			</div>
		</section>

		{{-- Footer --}}
		@include('layouts.footer')
	</main>
</x-layouts.base>