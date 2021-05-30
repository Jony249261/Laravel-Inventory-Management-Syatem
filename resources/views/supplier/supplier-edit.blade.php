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
                        <li class="active">Edit Supplier</li>
                    </ol>
                </div>
            </div>

            <!-- Start Widget -->
            <div class="row">
                
                <!-- Basic example -->
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading bg-info"><h3 class="panel-title ">Edit Supplier</h3></div>
                        <br>
                        <div class="panel-body">
                            <form method="post" enctype="multipart/form-data" action="{{route('supplier-update',$supplier->id)}}">
                            @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" class="form-control" id="name" value="{{$supplier->name}}" name="name">
                                        </div>
                                        @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control" id="email" name="email" value="{{$supplier->email}}">
                                        </div>
                                        @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="phone">phone</label>
                                            <input type="text" class="form-control" id="phone" value="{{$supplier->phone}}" name="phone">
                                        </div>
                                        @if ($errors->has('phone'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="address">Address</label>
                                            <input type="text" class="form-control" id="address" value="{{$supplier->address}}" name="address">
                                        </div>
                                        @if ($errors->has('address'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="experience">Shop Name</label>
                                            <input type="text" class="form-control" name="shop" id="experience" value="@if($supplier->shop == NULL)NO Shop @elseif($supplier->shop != NULL){{$supplier->shop}}
                                            @endif
                                           ">
                                        </div>
                                        @if ($errors->has('shop'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('shop') }}</strong>
                                    </span>
                                @endif
                                
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            
                                            <label for="photo">Photo</label>
                                            <img id="image" src="{{asset($supplier->photo)}}" width="80px" height="80px">
                                            <input type="file" class="upload" accept="image/*"  name="photo" id="photo" onchange="readURL(this);">
                                        </div>
                                        @if ($errors->has('photo'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('photo') }}</strong>
                                    </span>
                                @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="salary">Account_holder</label>
                                            <input type="text" class="form-control" name="accountholder" id="salary" value="{{$supplier->accountholder}}">
                                        </div>
                                        @if ($errors->has('accountholder'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('accountholder') }}</strong>
                                    </span>
                                @endif
                                
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="vacation">Account Number</label>
                                            <input type="text" class="form-control" name="accountnumber" id="vacation" value="{{$supplier->accountnumber}}">
                                        </div>
                                        @if ($errors->has('accountnumber'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('accountnumber') }}</strong>
                                    </span>
                                @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="City">Bank Name</label>
                                            <input type="text" class="form-control" name="bankname" id="City" value="{{$supplier->bankname}}">
                                        </div>
                                        @if ($errors->has('bankname'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('bankname') }}</strong>
                                    </span>
                                @endif
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="nid_no">Bank Branch</label>
                                            <input type="text" class="form-control" id="nid_no" name="bankbranch" value="{{$supplier->bankbranch}}"">
                                        </div>
                                        @if ($errors->has('bankbranch'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('bankbranch') }}</strong>
                                    </span>
                                @endif
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="City">City</label>
                                            <input type="text" class="form-control" name="city" id="City" value="{{$supplier->city}}">
                                        </div>
                                        @if ($errors->has('city'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                @endif
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="City">Supplier Type</label>
                                            <select name="type" id="city" class="form-control">
                                                <option value="Distributor" {{ $supplier->type == "Distributor" ? "selected" : "" }}>Dristibutor</option>
                                                <option value="Wholeseller" {{ $supplier->type == "Wholeseller" ? "selected" : "" }}>Whole Seller</option>
                                                <option value="Brochure" {{ $supplier->type == "Brochure" ? "selected" : "" }}>Brochure</option>
                                            </select>
                                        </div>
                                       
                                    
                                </div>
                                
                                
                                
                                
                                
                                
                                
                                <button type="submit" class="btn btn-purple waves-effect waves-light">Submit</button>
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
