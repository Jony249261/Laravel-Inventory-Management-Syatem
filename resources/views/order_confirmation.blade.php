@extends('layouts.app')

@section('content')


<!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->                      
            <div class="content-page jony">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="pull-left page-title">Invoice</h4>
                                <ol class="breadcrumb pull-right">
                                    <li><a href="#">Moltran</a></li>
                                    <li><a href="#">Pages</a></li>
                                    <li class="active">Invoice</li>
                                </ol>
                            </div>
                        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <!-- <div class="panel-heading">
                        <h4>Invoice</h4>
                    </div> -->
                    <div class="panel-body">
                        <div class="clearfix bg-info" style="padding:10px">
                            <div class="pull-left">
                                <h4 class="text-right text-white">Inventory</h4>
                                
                            </div>
                            <div class="pull-right text-white">
                                <h4 class="text-white">Invoice # <br>
                                    <strong>Order Date :{{$order->order_date}}</strong>
                                </h4>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                
                                <div class="pull-left m-t-30">
                                    <address>
                                            <b>Name:</b>  <span>{{$order->customer->name}}</span><br>
                                            <b>Shop Name:</b>  <span>{{$order->customer->shopname}}</span><br>
                                            <b>Address: </b> {{$order->customer->address}}<br>
                                            <b>City:</b> {{$order->customer->city}}<br>
                                            <b>phone Number:</b> {{$order->customer->phone}}
                                        </address>
                                </div>
                                <div class="pull-right m-t-30">
                                    <p><strong>Today:{{date('d-m-y')}} </strong> </p>
                                    <p class="m-t-10"><strong>Order Status: </strong> <span class="label label-pink">@if($order->order_status == 'Success')
                                    Success
                                @else
                                Pending
                                @endif
                                </span></p>
                                    <p class="m-t-10"><strong>Order ID: </strong> #{{$order->id}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="m-h-50"></div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table m-t-30">
                                        <thead>
                                            <tr><th>SL</th>
                                            <th>Name</th>
                                            <th>Product Code</th>
                                            <th>Quantity</th>
                                            <th>Unit Price</th>
                                            <th>Total</th>
                                        </tr></thead>
                                        <tbody>
                                            @php
                                                $s=1;
                                            @endphp
                                            @foreach($order->orderdetails as $content)
                                            <tr>
                                                <td>{{$s++}}</td>
                                                    <td>{{$content->product->product_name}}</td>

                                                    <td>{{$content->product->product_code}}</td>
                                                    <td>{{$content->quantity}}</td>
                                                    <td>{{$content->unitcost}}</td>
                                                    <td>{{$content->quantity * $content->unitcost}}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="border-radius: 0px;">
                        <div class="col-md-9">
                                
                                <h3 class="">Payment Status: {{$order->payment_status}}</h3>
                                <p class=""><b>Pay Amount:</b> {{$order->pay}}</p>
                                <p class="">Due Amount: {{$order->due}}</p>
                            </div>
                            <div class="col-md-3">
                                <p class="text-right"><b>Sub-total:</b> {{$order->sub_total}}</p>
                                <p class="text-right">Vat: {{$order->vat}}</p>
                                <hr>
                                <h3 class="text-right">Total: {{$order->total}}</h3>
                            </div>
                        </div>
                        <hr>
                        <div class="hidden-print">
                            <div class="pull-right">
                                <a onclick="window.print();" class="btn btn-inverse waves-effect waves-light"><i class="fa fa-print"></i></a>
                                @if($order->order_status == 'Success')
                                @else
                                <a href="{{url('pos-done/'.$order->id) }}" class="btn btn-primary waves-effect waves-light"><i class="far fa-check-circle"></i> Done</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>



            </div> <!-- container -->
                               
                </div> <!-- content -->

            </div>
            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->



@endsection