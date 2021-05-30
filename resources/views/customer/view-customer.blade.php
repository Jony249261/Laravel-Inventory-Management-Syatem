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
                        <li class="active">View Customer</li>
                    </ol>
                </div>
            </div>

            <!-- Start Widget -->
            <div class="row">
                
                <!-- Basic example -->
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading bg-info"><h3 class="panel-title ">Customer Details</h3></div>
                        <br>
                        <div class="panel-body">
                            
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" class="form-control" readonly id="name" value="{{$customer->name}}" name="name">
                                        </div>
                                        
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control" readonly  id="email" name="email" value="{{$customer->email}}">
                                        </div>
                                        
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="phone">phone</label>
                                            <input type="text" class="form-control" readonly id="phone" value="{{$customer->phone}}" name="phone">
                                        </div>
                                        
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="address">Address</label>
                                            <input type="text" class="form-control" readonly id="address" value="{{$customer->address}}" name="address">
                                        </div>
                                        
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="experience">Shop Name</label>
                                            <input type="text" class="form-control" readonly name="experience" id="experience" value="@if($customer->shopname == NULL)NO Shop @elseif($customer->shopname != NULL){{$customer->shopname}}
                                            @endif
                                           ">
                                        </div>
                                        
                                
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            
                                            <label for="image">Photo</label>
                                            <img id="image" src="{{asset($customer->photo)}}" width="20%" height="20%">
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="salary">Account Holder</label>
                                            <input type="text" class="form-control" readonly name="salary" id="salary" value="{{$customer->account_holder}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="vacation">Account Number</label>
                                            <input type="text" class="form-control" readonly name="vacation" id="vacation" value="{{$customer->account_number}}">
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="City">City</label>
                                            <input type="text" class="form-control" readonly name="city" id="City" value="{{$customer->city}}"">
                                        </div>
                                       
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="nid_no">Bank Name</label>
                                            <input type="text" class="form-control" readonly id="nid_no" name="nid_no" value="{{$customer->bank_name}}">
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="City">Bank Branch</label>
                                            <input type="text" class="form-control" readonly name="city" id="City" value="{{$customer->bank_branch}}"">
                                        </div>
                                       
                                    </div>
                                </div>
                        </div><!-- panel-body -->
                    </div> <!-- panel -->
                </div> <!-- col-->
            </div> 
            <!-- End row-->



        </div> <!-- container -->
                               
    </div> <!-- content -->
</div>


@endsection
