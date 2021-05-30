@extends('layouts.app')

@section('content')
<div class="content-page">
<!-- Start content -->
    <div class="content">
        <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        @if(session('success'))
                  <div class="alert alert-danger alert-dismissible" role="alert">
                  <strong>{!! session('success') !!}</strong>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    @endif
                    @if(session('warning'))
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong>{!! session('warning') !!}</strong>
                    </div>
                    @endif
                    </div>
                </div>
        <div class="container">

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="pull-left page-title">Welcome !</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="#">Enventory</a></li>
                        <li class="active">All Advanced Salary</li>
                    </ol>
                </div>
            </div>

            <!-- Start Widget -->
            <div class="row">
                
                <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading bg-info">
                                        <h3 class="panel-title">All Advanced Salary
                                            <a href="{{route('advanced.salary')}}" class="btn btn-success pull-right"><i class="fas fa-plus-square"></i> Create</a>
                                        </h3>
                                        
                                        
                                    
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <table id="datatable" class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>SL</th>
                                                            <th>Name</th>
                                                            <th>Salary</th>
                                                            <th>Month</th>
                                                            <th>Advance</th>
                                                            <th>photo</th>
                                                            <th>City</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>

                                             
                                                    <tbody>
                                                        @php
                                                            $i = 1;
                                                        @endphp
                                                        @foreach ($salary as $row)
                                                        <tr>
                                                            <td>{{ $i++ }}</td>
                                                            <td>{{ $row->name }}</td>
                                                            <td>{{ $row->salary }}</td>
                                                            <td>{{ $row->month }}</td>
                                                            <td>{{ $row->advanced_salary }}</td>
                                                            <td> <img src="{{ asset($row->photo) }}" alt="" width="50px" height="50px"> </td>
                                                            <td>{{ $row->city }}</td>
                                                            <td><a href="{{url('customer-edit/'.$row->id)}}" class="btn btn-sm btn-success"><i class="fa fa-pencil"></i> Edit</a>
                                                                <a href="{{url('customer-delete/'.$row->id)}}" id="delete" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Delete</a>
                                                                <a href="{{url('customer-view/'.$row->id)}}" class="btn btn-sm btn-success"><i class="fa fa-eye"></i> View</a>
                                                                
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
            <!-- End row-->



        </div> <!-- container -->
                               
    </div> <!-- content -->
</div>





@endsection
