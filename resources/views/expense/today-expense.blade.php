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
                        <li class="active">Today Expense</li>
                    </ol>
                </div>
            </div>

            <!-- Start Widget -->
            <div class="row">
            @php
            $date = date('d-m-y');
            $expense = DB::table('expenses')->where('date',$date)->sum('amount');
            @endphp
                
                <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading bg-info">
                                        <h3 class="panel-title">Today Expense
                                        <span class="text-center" style="margin-left:150px; font-size:20px">Total: {{$expense}} Tk</span>
                                            <a href="{{route('add.expense')}}" class="btn btn-success pull-right"> <i class="fas fa-plus-square"></i> Add New</a>
                                        </h3>
                                        
                                        
                                    
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <table id="datatable" class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>SL</th>
                                                            <th>Expense Details</th>
                                                            <th>Date</th>
                                                            <th>Expense Amount</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>

                                             
                                                    <tbody>
                                                        @php
                                                            $i = 1;
                                                        @endphp
                                                        @foreach ($today as $row)
                                                        <tr>
                                                            <td>{{ $i++ }}</td>
                                                            <td>{{ $row->details }}</td>
                                                            <td>{{ $row->date }}</td>
                                                            <td>{{ $row->amount }}</td>
                                                            <td><a href="{{url('edit-today-expense/'.$row->id)}}" class="btn btn-sm btn-success" ><i class="fa fa-pencil"></i> Edit</a>
                                                                <a href="{{url('today-expense-delete/'.$row->id)}}" id="delete" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Delete</a>
                                                                
                                                                
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </>
            </div> 
            <!-- End row-->



        </div> <!-- container -->
                               
    </div> <!-- content -->
</div>



@endsection
