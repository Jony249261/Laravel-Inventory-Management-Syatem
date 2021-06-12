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
                                                    <strong>{{date('d-m-y')}}</strong>
                                                </h4>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-12">
                                                
                                                <div class="pull-left m-t-30">
                                                    <address>
                                                      <strong>Name: {{$customer->name}}</strong><br>
                                                      <strong>Shop Name: {{$customer->shopname}}</strong><br>
                                                      Address: {{$customer->address}}
                                                      <br>
                                                      City: {{$customer->city}} <br>
                                                      <abbr title="Phone"></abbr> Phone: {{$customer->phone}}
                                                      </address>
                                                </div>
                                                <div class="pull-right m-t-30">
                                                    <p><strong>Order Date: </strong> {{date('d-m-y')}}</p>
                                                    <p class="m-t-10"><strong>Order Status: </strong> <span class="label label-pink">Pending</span></p>
                                                    <p class="m-t-10"><strong>Order ID: </strong> #123456</p>
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
                                                            <th>Item</th>
                                                            <th>Quantity</th>
                                                            <th>Unit Price</th>
                                                            <th>Total</th>
                                                        </tr></thead>
                                                        <tbody>
                                                            @php
                                                            $i = 1;
                                                        @endphp
                                                        @foreach ($contents as $row)
                                                            <tr>
                                                                <td>{{ $i++ }}</td>
                                                                <td>{{ $row->name }}</td> 
                                                                <td>{{$row->qty}}</td>
                                                                <td>{{ $row->price }}</td>
                                                                <td>{{$row->qty * $row->price}}</td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="border-radius: 0px;">
                                            <div class="col-md-3 col-md-offset-9">
                                                <p class="text-right"><b>Sub-total:</b> {{Cart::subtotal()}}</p>
                                                <p class="text-right">Vat: {{Cart::tax()}}</p>
                                                <hr>
                                                <h3 class="text-right">Total: {{Cart::total()}}</h3>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="hidden-print">
                                            <div class="pull-right">
                                                <a onclick="window.print();" class="btn btn-inverse waves-effect waves-light"><i class="fa fa-print"></i></a>
                                                <a href="#" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#con-close-modal">Submit</a>
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



<form method="post" enctype="multipart/form-data" action="{{url('/final-invoice')}}">
        @csrf
    <!-- Custom Modals -->
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading bg-primary"> 
                    <h3 class="panel-title">Invoice of {{$customer->name}}</h3> 
                </div> 
                <div class="panel-body"> 
                    <!-- sample modal content -->

                    
                    
                    <div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                        <div class="modal-dialog"> 
                            
                            <div class="modal-content"> 
                                <div class="modal-header "> 
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
                                    <h4 class="modal-title">Invoice of {{$customer->name}} <span class="pull-right">Total: {{Cart::total()}}</span></h4> 
                                </div> 
                                @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
                                <div class="modal-body"> 
                                    <div class="row"> 
                                        <div class="col-md-4"> 
                                            <div class="form-group"> 
                                                <label for="field-1" class="control-label">Payment</label> 
                                                <select name="payment_status" class="form-control">
                                                    <option value="Handcash">Handcash</option>
                                                    <option value="Check">Check</option>
                                                    <option value="Due">Due</option>
                                                </select>
                                            </div> 
                                        </div> 
                                        <div class="col-md-4"> 
                                            <div class="form-group"> 
                                                <label for="field-1" class="control-label">Pay</label> 
                                                <input type="text" name="pay" class="form-control" id="field-1" placeholder="Pay Amount"> 
                                            </div> 
                                        </div> 
                                        <div class="col-md-4"> 
                                            <div class="form-group"> 
                                                <label for="field-1" class="control-label">Due</label> 
                                                <input type="text" name="due" class="form-control" id="field-1" placeholder="Due Amount"> 
                                            </div> 
                                        </div>
                                        
                                    </div> 
                                    
                                </div>

                                <input type="hidden" value="{{$customer->id}}" name="customer_id">
                                <input type="hidden" value="{{date('d-m-y')}}" name="order_date">
                                <input type="hidden" value="pending" name="order_status">
                                <input type="hidden" value="{{Cart::count()}}" name="total_products">
                                <input type="hidden" value="{{Cart::subtotal()}}" name="sub_total">
                                <input type="hidden" value="{{Cart::tax()}}" name="vat">
                                <input type="hidden" value="{{Cart::total()}}" name="total">

                                <div class="modal-footer"> 
                                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button> 
                                    <button type="submit" class="btn btn-info waves-effect waves-light">Create</button> 
                                </div> 
                            </div> 

                        </div>
                    </div><!-- /.modal -->

                    

                    
                    
                    

                </div>
            </div>
        </div>
    </div> <!-- End row -->

</form>

@endsection