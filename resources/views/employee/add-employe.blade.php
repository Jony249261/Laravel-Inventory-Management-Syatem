@extends('layouts.app')
@section('Employee','subdrop','active')
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
                        <li class="active">Add_Employee</li>
                    </ol>
                </div>
            </div>

            <!-- Start Widget -->
            <div class="row">
                <div class="col-md-1"></div>
                <!-- Basic example -->
                <div class="col-md-10">
                    <div class="panel panel-default">
                        <div class="panel-heading bg-info"><h3 class="panel-title ">Add_Employee</h3></div>
                        <br>
                        <div class="panel-body">
                            <form method="post" enctype="multipart/form-data" action="{{url('/insert-employe')}}">
                            @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name">
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
                                            <input type="email" class="form-control" id="email" name="email" placeholder="Email">
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
                                            <input type="text" class="form-control" id="phone" placeholder="Phone" name="phone">
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
                                            <input type="text" class="form-control" id="address" placeholder="Address" name="address">
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
                                            <label for="experience">Experience</label>
                                            <input type="text" class="form-control" name="experience" id="experience" placeholder="Experience">
                                        </div>
                                        @if ($errors->has('experience'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('experience') }}</strong>
                                    </span>
                                @endif
                                
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <img id="image" src="#">
                                            <label for="photo">Photo</label>
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
                                            <label for="salary">Salary</label>
                                            <input type="text" class="form-control" name="salary" id="salary" placeholder="Salary">
                                        </div>
                                        @if ($errors->has('salary'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('salary') }}</strong>
                                    </span>
                                @endif
                                
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="vacation">Vacation</label>
                                            <input type="text" class="form-control" name="vacation" id="vacation" placeholder="Vacation">
                                        </div>
                                        @if ($errors->has('vacation'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('vacation') }}</strong>
                                    </span>
                                @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="City">City</label>
                                            <input type="text" class="form-control" name="city" id="City" placeholder="City">
                                        </div>
                                        @if ($errors->has('city'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                @endif
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="nid_no">NID No</label>
                                            <input type="text" class="form-control" id="nid_no" name="nid_no" placeholder="Nid">
                                        </div>
                                        @if ($errors->has('nid_no'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nid_no') }}</strong>
                                    </span>
                                @endif
                                    </div>
                                </div>
                                
                                
                                
                                
                                
                                
                                
                                <button type="submit" class="btn btn-purple waves-effect waves-light pull-right">Submit</button>
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
