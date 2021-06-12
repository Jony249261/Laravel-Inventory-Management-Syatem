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
                        <li class="active">All Customer</li>
                    </ol>
                </div>
            </div>

            <!-- Start Widget -->
            <div class="row">
                
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading bg-info">
                            <h3 class="panel-title">All Pending Orders
                                <a href="{{route('success.orders')}}" class="btn btn-success pull-right"><i class="fas fa-plus-square"></i> Success Order</a>
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
                                                <th>Order date</th>
                                                <th>Total Products</th>
                                                <th>Total</th>
                                                <th>Payment Status</th>
                                                <th>Order Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                    
                                        <tbody>
                                            @php
                                                $i = 1;
                                            @endphp
                                            @foreach ($pending as $row)
                                            <tr>
                                                <td>{{ $i++ }}</td>
                                                <td>{{ $row->name }}</td>
                                                <td>{{ $row->order_date }}</td>
                                                <td>{{ $row->total_products }}</td>
                                                <td>{{ $row->total }}</td>
                                                <td>{{ $row->payment_status }}</td>
                                                <td>{{ $row->order_status }}</td>
                                                <td>
                                                    <a href="{{url('view-order-status/'.$row->id)}}" class="btn btn-sm btn-success"><i class="fa fa-eye"></i> View</a>
                                                    
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
