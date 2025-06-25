@extends('be.master')
@section('navbar')
    @include('be.navbar')
@endsection
@section('sidebar')
    @include('be.sidebar')
@endsection
@section('content')
<div class="row">
    <div class="col-xl-3 col-sm-6">
      <div class="card card-default card-mini">
        <div class="card-header">
          <h2>$18,699</h2>
          <div class="sub-title">
            <span class="mr-1">Sales of this year</span> |
            <span class="mx-1">45%</span>
            <i class="mdi mdi-arrow-up-bold text-success"></i>
          </div>
        </div>
        <div class="card-body">
          <div class="chart-wrapper">
            <div>
              <div id="spline-area-1"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6">
      <div class="card card-default card-mini">
        <div class="card-header">
          <h2>$14,500</h2>
          <div class="sub-title">
            <span class="mr-1">Expense of this year</span> |
            <span class="mx-1">50%</span>
            <i class="mdi mdi-arrow-down-bold text-danger"></i>
          </div>
        </div>
        <div class="card-body">
          <div class="chart-wrapper">
            <div>
              <div id="spline-area-2"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6">
      <div class="card card-default card-mini">
        <div class="card-header">
          <h2>$4199</h2>
          <div class="sub-title">
            <span class="mr-1">Profit of this year</span> |
            <span class="mx-1">20%</span>
            <i class="mdi mdi-arrow-down-bold text-danger"></i>
          </div>
        </div>
        <div class="card-body">
          <div class="chart-wrapper">
            <div>
              <div id="spline-area-3"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6">
      <div class="card card-default card-mini">
        <div class="card-header">
          <h2>$20,199</h2>
          <div class="dropdown">
            <a class="dropdown-toggle icon-burger-mini" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"     aria-haspopup="true" aria-expanded="false">
            </a>
          </div>
          <div class="sub-title">
            <span class="mr-1">Revenue of this year</span> 
            <span class="mx-1">35%</span>
            <i class="mdi mdi-arrow-up-bold text-success"></i>
          </div>
        </div>
        <div class="card-body">
          <div class="chart-wrapper">
            <div>
              <div id="spline-area-4"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Income and Express -->
  <div class="card card-default">
    <div class="card-header">
      <h2>Income And Expenses</h2>
      <div class="dropdown">
        <a class="dropdown-toggle icon-burger-mini" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false" data-display="static">
        </a>

        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </div>

    </div>
    <div class="card-body">
      <div class="chart-wrapper">
        <div id="mixed-chart-1"></div>
      </div>
    </div>
  </div>
  <div class="row">

    <!-- Frist box -->
    <div class="col-lg-6 col-xl-3">
      <div class="card card-default bg-secondary">
        <div class="card-header">
          <h2 class="text-white">890</h2>
          <p class="flex-basis-100 text-white">New Users</p>
        </div>
        <div class="card-body">
          <div class="progress progress-sm progress-white rounded-0 mb-1">
            <div class="progress-bar bg-white" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0"
              aria-valuemax="100"></div>
          </div>
          <div class="d-flex justify-content-between">
            <span class="text-white text-capitalize">User Reached</span>
            <span class="text-white text-capitalize">80%</span>
          </div>
        </div>
      </div>
    </div>
  
    <!-- Second box -->
    <div class="col-lg-6 col-xl-3">
      <div class="card card-default bg-success">
        <div class="card-header">
          <h2 class="text-white">350</h2>
          <p class="flex-basis-100 text-white">Order Placed</p>
        </div>
        <div class="card-body">
          <div class="progress progress-sm progress-white rounded-0 mb-1">
            <div class="progress-bar bg-white" role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0"
              aria-valuemax="100"></div>
          </div>
          <div class="d-flex justify-content-between">
            <span class="text-white text-capitalize">Order Placed</span>
            <span class="text-white text-capitalize">70%</span>
          </div>
        </div>
      </div>
    </div>
  
    <!-- Third box -->
    <div class="col-lg-6 col-xl-3">
      <div class="card card-default bg-primary">
        <div class="card-header">
          <h2 class="text-white">1360</h2>
          <p class="flex-basis-100 text-white">Total Sales</p>
        </div>
        <div class="card-body">
          <div class="progress progress-sm progress-white rounded-0 mb-1">
            <div class="progress-bar bg-white" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0"
              aria-valuemax="100"></div>
          </div>
          <div class="d-flex justify-content-between">
            <span class="text-white text-capitalize">Sales of this year</span>
            <span class="text-white text-capitalize">60%</span>
          </div>
        </div>
      </div>
    </div>
  
    <!-- Fourth box -->
    <div class="col-lg-6 col-xl-3">
      <div class="card card-default bg-info">
        <div class="card-header">
          <h2 class="text-white">$8930</h2>
          <p class="flex-basis-100 text-white">Monthly Revenue</p>
        </div>
        <div class="card-body">
          <div class="progress progress-sm progress-white rounded-0 mb-1">
            <div class="progress-bar bg-white" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0"
              aria-valuemax="100"></div>
          </div>
          <div class="d-flex justify-content-between">
            <span class="text-white text-capitalize">Revenew Reached</span>
            <span class="text-white text-capitalize">80%</span>
          </div>
        </div>
      </div>
    </div>
  </div>


  <div class="row">
    <!-- Frist box -->
    <div class="col-xl-3 col-md-6">
      <div class="card card-default bg-secondary">
        <div class="d-flex p-5 justify-content-between">
          <div class="icon-md bg-white rounded-circle mr-3">
            <i class="mdi mdi-account-plus-outline text-secondary"></i>
          </div>
          <div class="text-right">
            <span class="h2 d-block text-white">890</span>
            <p class="text-white">New Users</p>
          </div>
        </div>
      </div>
    </div>
  
    <!-- Second box -->
    <div class="col-xl-3 col-md-6">
      <div class="card card-default bg-success">
        <div class="d-flex p-5 justify-content-between">
          <div class="icon-md bg-white rounded-circle mr-3">
            <i class="mdi mdi-table-edit text-success"></i>
          </div>
          <div class="text-right">
            <span class="h2 d-block text-white">350</span>
            <p class="text-white">Order Placed</p>
          </div>
        </div>
      </div>
    </div>
  
    <!-- Third box -->
    <div class="col-xl-3 col-md-6">
      <div class="card card-default bg-primary">
        <div class="d-flex p-5 justify-content-between">
          <div class="icon-md bg-white rounded-circle mr-3">
            <i class="mdi mdi-content-save-edit-outline text-primary"></i>
          </div>
          <div class="text-right">
            <span class="h2 d-block text-white">1360</span>
            <p class="text-white">Total Sales</p>
          </div>
        </div>
      </div>
    </div>
  
    <!-- Fourth box -->
    <div class="col-xl-3 col-md-6">
      <div class="card card-default bg-info">
        <div class="d-flex p-5 justify-content-between">
          <div class="icon-md bg-white rounded-circle mr-3">
            <i class="mdi mdi-bell text-info"></i>
          </div>
          <div class="text-right">
            <span class="h2 d-block text-white">$8930</span>
            <p class="text-white">Monthly Revenue</p>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('footer')
    @include('be.footer')
@endsection