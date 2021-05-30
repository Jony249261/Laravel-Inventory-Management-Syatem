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
                        <li class="active">Update Product</li>
                    </ol>
                </div>
            </div>

            <!-- Start Widget -->
            <div class="row">
                
                <!-- Basic example -->
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading bg-info"><h3 class="panel-title ">Update Product</h3></div>
                        <br>
                        <div class="panel-body">
                            <form method="post" enctype="multipart/form-data" action="{{route('product-update',$product->id)}}">
                            @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Product Name</label>
                                            <input type="text" class="form-control" id="name" value="{{$product->product_name}}" name="product_name">
                                        </div>
                                        @if ($errors->has('product_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('product_name') }}</strong>
                                    </span>
                                @endif
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email">Product Code</label>
                                            <input type="text" class="form-control" id="email" name="product_code" value="{{$product->product_code}}"">
                                        </div>
                                        @if ($errors->has('product_code'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('product_code') }}</strong>
                                    </span>
                                @endif
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            @php
                                            $cat = DB::table('categories')->get();
                                            @endphp
                                            <label for="phone">Category</label>
                                            
                                            <select name="cat_id" id="" class="form-control">
                                                @foreach($cat as $row)
                                                <option value="{{$row->id}} " {{ $product->cat_id == $row->id ? "selected" : "" }}>{{$row->cat_name}}</option>
                                                @endforeach
                                            </select>
                                            
                                        </div>
                                        @if ($errors->has('cat_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('cat_id') }}</strong>
                                    </span>
                                @endif
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            @php
                                            $sup = DB::table('suppliers')->get();
                                            @endphp
                                            <label for="address">Supplier</label>
                                            <select name="sup_id" id="" class="form-control">
                                                @foreach($sup as $row)
                                                <option value="{{$row->id}}" {{ $product->sup_id == $row->id ? "selected" : "" }}>{{$row->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @if ($errors->has('sup_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('sup_id') }}</strong>
                                    </span>
                                @endif
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="experience">Product Godaun</label>
                                            <input type="text" class="form-control" name="product_garage" id="experience" value="{{$product->product_garage}}">
                                        </div>
                                        @if ($errors->has('product_garage'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('product_garage') }}</strong>
                                    </span>
                                @endif
                                
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <img id="image" src="{{asset($product->product_image)}}" width="25%" height="25%">
                                            <label for="photo">Photo</label>
                                            <input type="file" class="upload" accept="image/*"  name="product_image" id="photo" onchange="readURL(this);">
                                        </div>
                                        @if ($errors->has('product_image'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('product_image') }}</strong>
                                    </span>
                                @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="salary">Product Route</label>
                                            <input type="text" class="form-control" name="product_route" id="salary" value="{{$product->product_route}}">
                                        </div>
                                        @if ($errors->has('product_route'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('product_route') }}</strong>
                                    </span>
                                @endif
                                
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="vacation">Buying Date</label>
                                            <input type="date" class="form-control" name="buy_date" id="vacation" value="{{$product->buy_date}}">
                                        </div>
                                        @if ($errors->has('buy_date'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('buy_date') }}</strong>
                                    </span>
                                @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="City">Expire Date</label>
                                            <input type="date" class="form-control" name="expire_date" id="City" value="{{$product->expire_date}}">
                                        </div>
                                        @if ($errors->has('expire_date'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('expire_date') }}</strong>
                                    </span>
                                @endif
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="nid_no">Buying Price</label>
                                            <input type="text" class="form-control" id="nid_no" name="buying_price" value="{{$product->buying_price}}">
                                        </div>
                                        @if ($errors->has('buying_price'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('buying_price') }}</strong>
                                    </span>
                                @endif
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="City">Selling Price</label>
                                            <input type="text" class="form-control" name="selling_price" id="City" value="{{$product->selling_price}}">
                                        </div>
                                        @if ($errors->has('selling_price'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('selling_price') }}</strong>
                                    </span>
                                @endif
                                    </div>
                                    
                                </div>
                                
                                
                                
                                
                                
                                
                                
                                <button type="submit" class="btn btn-purple waves-effect waves-light">Update</button>
                            </form>
                        </div><!-- panel-body -->
                    </div> <!-- panel -->
                </div> <!-- col-->
            </div> 
            <!-- End row-->



        </div> <!-- container -->
                               
    </div> <!-- content -->
</div>



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
