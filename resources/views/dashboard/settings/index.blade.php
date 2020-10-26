@extends('layouts.app')
@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      @if(count($errors) >0)
        <div class="col-md-12 col-lg-12">
          <div class="alert alert-danger alert-dismissible">
              <ul>
                @foreach( $errors->all() as $error)
                  <li>
                    {{$error}}
                  </li>
                @endforeach
              </ul>
              <button type="button" class="close" data-dismiss="alert">&times;</button>
          </div>
        </div>
      @endif
      @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible">
          <ul>
            <li>
              {{ session()->get('success') }}
            </li>
          </ul>
          <button type="button" class="close" data-dismiss="alert">&times;</button>
        </div>
      @endif
    <div class="col-lg-4 col-md-12" >
        <div class="card">
          <div class="card-header card-header-info">
              <strong>Change Password</strong>
          </div>
          <form action="{{ route('password') }}" method="post" class="form-horizontal">
            {{ csrf_field() }}
            <input type="hidden" name="admin_id" value="{{ Auth::user()->id }}">
            <div class="card-body card-block">
              <div class="row form-group">
                <div class="col col-md-3">
                  <label for="hf-password" class=" form-control-label" style="margin-top: 18%;">Password</label>
                </div>
                <div class="col-12 col-md-9">
                  <input name="password" type="password" id="hf-password" placeholder="Enter Password..." class="form-control">
                </div>
              </div>
            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-info">
                  <i class="fa fa-dot-circle-o"></i> Submit
              </button>
            </div>
          </form>
        </div>
    </div>
    
    <div class="col-lg-4 col-md-12" >
        <div class="card">
          <div class="card-header card-header-info" >
              <strong>Markting Bounce</strong>
          </div>
          <form action="{{ route('bounce') }}" method="post" class="form-horizontal">
            {{ csrf_field() }}
            <div class="card-body card-block">
              <div class="row form-group">
                <div class="col col-md-3">
                  <label for="hf" class=" form-control-label" style="margin-top: 18%;">Target</label>
                </div>
                <div class="col-12 col-md-9">
                  <input type="number" id="hf" name="value" placeholder="Enter target..." class="form-control">
                </div>
              </div>
              <div class="row form-group">
                <div class="col col-md-3">
                  <label for="hf-password" class=" form-control-label" style="margin-top: 18%;">Precentage</label>
                </div>
                <div class="col-12 col-md-9">
                  <input type="text" id="hf-password" name="pre" placeholder="Enter Precentage" class="form-control">
                </div>
              </div>
            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-info ">
                  <i class="fa fa-dot-circle-o"></i> Submit
              </button>
            </div>
          </form>
        </div>
    </div>

    <div class="col-lg-4 col-md-12" >
        <div class="card">
          <div class="card-header card-header-info">
              <strong>Change Password</strong>
          </div>
          <form action="{{ route('salary') }}" method="post" class="form-horizontal">
            {{ csrf_field() }}
            <input type="hidden" name="admin_id" value="{{ Auth::user()->id }}">
            <div class="card-body card-block">
              
              <select name="pla"  type="text" class="select2 form-control">
                <option></option>
                @foreach($pla as $row)
                  <option style="color: black;" value="{{ $row->id }}">{{ $row->name }}</option>
                @endforeach
              </select>

              <div class="row form-group">
                <div class="col col-md-3">
                  <label for="hf-password" class=" form-control-label" style="margin-top: 18%;">Salary</label>
                </div>
                <div class="col-12 col-md-9">
                  <input name="salary" type="text" id="hf-password" placeholder="Enter amount..." class="form-control">
                </div>
              </div>

            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-info">
                  <i class="fa fa-dot-circle-o"></i> Submit
              </button>
            </div>
          </form>
        </div>
    </div>
    </div>
    <div class="row">
      <div class="col-lg-6 col-md-12">
        <div class="card">
          <div class="card-header card-header-info">
            <h4 class="card-title ">Bounce Table</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th>Id</th>
                    <th>Value</th>
                    <th>Precentage</th>
                    <th>date</th>
                  </tr>
                </thead>
                <tbody>
                  @if($bnc ??'')
                    @foreach ($bnc as  $value2)
                      <tr>
                        <td style="color: #fff;">{{ $value2->id   }}</td>
                        <td style="color: #fff;">{{ $value2->value  }}</td>
                        <td style="color: #fff;">{{ $value2->procentage  }}%</td>
                        <td style="color: #fff;">{{ $value2->created_at  }}</td>
                        <td>
                          <a class="btn btn-danger" href="{{ route('bounce_delete',$value2->id ??'') }}">Delete</a>
                        </td>
                      </tr>
                    @endforeach
                  @endif
                </tbody>
              </table> 
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6 col-md-12">
        <div class="card">
          <div class="card-header card-header-info">
            <h4 class="card-title ">Salaries Table</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th>Id</th>
                    <th>Value</th>
                    <th>Player Name</th>
                  </tr>
                </thead>
                <tbody>
                  @if($data ??'')
                    @foreach ($data as  $value2)
                      <tr>
                        <td style="color: #fff;">{{ $value2->id}}</td>
                        <td style="color: #fff;">{{ $value2->value}}</td>
                        <td style="color: #fff;">{{ $value2->player->name ??''}}</td>
                        <td>
                          <a class="btn btn-danger" href="{{ route('salary_delete',$value2->id ??'') }}">Delete</a>
                        </td>
                      </tr>
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
</div>
@endsection