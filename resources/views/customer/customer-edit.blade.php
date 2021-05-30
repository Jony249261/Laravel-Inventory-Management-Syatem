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
                        <li class="active">Edit Customer</li>
                    </ol>
                </div>
            </div>

            <!-- Start Widget -->
            <div class="row">
                
                <!-- Basic example -->
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading bg-info"><h3 class="panel-title ">Edit Customer</h3></div>
                        <br>
                        <div class="panel-body">
                            <form method="post" enctype="multipart/form-data" action="{{route('customer-update',$customer->id)}}">
                            @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" class="form-control" id="name" value="{{$customer->name}}" name="name">
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
                                            <input type="email" class="form-control" id="email" name="email" value="{{$customer->email}}">
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
                                            <input type="text" class="form-control" id="phone" value="{{$customer->phone}}" name="phone">
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
                                            <input type="text" class="form-control" id="address" value="{{$customer->address}}" name="address">
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
                                            <label for="experience">Shopname</label>
                                            <input type="text" class="form-control" name="shopname" id="experience" value="@if($customer->shopname == NULL)NO Shop @elseif($customer->shopname != NULL){{$customer->shopname}}
                                            @endif
                                           ">
                                        </div>
                                        @if ($errors->has('shopname'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('shopname') }}</strong>
                                    </span>
                                @endif
                                
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            
                                            <label for="photo">Photo</label>
                                            <img id="image" src="{{asset($customer->photo)}}" width="80px" height="80px">
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
                                            <input type="text" class="form-control" name="account_holder" id="salary" value="{{$customer->account_holder}}">
                                        </div>
                                        @if ($errors->has('account_holder'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('account_holder') }}</strong>
                                    </span>
                                @endif
                                
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="vacation">Account_number</label>
                                            <input type="text" class="form-control" name="account_number" id="vacation" value="{{$customer->account_number}}">
                                        </div>
                                        @if ($errors->has('account_number'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('account_number') }}</strong>
                                    </span>
                                @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="City">Bank Name</label>
                                            <input type="text" class="form-control" name="bank_name" id="City" value="{{$customer->bank_name}}">
                                        </div>
                                        @if ($errors->has('bank_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('bank_name') }}</strong>
                                    </span>
                                @endif
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="nid_no">Bank Branch</label>
                                            <input type="text" class="form-control" id="nid_no" name="bank_branch" value="{{$customer->bank_branch}}"">
                                        </div>
                                        @if ($errors->has('bank_branch'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('bank_branch') }}</strong>
                                    </span>
                                @endif
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="City">City</label>
                                            <input type="text" class="form-control" name="city" id="City" value="{{$customer->city}}">
                                        </div>
                                        @if ($errors->has('city'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                @endif
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
