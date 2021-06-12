@extends('layouts.app')

@section('content')
<div class="content-page">
<!-- Start content -->
    <div class="content">
        <div class="container">

            <!-- Page-Title -->
            <div class="row">
                
                <div class="col-sm-12 bg-info">
                    <h4 class="pull-left page-title text-white">POS (Point of Sale)</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="#" class="text-white">Jony</a></li>
                        <li class="text-white">{{date('d-m-y')}}</li>
                    </ol>
                </div>
            </div>
<br>
            <div class="row">
                
                <div class="col-md-12">
                    <div class="portfolioFilter">
                    @foreach($category as $row)
                        <a href="#" data-filter="*" class="current">{{$row->cat_name}}</a>
                    @endforeach
                    </div>
                </div>
            </div>
<br>
            <div class="row">
                <div class="col-md-5">
                    
                    <div class="price_card text-center">
                                        
                    <ul class="price-features" style="border:1px solid grey">
                        <table class="table">
                            <thead class="bg-info">
                                <tr>
                                    <th class="text-white">Name</th>
                                    <th class="text-white">Qty</th>
                                    <th class="text-white">Qty</th>
                                    <th class="text-white">Unit Price</th>
                                    <th class="text-white">Action</th>
                                </tr>
                            </thead>
                                @php
                                $productss = Cart::content();
                                @endphp

                            <tbody>
                                @foreach($productss as $prod)
                                <tr>
                                    <th>{{$prod->name}}</th>
                                    <th>
                                    <form action="{{url('/cart-update/'.$prod->rowId)}}" method="post">
                                    @csrf
                                    <input type="number" name="qty" value="{{$prod->qty}}" style="width:60px">
                                    <button type="submit" class="btn btn-sm btn-success" style="margin-top:-3px"><i class="fa fa-check"></i></button>
                                    </form>
                                    </th>
                                    <th>{{$prod->qty}}</th>
                                    <th>{{$prod->price}}</th>
                                    <th><a href="{{url('cart-delete/'.$prod->rowId)}}" id="delete" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Delete</a></th>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </ul>
                    <div class="pricing-header bg-info" style="padding-top:15px; padding-bottom:5px">
                        <p style="font-size:18px">Quantity: {{Cart::count()}}</p>
                        <p style="font-size:18px">Sub Total: {{Cart::subtotal()}}</p>
                        <p style="font-size:18px">Vat: {{Cart::tax()}}</p>
                        <hr>
                        <p><h2 class="text-white">Total: <span style="font-size:30px">{{Cart::total()}}</span></h2><h1 class="text-white"></h1></p>
                    
                        <form action="{{ url('/invoice')}}" method="post">
                    @csrf
                   

                    </div>
                    <hr>
                    <div class="panel panel-default">
                        <div class="panel-heading bg-info"><h3 class="panel-title ">Customer
                            <a class="btn btn-success pull-right" data-toggle="modal" data-target="#con-close-modal"><i class="fa fa-plus"></i> Add New <span style="margin-right:20px"></span></a>
                        </h3>
                        <br>
                        <select name="cus_name" class="form-control">
                            <option selected="" disabled="">Select Customer</option>
                            @foreach($customer as $cus)
                            <option value="{{$cus->id}}">{{ $cus->name}}</option>
                            @endforeach
                        </select>
                        <br>
                        @if ($errors->has('cus_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('cus_name') }}</strong>
                                    </span>
                                @endif
                        </div>
                        
                    </div>
                    <button type="submit" class="btn btn-success">Create Invoice</button>
                </div>

                </div>
            </form>
                <div class="col-md-7">
                <div class="panel panel-default">
                        <div class="panel-heading bg-info"><h3 class="panel-title ">All Products
                        </h3>
                        </div>
                        </div>
                    <table id="datatable" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Category Name</th>
                                    <th>Product Code</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                        
                            <tbody>
                                @foreach ($product as $row)
                                <tr>
                                    <form action="{{route('add-cart')}}" method="post">
                                    @csrf

                                    <input type="hidden" name="id" value="{{$row->id}}">
                                    <input type="hidden" name="name" value="{{$row->product_name}}">
                                    <input type="hidden" name="qty" value="1">
                                    <input type="hidden" name="price" value="{{$row->selling_price}}">


                                    <td>
                                    <img src="{{ asset($row->product_image) }}" alt="" width="60px" height="60px"> 
                                    </td>
                                    <td>{{ $row->product_name }}</td>
                                    <td>{{ $row->selling_price }}</td>
                                    <td>{{ $row->cat_name }}</td>
                                    <td>{{ $row->product_code }}</td>
                                    <td>
                                        <button type="submit" class="btn btn-info btn-sm"><i class="fas fa-cart-plus"></i></button>
                                    </td>
                                    </form>
                                @endforeach
                            </tbody>
                    </table>
                </div>
            </div>

        </div> <!-- container -->           
    </div> <!-- content -->
</div>



<form method="post" enctype="multipart/form-data" action="{{url('/insert-customer')}}">
        @csrf
    <!-- Custom Modals -->
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading bg-primary"> 
                    <h3 class="panel-title">Add Customer</h3> 
                </div> 
                <div class="panel-body"> 
                    <!-- sample modal content -->

                    
                    
                    <div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                        <div class="modal-dialog"> 
                            
                            <div class="modal-content"> 
                                <div class="modal-header "> 
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
                                    <h4 class="modal-title">Add Customer</h4> 
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
                                        <div class="col-md-6"> 
                                            <div class="form-group"> 
                                                <label for="field-1" class="control-label">Name</label> 
                                                <input type="text" name="name" class="form-control" id="field-1" placeholder="Catgory Name"> 
                                            </div> 
                                        </div> 
                                        <div class="col-md-6"> 
                                            <div class="form-group"> 
                                                <label for="field-1" class="control-label">Email</label> 
                                                <input type="text" name="email" class="form-control" id="field-1" placeholder="Catgory Name"> 
                                            </div> 
                                        </div> 
                                        
                                    </div> 

                                    <div class="row"> 
                                        <div class="col-md-6"> 
                                            <div class="form-group"> 
                                                <label for="field-1" class="control-label">Phone</label> 
                                                <input type="text" name="phone" class="form-control" id="field-1" placeholder="Catgory Name"> 
                                            </div> 
                                        </div> 
                                        <div class="col-md-6"> 
                                            <div class="form-group"> 
                                                <label for="field-1" class="control-label">Addrress</label> 
                                                <input type="text" name="address" class="form-control" id="field-1" placeholder="Catgory Name"> 
                                            </div> 
                                        </div> 
                                        
                                    </div> 

                                    <div class="row"> 
                                        <div class="col-md-6"> 
                                            <div class="form-group"> 
                                                <label for="field-1" class="control-label">Shop Name</label> 
                                                <input type="text" name="shopname" class="form-control" id="field-1" placeholder="Catgory Name"> 
                                            </div> 
                                        </div> 
                                        <div class="col-md-6"> 
                                            <div class="form-group">
                                            <img id="image" src="#">
                                            <label for="photo">Photo</label>
                                            <input type="file" class="upload" accept="image/*"  name="photo" id="photo" onchange="readURL(this);">
                                            </div> 
                                        </div> 
                                        
                                    </div> 

                                    <div class="row"> 
                                        <div class="col-md-6"> 
                                            <div class="form-group"> 
                                                <label for="field-1" class="control-label">Account Holder</label> 
                                                <input type="text" name="account_holder" class="form-control" id="field-1" placeholder="Catgory Name"> 
                                            </div> 
                                        </div> 
                                        <div class="col-md-6"> 
                                            <div class="form-group"> 
                                                <label for="field-1" class="control-label">Account Number</label> 
                                                <input type="text" name="account_number" class="form-control" id="field-1" placeholder="Catgory Name"> 
                                            </div> 
                                        </div> 
                                        
                                    </div> 

                                    <div class="row"> 
                                        <div class="col-md-4"> 
                                            <div class="form-group"> 
                                                <label for="field-1" class="control-label">Bank Name</label> 
                                                <input type="text" name="bank_name" class="form-control" id="field-1" placeholder="Catgory Name"> 
                                            </div> 
                                        </div> 
                                        <div class="col-md-4"> 
                                            <div class="form-group"> 
                                                <label for="field-1" class="control-label">Bank Branch</label> 
                                                <input type="text" name="bank_branch" class="form-control" id="field-1" placeholder="Catgory Name"> 
                                            </div> 
                                        </div> 
                                        <div class="col-md-4"> 
                                            <div class="form-group"> 
                                                <label for="field-1" class="control-label">City</label> 
                                                <input type="text" name="city" class="form-control" id="field-1" placeholder="Catgory Name"> 
                                            </div> 
                                        </div>
                                        
                                    </div> 
                                    
                                </div> 
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

<script type="text/javascript">
    function readURL(input){
        if(input.files && input.files[0]){
            var reader = new FileReader();
            reader.onload = function (e){
                $('#image')
                    .attr('src', e.target.result)
                    .width(80)
                    .height(80);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

@endsection
