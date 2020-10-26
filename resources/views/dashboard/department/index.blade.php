@extends('layouts.app')
@section('content')
<div class="content">
        <div class="container-fluid">
                    <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-info">
                  <h4 class="card-title">Add Department</h4>
                </div>
                <div class="card-body">
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
                  <form method="post" >
                    {{ csrf_field() }}
                      <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label class="bmd-label-floating">Department Name</label>
                            <input name="name" type="text" class="form-control">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label class="bmd-label-floating">Details</label>
                            <input name="details" type="text" class="form-control">
                          </div>
                        </div>
                      </div>
                      <br>
                      <br>
                      <br>
                      <center>  <button type="submit" class="btn btn-warning" name="add">Save</button></center>
                      <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-info">
                  <h4 class="card-title ">Departments Table</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
                        <th>
                          ID
                        </th>
                        <th>
                          DEPARTMENT NAME
                        </th>
                        <th>
                          Details
                        </th>
                        <th>
                          Creation Date
                        </th>
                        <th>
                          Action
                        </th>
                      </thead>
                      <tbody>
                        @foreach($data as $row)
                          <tr>
                            <td>{{ $row->id }}</td>
                            <td>{{ $row->name }}</td>
                            <td>{{ $row->details }}</td>
                            <td>{{ $row->created_at }}</td>
                            <td>
                              <a class="btn btn-danger" href="{{ route('department-del',$row->id ??'') }}">Delete</a>
                            </td>
                          </tr>
                        @endforeach
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