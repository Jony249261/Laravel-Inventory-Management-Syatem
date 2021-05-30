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
                        <li class="active">View Product</li>
                    </ol>
                </div>
            </div>

            <!-- Start Widget -->
            <div class="row">
                
                <!-- Basic example -->
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading bg-info"><h3 class="panel-title ">View Product</h3></div>
                        <br>
                        <div class="panel-body">
                            
                            
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Product Name</label>
                                            <input type="text" class="form-control" id="name" value="{{$product->product_name}}" readonly name="product_name">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email">Product Code</label>
                                            <input type="text" class="form-control" id="email" name="product_code" value="{{$product->product_code}}" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            
                                            <label for="phone">Category</label>
                                            <input type="text" class="form-control" id="email" name="product_code" value="{{$product->cat_name}}" readonly>
                                        </div>
                                            
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            
                                            <label for="phone">Supplier</label>
                                            <input type="text" class="form-control" id="email" name="product_code" value="{{$product->name}}" readonly>
                                        </div>
                                            
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="experience">Product Godaun</label>
                                            <input type="text" class="form-control" name="product_garage" id="experience" value="{{$product->product_garage}}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            
                                            <label for="photo">Photo</label>
                                            <img id="image" src="{{asset($product->product_image) }}" width="25%" height="25%">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="salary">Product Route</label>
                                            <input type="text" class="form-control" name="product_route" id="salary" value="{{$product->product_route}}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="vacation">Buying Date</label>
                                            <input type="date" class="form-control" name="buy_date" id="vacation" value="{{$product->buy_date}}" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="City">Expire Date</label>
                                            <input type="date" class="form-control" name="expire_date" id="City" value="{{$product->expire_date}}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="nid_no">Buying Price</label>
                                            <input type="text" class="form-control" id="nid_no" name="buying_price" value="{{$product->buying_price}}" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="City">Selling Price</label>
                                            <input type="text" class="form-control" name="selling_price" id="City" value="{{$product->selling_price}}" readonly>
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
