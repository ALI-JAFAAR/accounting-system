@extends('layouts.app')
@section('content')
<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="card">
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
                  <div class="card-header card-header-tabs card-header-info">
                    <div class="nav-tabs-navigation">
                      <div class="nav-tabs-wrapper">
                        <span class="nav-tabs-title">Project:</span>
                        <ul class="nav nav-tabs" data-tabs="tabs">
                          <li class="nav-item">
                            <a class="nav-link active" href="#profile" data-toggle="tab">
                              <i class="material-icons">bug_report</i> New Project
                              <div class="ripple-container"></div>
                            </a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="#messages" data-toggle="tab">
                              <i class="material-icons">code</i> Add Payment
                              <div class="ripple-container"></div>
                            </a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="#projects" data-toggle="tab">
                              <i class="material-icons">code</i> Projects
                              <div class="ripple-container"></div>
                            </a>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>

                  <div class="card-body">
                    
                    <div class="tab-content">
                      
                      <div class="tab-pane active" id="profile">
                        <form method="post" >
                          <br>
                          <br>
                          {{ csrf_field() }}
                          <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <label class="bmd-label-floating">Project name</label>
                                <input name="name" type="text" class="form-control">
                              </div>
                            </div>
                          </div>
                          <br>
                          <br>
                          <br>
                          <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <label class="bmd-label-floating">Project Details</label>
                                <textarea name="details" type="text" class="form-control">
                                </textarea>
                              </div>
                            </div>
                          </div>
                          <br>
                          <br>
                          <br>
                          <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <label class="bmd-label-floating">Customer</label>
                                <select name="customer" type="text" class="form-control">
                                  <option></option>
                                  @foreach($cus as $row)
                                    <option style="color: black;" value="{{ $row->id }}">{{ $row->name }}</option>
                                  @endforeach
                                </select>
                              </div>
                            </div>
                          </div>
                          <br>
                          <br>
                          <br>
                          <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <label class="bmd-label-floating">Project Cost</label>
                                <input name="price" type="text" class="form-control">
                              </div>
                            </div>
                          </div>
                          <br>
                          <br>
                          <br>
                          <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <label class="bmd-label-floating">First Payment</label>
                                <input name="payment" type="text" class="form-control">
                              </div>
                            </div>
                          </div>
                          <br>
                          <br>
                          <br>
                          <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <label class="bmd-label-floating">Programmer Name</label>
                                <select name="player[]" multiple type="text" class="select2 form-control">
                                  <option></option>
                                  @foreach($pla as $row)
                                    <option style="color: black;" value="{{ $row->id }}">{{ $row->name }}</option>
                                  @endforeach
                                </select>
                              </div>
                            </div>
                          </div>
                          <br>
                          <br>
                          <br>
                          <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <label class="bmd-label-floating">Department</label>
                                <select name="dept" type="text" class="form-control">
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
                          <br>
                          <center>  
                            <button type="submit" class="btn btn-warning" name="add">Save</button>
                          </center>
                          <div class="clearfix"></div>
                        </form>
                      </div>
                      
                      <div class="tab-pane" id="messages">
                        <form method="post" action="{{route('payment') }}">
                          {{ csrf_field() }}
                          <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <label class="bmd-label-floating">Projects</label>
                                <select name="pro_id" type="text" class="form-control">
                                  <option></option>
                                  @foreach($pro as $row)
                                    <option style="color: black;" value="{{ $row->id }}">{{ $row->name }}</option>
                                  @endforeach
                                </select>
                              </div>
                            </div>
                          </div>
                          <br>
                          <br>
                          <br>
                          <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <label class="bmd-label-floating">Value</label>
                                <input name="value" type="text" class="form-control">
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
                      
                      <div class="tab-pane" id="projects">
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
                                      <th>ID</th>
                                      <th>Project Name</th>
                                      <th>Project details</th>
                                      <th>Customer Name</th>
                                      <th>Projects Price</th>
                                      <th>Project Programmers</th>
                                      <th>Project Department </th>
                                      <th>Creation Date</th>
                                      <th>Action</th>
                                    </thead>
                                    <tbody>
                                      @if($pla ??'')
                                      @foreach($pro as $row)
                                      <tr>
                                        <td>{{ $row->id }}</td>
                                        <td>{{ $row->name }}</td>
                                        <td>{{ $row->details }}</td>
                                        <td>{{ $row->customer->name??'' }}</td>
                                        <td>{{ $row->price }}</td>
                                        <td>
                                          @foreach($row->players as $player)
                                            {{ $player->name }}<br>,{{ $player->department->name }}<br>
                                          @endforeach
                                        </td>
                                        <td>{{ $row->department->name ??''}}</td>
                                        <td>{{ $row->created_at }}</td>
                                        <td>
                                          <a class="btn btn-danger" href="{{ route('project-del',$row->id ??'') }}">
                                            Delete
                                          </a>
                                          <a class="btn btn-warning"  href="{{ route('pro-print',$row->id ??'') }}">
                                            Print Inovice
                                          </a>
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
                  </div>
                </div>
            </div>
          </div>

          
        </div>
      </div>
@endsection

