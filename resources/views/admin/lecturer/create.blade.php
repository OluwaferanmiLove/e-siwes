@extends('admin.layouts.app')
@section('admin')
<div class="row">
	<div class="col-lg-12">
		<div class="breadcrumb-content d-flex flex-wrap justify-content-between align-items-center">
			<div class="section-heading">
				<h2 class="sec__title">Add New Supervisor</h2>
			</div><!-- end section-heading -->
			<ul class="list-items d-flex align-items-center">
				<li class="active__list-item"><a href="#">Home</a></li>
				<li class="active__list-item"><a href="{{ url('admin') }}">Dashboard</a></li>
				<li><a href="{{ url('admin/faculties') }}">Add New Supervisor</a></li>
			</ul>
		</div><!-- end breadcrumb-content -->
	</div><!-- end col-lg-12 -->
</div><!-- end row -->

<div class="row mt-5">
	<div class="col-lg-12">
		<div class="billing-form-item">
			<div class="billing-title-wrap">
				<div class="row">
					<div class="col-10">
						<h3 class="widget-title pb-0">Add New Supervisor</h3>
						<div class="title-shape margin-top-10px"></div>
					</div>
					<div class="col-2">
						<div class="text-right">
							<a href="{{ url('admin/lecturers') }}" class="btn btn-success">All Supervisor</a>
						</div>
					</div>
				</div>
			</div><!-- billing-title-wrap -->
			<div class="billing-content pb-0">
				<div class="">
					<div class="row mt-3">
						<div class="col-lg-12">
							<div class="sidebar-widget">
								<div class="billing-form-item">
									<div class="billing-title-wrap">
										<h3 class="widget-title">Create a New Supervisor</h3>
										<div class="title-shape"></div>
									</div><!-- billing-title-wrap -->
									<div class="billing-content">
										<div class="contact-form-action mb-4">
											<form class="edit-profile m-b30" id="" method="POST" action="{{ route('admin_create_lecturer') }}">
												@csrf
												<div class="">
													<!--Select Faculty -->
													<div class="form-group row mb-4">
														<label class="col-sm-2 col-form-label">Select Faculty</label>
														<div class="col-sm-10">
															<select class="form-control school-option-field" id="faculty" name="faculty_id" onchange="getDeptSingle(this)">
																<option value="">Open this select menu</option>
																@foreach ($faculties as $faculty)
																<option class="text-capitalize" {{ old('faculty_id') == $faculty->id ? "selected" : "" }} value="{{$faculty->id}}">{{$faculty->name}} ({{$faculty->code}})</option>
																@endforeach
															</select>
															@error('faculty_id')
															<span class="invalid-feedback mb-2" role="alert" style="display: block">
																<strong>{{ $message }}</strong>
															</span>
															@enderror
														</div>
													</div>
													<!--Select Department -->
													<div class="form-group row mb-4" id="dept">
														<label class="col-sm-2 col-form-label">Select Dept.</label>
														<div class="col-sm-10">
															<select name="department_id" id="department_single" class="form-control department-option-field">
																<option value="">Open this select menu</option>
																@foreach ($departments as $department)
																<option class="text-capitalize" {{ old('department_id') == $department->id ? "selected" : "" }} value="{{$department->id}}">{{$department->name}}</option>
																@endforeach
															</select>
															@error('department_id')
															<span class="invalid-feedback mb-2" role="alert" style="display: block">
																<strong>{{ $message }}</strong>
															</span>
															@enderror
														</div>
													</div>
													<div class="form-group row mb-4">
														<label class="col-sm-2 col-form-label">Supervisor Email</label>
														<div class="col-sm-10">
															<input class="form-control @error('email') is-invalid @enderror" name="email" type="email" value="{{ old('email') }}" placeholder="Supervisor Email">
															@error('email')
															<span class="invalid-feedback mb-2" role="alert" style="display: block">
																<strong>{{ $message }}</strong>
															</span>
															@enderror
														</div>
													</div>
													<div class="form-group row mb-4">
														<label class="col-sm-2 col-form-label">First Name</label>
														<div class="col-sm-10">
															<input class="form-control @error('first_name') is-invalid @enderror" name="first_name" type="text" value="{{ old('first_name') }}" placeholder="Supervisor First Name">
															@error('first_name')
															<span class="invalid-feedback mb-2" role="alert" style="display: block">
																<strong>{{ $message }}</strong>
															</span>
															@enderror
														</div>
													</div>
													<div class="form-group row mb-4">
														<label class="col-sm-2 col-form-label">Last Name</label>
														<div class="col-sm-10">
															<input class="form-control @error('last_name') is-invalid @enderror" name="last_name" type="text" value="{{ old('last_name') }}" placeholder="Supervisor Last Name">
															@error('last_name')
															<span class="invalid-feedback mb-2" role="alert" style="display: block">
																<strong>{{ $message }}</strong>
															</span>
															@enderror
														</div>
													</div>
													<div class="form-group row">
														<div class="col-sm-10  ml-auto">
															<h6>Note: Supervisor First Name is password by default in lowercase<br>
															</h6>
														</div>
													</div>
													<div class="seperator"></div>
												</div>

												<div class="">
													<div class="">
														<div class="row">
															<div class="col-sm-2">
															</div>
															<div class="col-sm-7">
																<button type="submit" class="theme-btn border-0">
																	Submit
																</button>
															</div>
														</div>
													</div>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div><!-- end col-lg-3 -->
				</div><!-- end billing-content -->
			</div><!-- end billing-form-item -->
		</div><!-- end col-lg-12 -->
	</div><!-- end row -->
</div>
<script>
	$("#courses_single").attr('disabled', true);
	$(document).ready(function() {
		$('#faculty').on('change', function() {
			check()
		});

		$('#department_single').on('change', function() {
			check()
		});

		$('#level_single').on('change', function() {
			check()
		});

		$('#semester_id').on('change', function() {
			check()
		});


	});

	function getDeptSingle(sel) {
		$.ajax({
			type: "POST",
			url: "{{ url('admin/fetch-dept') }}",
			data: {
				"_token": "{{ csrf_token() }}",
				"id": sel.value
			},
			success: function(response) {
				console.log(response)
				$("#department_single").attr('disabled', false);
				$("#department_single").find('option').remove();
				$.each(response, function(key, value) {
					$("#department_single").append('<option class="text-capitalize" value=' + value.id + '>' + value.name + '</option>');
				});
			}
		});
	}

	function check() {
		var faculty = $("#faculty option:selected").val();
		var department = $("#department_single option:selected").val();
		var level = $("#level_single option:selected").val();
		var semester = $("#semester_id option:selected").val();
		if (faculty != "" && department != "" && level != "" && semester != "") {
			$("#courses_single").attr('disabled', false);
			$("#courses_single").attr('disabled', false);
			$.ajax({
				type: "POST",
				url: "{{ url('admin/fetch-course') }}",
				data: {
					"_token": "{{ csrf_token() }}",
					"faculty_id": faculty,
					"department_id": department,
					"level_id": level,
					"semester_id": semester
				},
				success: function(response) {
					console.log(response)
					$("#courses_single").attr('disabled', false);
					$("#courses_single").find('option').remove();
					$.each(response, function(key, value) {
						$("#courses_single").append('<option class="text-capitalize" value=' + value.id + '>' + value.course_title + ' (' + value.course_code + ')' + '</option>');
					});
				}
			});
		} else {
			$("#courses_single").attr('disabled', true);
			return false;
		}
	}
</script>
@endsection