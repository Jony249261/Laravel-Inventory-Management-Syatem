@extends('layouts.app')

@section('content')
<div class="content-page">
<!-- Start content -->
    <div class="content">
        
        <div class="container">

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="pull-left page-title">Welcome !</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="#">Enventory</a></li>
                        <li class="active">Yearly Expense</li>
                    </ol>
                </div>
            </div>

            

            <!-- Start Widget -->
            <div class="row">
            @php
            $date = date('Y');
            $expenses = DB::table('expenses')->where('year',$date)->sum('amount');
            @endphp
                
                <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading bg-info">
                                        <h3 class="panel-title">{{date('Y')}} All Expense
                                        
                                            <a class=" pull-right" style="margin-left:150px; font-size:20px"> <i class="fas fa-plus-square"></i> Total: {{$expenses}} Tk</a>
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
                                                        </tr>
                                                    </thead>

                                             
                                                    <tbody>
                                                        @php
                                                            $i = 1;
                                                        @endphp
                                                        @foreach ($expense as $row)
                                                        <tr>
                                                            <td>{{ $i++ }}</td>
                                                            <td>{{ $row->details }}</td>
                                                            <td>{{ $row->date }}</td>
                                                            <td>{{ $row->amount }}</td>
                                                            
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
