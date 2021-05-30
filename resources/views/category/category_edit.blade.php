@extends('layouts.app')

@section('content')
<div class="content-page">
<!-- Start content -->
    <div class="content">
       
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        @if(session('success'))
                  <div class="alert alert-danger alert-dismissible" role="alert">
                  <strong>{!! session('success') !!}</strong>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    @endif
                    @if(session('warning'))
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong>{!! session('warning') !!}</strong>
                    </div>
                    @endif
                    </div>
                </div>
        <div class="container">


            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="pull-left page-title">Welcome !</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="#">Enventory</a></li>
                        <li class="active">Add Salary</li>
                    </ol>
                </div>
            </div>

            <!-- Start Widget -->
            <div class="row">
                
                <!-- Basic example -->
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <div class="panel panel-default">
                        <div class="panel-heading bg-info"><h3 class="panel-title ">Update Category
                            <a href="{{route('all-category')}}" class="btn btn-success pull-right"><i class="fa fa-eye"></i> All Category</a>
                        </h3></div>
                        <br>
                        <div class="panel-body">
                            <form method="post" enctype="multipart/form-data" action="{{route('category-update',$category->id)}}">
                            @csrf
                               
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="address">Category Name</label>
                                            <input type="text" class="form-control" id="address" value="{{$category->cat_name}}" name="cat_name">
                                        </div>
                                        @if ($errors->has('cat_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('cat_name') }}</strong>
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


@endsection