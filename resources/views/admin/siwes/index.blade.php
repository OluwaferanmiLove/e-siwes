@extends('admin.layouts.app')
@section('admin')
<div class="row">
  <div class="col-lg-12">
    <div class="breadcrumb-content d-flex flex-wrap justify-content-between align-items-center">
      <div class="section-heading">
        <h2 class="sec__title">Siwes Settings</h2>
      </div><!-- end section-heading -->
      <ul class="list-items d-flex align-items-center">
        <li class="active__list-item"><a href="#">Home</a></li>
        <li class="active__list-item"><a href="{{ url('admin') }}">Dashboard</a></li>
        <li><a href="{{ url('admin/faculties') }}">Siwes Settings</a></li>
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
            <h3 class="widget-title pb-0">Assign Supervisor For Siwes Program</h3>
            <div class="title-shape margin-top-10px"></div>
          </div>
        </div>
      </div><!-- billing-title-wrap -->
      <div class="billing-content pb-2">
        <table class="table">
          <thead>
            <tr>
              <td>Total Number of Supervisors</td>
              <td>{{$supervisors}}</td>
            </tr>
            <tr>
              <td>Total Number of Students</td>
              <td>{{$students}}</td>
            </tr>
            <tr>
              <td>Supervisors Assigned On</td>
              <td>{{date('jS F Y', strtotime($siwes_settings->supervisor_assigned_date)) ?? "Not Assigned yet"}}</td>
            </tr>
            <tr>
              <td></td>
              <td style="display: flex;">
                
                <form action="{{ route('admin_manage_siwes') }}" method="POST">
                  @csrf
                  <input type="hidden" name="type" value="re_assign">
                  @isset($siwes_settings)
                    @if($siwes_settings->supervisor_assigned == 'Yes')
                    <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure you want to Re-Assign Supervisor for this Siwes Program')">Re-Assign</button>
                    @else
                <form action="{{ route('admin_manage_siwes') }}" method="POST">
                  @csrf
                  <input type="hidden" name="type" value="assign">
                <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure you want to Assign Supervisor for this Siwes Program')">Assign Now</button>
                </form>        &nbsp
                    <button disabled class="btn btn-primary">Re-Assign</button>
                    @endif
                  @endisset
                </form>
              </td>
            </tr>
          </thead>
        </table>
      </div><!-- end billing-form-item -->
    </div><!-- end col-lg-12 -->
  </div><!-- end row -->
</div>

<div class="row mt-5">
  <div class="col-lg-12">
    <div class="billing-form-item">
      <div class="billing-title-wrap">
        <div class="row">
          <div class="col-10">
            <h3 class="widget-title pb-0">Start Siwes</h3>
            <div class="title-shape margin-top-10px"></div>
          </div>
        </div>
      </div><!-- billing-title-wrap -->
      <div class="billing-content pb-5">
        <p style="color:black">Siwes Program is ment to be performed for 12weeks, Supervisor are ment to be assigned before you can start the Siwes program</p>        
                @isset($siwes_settings)
                    @if($siwes_settings->siwes_start == 'Yes')
                    <p style="color:black">Siwes Program Started On: <b>{{date('jS F Y', strtotime($siwes_settings->siwes_start_date))}}</b></p> 
                    <p style="color:black">Siwes Program Expected to End On: <b>{{date('jS F Y', strtotime($siwes_settings->siwes_end_date))}}</b></p>
                    @else  
                <form action="{{ route('admin_manage_siwes') }}" method="POST">
                  @csrf
                  <input type="hidden" name="type" value="start">
                <button type="submit" class="btn btn-success" onclick="return confirm('Are you sure you want to Re-Assign Supervisor for this Siwes Program')">Start Siwes</button>
                </form>     
                    @endif
                  @endisset
      </div><!-- end billing-form-item -->
    </div><!-- end col-lg-12 -->
  </div><!-- end row -->
</div>


@endsection