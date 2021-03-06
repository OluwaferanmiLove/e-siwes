@extends('student.layouts.app')
@section('student')

	<!--Main container start -->
	<main class="ttr-wrapper">
		<div class="container-fluid">
			<div class="db-breadcrumb">
				<h4 class="breadcrumb-title">Dashboard</h4>
				<ul class="db-breadcrumb-list">
					<li><a href="#"><i class="fa fa-home"></i>Home</a></li>
					<li>Dashboard</li>
				</ul>
			</div>
			<div class="row">
				<!-- Your Profile Views Chart -->
				<div class="col-lg-12 m-b30">
					<div class="widget-box">
						<div class="wc-title">
							<h4>Welcome {{Auth::user()->first_name}} {{Auth::user()->last_name}}</h4>
						</div>
						<div class="widget-inner">
							<div class="card-courses-list bookmarks-bx">
								<div class="card-courses-media">
									@if (Auth::user()->avatar == null)										
										<img src="{{ asset('uploads/avatar_pics.jpg') }}" alt="">
									@else		
										<img src="{{ asset('uploads/student_avatar/'.Auth::user()->avatar) }}"  alt="{{Auth::user()->name}}">										
									@endif
								</div>
								<div class="card-courses-full-dec">
									<div class="card-courses-list-bx">
										<ul class="card-courses-view">
											<li class="card-courses-categories">
												<h4>Matric Number:</h4>
												<h3>{{Auth::user()->unique}}</h3>
											</li>
										</ul>
									</div>
									<div class="card-courses-list-bx">
										<ul class="card-courses-view">
											<li class="card-courses-categories">
												<h4>Name:</h4>
												<h3>{{Auth::user()->name}}</h3>
											</li>
										</ul>
									</div>									
									<div class="card-courses-list-bx">
										<ul class="card-courses-view">
											<li class="card-courses-categories">
												<h4>Email:</h4>
												<h3>{{Auth::user()->email}}</h3>
											</li>
										</ul>
									</div>								
									<div class="card-courses-list-bx">
										<ul class="card-courses-view">
											<li class="card-courses-categories">
												<h4>School:</h4>
												<h3>{{$student->school->name}}</h3>
											</li>
										</ul>
									</div>
									<div class="card-courses-list-bx">
										<ul class="card-courses-view">
											<li class="card-courses-categories">
												<h4>Department:</h4>
												<h3>{{$student->dept->name}}</h3>
											</li>
										</ul>
									</div>
									<div class="card-courses-list-bx">
										<ul class="card-courses-view">
											<li class="card-courses-categories">
												<h4>My Supervisor:</h4>
												<h3>{{$student->sup->name ?? "Not Given Yet"}}</h3>
											</li>
										</ul>
									</div>
									<div class="row card-courses-dec">
										<div class="col-md-12">
											<a href="{{ url('student/profile') }}" class="btn radius-xl">Edit Profile</a>
										</div>
									</div>
									
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- Your Profile Views Chart END-->
			</div>
		</div>
	</main>
@endsection