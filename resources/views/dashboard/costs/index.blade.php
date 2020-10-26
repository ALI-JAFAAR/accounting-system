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
                        <span class="nav-tabs-title">Costs:</span>
                        <ul class="nav nav-tabs" data-tabs="tabs">
                          <li class="nav-item">
                            <a class="nav-link active" href="#profile" data-toggle="tab">
                              <i class="material-icons">bug_report</i> Costs
                              <div class="ripple-container"></div>
                            </a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="#messages" data-toggle="tab">
                              <i class="material-icons">code</i> Type
                              <div class="ripple-container"></div>
                            </a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="#settings" data-toggle="tab">
                              <i class="material-icons">cloud</i> Frequincies
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
                          {{ csrf_field() }}
                          <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <label class="bmd-label-floating">Type</label>
                                <select name="type" type="text" class="form-control">
                                  <option></option>
                                  @foreach($type as $row)

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
                                <label class="bmd-label-floating">Frequincy</label>
                                <select name="freq" type="text" class="form-control">
                                  <option></option>
                                  @foreach($freq as $row)

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
                                <label class="bmd-label-floating">Amount</label>
                                <input name="amount" type="text" class="form-control">
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
                      
                      <div class="tab-pane" id="messages">
                        <form method="post" action="{{route('type') }}">
                          {{ csrf_field() }}
                          <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <label class="bmd-label-floating">type Name</label>
                                <input name="type" type="text" class="form-control">
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
                      
                      <div class="tab-pane" id="settings">
                        <form method="post" action="{{route('freq') }}">
                          {{ csrf_field() }}
                          <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <label class="bmd-label-floating">Frequincy </label>
                                <input name="freq" type="text" class="form-control">
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
            </div>
          </div>






          
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-info">
                  <h4 class="card-title ">Costs Table</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
                        <th>ID</th>
                        <th>Cost Amount</th>
                        <th>Type</th>
                        <th>Frequincy</th>
                        <th>Date</th>
                        <th>Action</th>
                      </thead>
                      <tbody>
                        @if($data ?? '')
                        @foreach($data   as $row)
                          <tr>
                            <td>{{ $row->id }}</td>
                            <td>{{ $row->amount }}</td>
                            <td>{{ $row->type->name }}</td>
                            <td>{{ $row->freq->name }}</td>
                            <td>{{ $row->created_at }}</td>
                            <td><a class="btn btn-danger" href="{{ route('cost_delete', $row->id) }}">Delete</a></td>
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