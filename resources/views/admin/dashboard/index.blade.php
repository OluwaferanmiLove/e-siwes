@extends('admin.layouts.app')
@section('admin')
<div class="row">
    <div class="col-lg-12">
        <div class="breadcrumb-content d-flex flex-wrap justify-content-between align-items-center">
            <div class="section-heading">
                <h2 class="sec__title line-height-45">Welcome, Admin!</h2>
            </div><!-- end section-heading -->
            <ul class="list-items d-flex align-items-center">
                <li class="active__list-item"><a href="#">Home</a></li>
                <li class="active__list-item">Admin</li>
                <li>Dashboard</li>
            </ul>
        </div><!-- end breadcrumb-content -->
    </div><!-- end col-lg-12 -->
</div><!-- end row -->
<div class="row mt-5 mb-5">
    <div class="col-lg-3 column-lg-3 column-md-3">
        <div class="overview-item">
            <div class="icon-box bg-1 mb-0 d-flex align-items-center">
                <div class="icon-element flex-shrink-0">
                    <i class="la la-user"></i>
                </div><!-- end icon-element-->
                <div class="info-content">
                    <span class="info__count">
                        {{$supervisor}}
                    </span>
                    <h4 class="info__title font-size-16 mt-2">Supervisors</h4>
                </div><!-- end info-content -->
            </div>
        </div>
    </div><!-- end col-lg-3 -->
    <div class="col-lg-3 column-lg-3 column-md-3">
        <div class="overview-item">
            <div class="icon-box bg-2 mb-0 d-flex align-items-center">
                <div class="icon-element flex-shrink-0">
                    <i class="la la-users"></i>
                </div><!-- end icon-element-->
                <div class="info-content">
                    <span class="info__count">
                        {{$student}}
                    </span>
                    <h4 class="info__title font-size-16 mt-2">Students</h4>
                </div><!-- end info-content -->
            </div>
        </div>
    </div><!-- end col-lg-3 -->

    <div class="col-lg-3 column-lg-3 column-md-3">
        <div class="overview-item">
            <div class="icon-box bg-3 mb-0 d-flex align-items-center">
                <div class="icon-element flex-shrink-0">
                    <i class="la la-book"></i>
                </div><!-- end icon-element-->
                <div class="info-content">
                    <span class="info__count">
                        {{$school}}
                    </span>
                    <h4 class="info__title font-size-16 mt-2">Schools</h4>
                </div><!-- end info-content -->
            </div>
        </div>
    </div><!-- end col-lg-3 -->

    <div class="col-lg-3 column-lg-3 column-md-3">
        <div class="overview-item">
            <div class="icon-box bg-4 mb-0 d-flex align-items-center">
                <div class="icon-element flex-shrink-0">
                    <i class="la la-book"></i>
                </div><!-- end icon-element-->
                <div class="info-content">
                    <span class="info__count">
                        {{$dept}}
                    </span>
                    <h4 class="info__title font-size-16 mt-2">Departments</h4>
                </div><!-- end info-content -->
            </div>
        </div>
    </div><!-- end col-lg-3 -->
</div><!-- end row -->
@endsection