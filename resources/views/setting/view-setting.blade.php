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
                        <li class="active">Update Website</li>
                    </ol>
                </div>
            </div>

            <!-- Start Widget -->
            <div class="row">
                
                <!-- Basic example -->
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading bg-info"><h3 class="panel-title ">Update Website</h3></div>
                        <br>
                        <div class="panel-body">
                            <form method="post" enctype="multipart/form-data" action="{{route('website-update',$setting->id)}}">
                            @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Company Name</label>
                                            <input type="text" class="form-control" id="company_name" value="{{$setting->company_name}}" name="company_name">
                                        </div>
                                        @if ($errors->has('company_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('company_name') }}</strong>
                                    </span>
                                @endif
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Company Address</label>
                                            <input type="text" class="form-control" id="company_address" value="{{$setting->company_address}}" name="company_address">
                                        </div>
                                        @if ($errors->has('company_address'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('company_address') }}</strong>
                                    </span>
                                @endif
                                    </div>
                                    
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="phone">phone</label>
                                            <input type="text" class="form-control" id="phone" value="{{$setting->company_phone}}" name="company_phone">
                                        </div>
                                        @if ($errors->has('company_phone'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('company_phone') }}</strong>
                                    </span>
                                @endif
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control" id="email" name="company_email" value="{{$setting->company_email}}">
                                        </div>
                                        @if ($errors->has('company_email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('company_email') }}</strong>
                                    </span>
                                @endif
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="experience">Country</label>
                                            <input type="text" class="form-control" name="company_country" id="experience" value="{{$setting->company_country}}">
                                        </div>
                                        @if ($errors->has('company_country'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('company_country') }}</strong>
                                    </span>
                                @endif
                                
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="photo">Photo</label>
                                            <img id="image" src="{{asset($setting->company_logo)}}" width="80px" height="80px">
                                            
                                            <input type="file" class="upload" accept="image/*"  name="company_logo" id="photo" onchange="readURL(this);">
                                        </div>
                                        @if ($errors->has('company_logo'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('company_logo') }}</strong>
                                    </span>
                                @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="salary">City</label>
                                            <input type="text" class="form-control" name="company_city" id="salary" value="{{$setting->company_city}}">
                                        </div>
                                        @if ($errors->has('company_city'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('company_city') }}</strong>
                                    </span>
                                @endif
                                
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="vacation">Zip Code</label>
                                            <input type="text" class="form-control" name="company_zipcode" id="vacation" value="{{$setting->company_zipcode}}">
                                        </div>
                                        @if ($errors->has('company_zipcode'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('company_zipcode') }}</strong>
                                    </span>
                                @endif
                                    </div>
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
