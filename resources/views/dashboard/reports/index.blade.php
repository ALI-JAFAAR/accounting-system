@extends('layouts.app')
@section('content')
<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="card">
              <div class="card-body">
                <div class="chart-container" id="pdf">
                  <p style="color: white;">Report for this Month</p>
                  <div id="chartPie" style="width: 80%; margin: auto; height: 350px;background-color: white !important;">h1</div>
                  <div id="chart_area" id="Student Admission & Passout Details"></div>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            
            <div class="card">
              <div class="card-header card-header-info">
                <h4 class="card-title ">Reports Table</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <button type="button" name="view_chart" id="view_chart" class="btn btn-info btn-lg">View Data in Chart</button>
                  <table class="table" id="for_chart">
                    <thead>
                      <tr>
                        <th>Month</th>
                        <th>Total Revenue</th>
                        <th>Total Costs</th>
                        <th>Total Admin Expense</th>
                        <th>Salaries</th>
                      </tr>
                    </thead>
                    <tbody>
                      @if($total ??'')
                      @foreach($total as $key => $value)
                        @foreach ($value as $key2 => $value2)
                        @if($value2['revenue'] <= 0)@php $value2['revenue'] =0;@endphp @endif
                            <tr>
                              <td style="color: #fff;">{{ ++$key }}</td>
                              <td style="color: #fff;">{{ $value2['revenue']  }}</td>
                              <td style="color: #fff;">{{ $value2['costs']  }}</td>
                              <td style="color: #fff;">{{ $value2['admin_cost']  }}</td>
                              <td style="color: #fff;">{{ $value2['salary']  }}</td>
                            </tr>
                        @endforeach
                      @endforeach
                      @endif
                    </tbody>
                  </table> 
                </div> 
              </div>
            </div>
          </div>

        </div>
      </div>
@endsection

