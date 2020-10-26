@extends('layouts.app')
@section('content')
<div class="content">
        <div class="container-fluid">
                    <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-info">
                  <h4 class="card-title">Add Player</h4>
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
                            <label class="bmd-label-floating">Player Name</label>
                            <input name="name" type="text" class="form-control">
                          </div>
                        </div>
                      </div>
                      <br>
                      <br>
                      <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label class="bmd-label-floating">Department Name</label>
                            <select name="department_id" type="text" class="form-control">
                              <option></option>
                              @foreach($dept as $row)
                                <option style="color: black;" value="{{ $row->id }}">{{ $row->name }}</option>
                              @endforeach
                            </select>
                          </div>
                        </div>
                      </div>
                      <br>
                      <br>
                      <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label class="bmd-label-floating">Position</label>
                            <input name="position" type="text" class="form-control">
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
                  <h4 class="card-title ">Players Table</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
                        <th>
                          ID
                        </th>
                        <th>
                          Player name
                        </th>
                        <th>
                          Department
                        </th>
                        <th>
                          Position
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
                            <td>{{ $row->department->name ??''}}</td>
                            <td>{{ $row->position }}</td>
                            <td><a class="btn btn-danger" href="/player_del/{{ $row->id }}">Delete</a></td>
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