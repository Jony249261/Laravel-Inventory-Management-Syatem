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
                        <li><a href="#">Inventory</a></li>
                        <li class="active">Attendence</li>
                    </ol>
                </div>
            </div>

            <!-- Start Widget -->
            <div class="row">
                
                <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading bg-info">
                                        <h3 class="panel-title">Update Attendence {{ $date->att_date}}
                                            <a href="{{route('all.attendence')}}" class="btn btn-success pull-right"> <i class="fas fa-plus-square"></i> All Attendence</a>
                                        </h3>
                                        
                                        
                                    
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                            <form method="post" action="{{url('/update-attendence')}}">
                                            @csrf
                                                <table {{--id="datatable"--}} class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>SL</th>
                                                            <th>Name</th>
                                                            <th>photo</th>
                                                            <th>Attendence</th>
                                                        </tr>
                                                    </thead>

                                             
                                                    <tbody>
                                                    
                                                        @php
                                                            $i = 1;
                                                        @endphp
                                                        @foreach ($data as $row)
                                                        <tr>
                                                            <td>{{ $i++ }}</td>
                                                            <td>{{ $row->name }}</td>
                                                            <td> <img src="{{ asset($row->photo) }}" alt="" width="50px" height="50px"> 
                                                            <input type="hidden" name="id[]" value="{{$row->id}}">
                                                            </td>
                                                            <td>
                                                                <div class="checkbox checkbox-success checkbox-inline">
                                            <input type="radio" name="attendence[{{$row->id}}]" value="Present" <?php if($row->attendence == 'Present'){
                                                echo 'Checked';
                                            } ?>>
                                             Present
                                        </div>
                                        <div class="checkbox checkbox-danger checkbox-inline">
                                            <input type="radio" name="attendence[{{$row->id}}]" value="Absent" <?php if($row->attendence == 'Absent'){
                                                echo 'Checked';
                                            } ?>>
                                             Absent
                                        </div>
                                                            </td>
                                                            <input type="hidden" name="att_date" value="{{ date('d-m-y') }}">
                                                            <input type="hidden" name="att_year" value="{{ date('Y') }}">
                                                            <input type="hidden" name="month" value="{{ date('F') }}">
                                                            
                                                            
                                                            
                                                        </tr>
                                                        @endforeach
                                                        
                                                        
                                                    </tbody>
                                                    
                                                </table>
                                                    <button type="submit" class="btn btn-success">Update Attendence</button>
                                                    </form>
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





@endsection
