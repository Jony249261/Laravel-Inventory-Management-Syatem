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
                        <li class="active">All Attendence</li>
                    </ol>
                </div>
            </div>

            <!-- Start Widget -->
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                                <div class="panel panel-default">
                                    <div class="panel-heading bg-info">
                                        <h3 class="panel-title">All Attendence
                                            <a href="{{ route('take.attendence')}}" class="btn btn-success pull-right"><i class="fas fa-plus-square"></i> Take Attendence</a>
                                        </h3>
                                        
                                        
                                    
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <table id="datatable" class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>SL</th>
                                                            <th>Attendence Date</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>

                                             
                                                    <tbody>
                                                        @php
                                                            $i = 1;
                                                        @endphp
                                                        @foreach ($all_att as $row)
                                                        <tr>
                                                            <td>{{ $i++ }}</td>
                                                            <td>{{ $row->edit_date }}</td>
                                                            <td><a href="{{url('edit-attendence/'.$row->edit_date)}}" class="btn btn-sm btn-success" ><i class="fa fa-pencil"></i> Edit</a>
                                                                <a href="{{url('delete-attendence/'.$row->edit_date)}}" id="delete" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Delete</a>
                                                                <a href="{{url('view-attendence/'.$row->edit_date)}}" class="btn btn-sm btn-success" ><i class="fa fa-eye"></i> View</a>
                                                                
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
            </div> 
            <!-- End row-->



        </div> <!-- container -->
                               
    </div> <!-- content -->
</div>


                        <!-- Custom Modals -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading bg-primary"> 
                                        <h3 class="panel-title">Add Category</h3> 
                                    </div> 
                                    <div class="panel-body"> 
                                        <!-- sample modal content -->

                                        
                                        
                                        <div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                            <div class="modal-dialog"> 
                                                <form method="post" enctype="multipart/form-data" action="{{url('/insert-category')}}">
                            @csrf
                                                <div class="modal-content"> 
                                                    <div class="modal-header "> 
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
                                                        <h4 class="modal-title">Add Category</h4> 
                                                    </div> 
                                                    
                                                    <div class="modal-body"> 
                                                        <div class="row"> 
                                                            <div class="col-md-12"> 
                                                                <div class="form-group"> 
                                                                    <label for="field-1" class="control-label">Category Name</label> 
                                                                    <input type="text" name="cat_name" class="form-control" id="field-1" placeholder="Catgory Name"> 
                                                                </div> 
                                                            </div> 
                                                            
                                                        </div> 
                                                       
                                                    </div> 
                                                    <div class="modal-footer"> 
                                                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button> 
                                                        <button type="submit" class="btn btn-info waves-effect waves-light">Create</button> 
                                                    </div> 
                                                </div> 
</form>
                                            </div>
                                        </div><!-- /.modal -->

                                        

                                        
                                        
                                        

                                    </div>
                                </div>
                            </div>
                        </div> <!-- End row -->



@endsection
