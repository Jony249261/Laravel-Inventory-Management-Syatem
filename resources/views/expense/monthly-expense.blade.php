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
                        <li class="active">Monthly Expense</li>
                    </ol>
                </div>
            </div>

                <div>
                <a href="{{route('january.expense')}}" class="btn btn-sm btn-info">Jan</a>
                <a href="{{route('february.expense')}}" class="btn btn-sm btn-danger">Feb</a>
                <a href="{{route('march.expense')}}" class="btn btn-sm btn-success">March</a>
                <a href="{{route('april.expense')}}" class="btn btn-sm btn-warning">April</a>
                <a href="{{route('may.expense')}}" class="btn btn-sm btn-danger">May</a>
                <a href="{{route('june.expense')}}" class="btn btn-sm btn-info">June</a>
                <a href="{{route('july.expense')}}" class="btn btn-sm btn-success">July</a>
                <a href="{{route('august.expense')}}" class="btn btn-sm btn-warning">August</a>
                <a href="{{route('september.expense')}}" class="btn btn-sm btn-info">September</a>
                <a href="{{route('october.expense')}}" class="btn btn-sm btn-danger">October</a>
                <a href="{{route('november.expense')}}" class="btn btn-sm btn-success">November</a>
                <a href="{{route('december.expense')}}" class="btn btn-sm btn-warning">December</a>
            </div>
            <br>
            <!-- Start Widget -->
            <div class="row">
            @foreach ($expense as $row)
            @php
            $expenses = DB::table('expenses')->where('month',$row->month)->sum('amount');
            @endphp
            @endforeach
                
                <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading bg-info">
                                    
                                        <h3 class="panel-title">Monthly All Expense
                                        
                                            <a class=" pull-right" style="margin-left:150px; font-size:20px"> <i class="fas fa-plus-square"></i> Total: @if($expenses == NULL)0 @elseif($expenses != NULL){{$expenses}}
                                            @endif Tk</a>
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
