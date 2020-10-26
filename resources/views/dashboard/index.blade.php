@extends('layouts.app')
@section('content')
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-xl-12 col-lg-6 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">content_copy</i>
                  </div>
                  <p class="card-category"  style="color: #fff;">Costs</p>
                  <h3 class="card-title"  style="color: #fff;">{{ $cost}}</h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <a href="#pablo" class="warning-link"></a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-12 col-lg-6 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">store</i>
                  </div>
                  <p class="card-category"  style="color: #fff;">Revenue</p>
                  <h3 class="card-title"  style="color: #fff;">{{ $revenue }}</h3>
                </div>
                <div class="card-footer">
                </div>
              </div>
            </div>
            <div class="col-xl-12 col-lg-6 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-danger card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">person</i>
                  </div>
                  <p class="card-category"  style="color: #fff;">Admin Costs</p>
                  <h3 class="card-title"  style="color: #fff;">{{ $admin_cost }}</h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-12 col-lg-6 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-info card-header-icon">
                  <div class="card-icon">
                    <i class="fa fa-users"></i>
                  </div>
                  <p class="card-category" style="color: #fff;">Salaries</p>
                  <h3 class="card-title"  style="color: #fff;">{{ $salary }}</h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection    