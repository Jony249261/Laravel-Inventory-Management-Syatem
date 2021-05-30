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
                        <li class="active">Today Attendence</li>
                    </ol>
                </div>
            </div>

            <!-- Start Widget -->
            <div class="row">
                
                <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading bg-info">
                                        <h3 class="panel-title">Take Attendence
                                            <a href="{{route('add.employee')}}" class="btn btn-success pull-right"> <i class="fas fa-plus-square"></i> Create</a>
                                        </h3>
                                        
                                        
                                    
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                            <form method="post" action="{{url('/insert-attendence')}}">
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
                                                        @foreach ($employee as $row)
                                                        <tr>
                                                            <td>{{ $i++ }}</td>
                                                            <td>{{ $row->name }}</td>
                                                            <td> <img src="{{ asset($row->photo) }}" alt="" width="50px" height="50px"> 
                                                            <input type="hidden" name="user_id" value="{{$row->id}}">
                                                            </td>
                                                            <td>
                                                                <div class="checkbox checkbox-success checkbox-inline">
                                            <input type="checkbox" id="Present" name="attendence" value="Present">
                                            <label> Present </label>
                                        </div>
                                        <div class="checkbox checkbox-danger checkbox-inline">
                                            <input type="checkbox" id="Absent" name="attendence" value="Absent" >
                                            <label> Absent </label>
                                        </div>
                                                            </td>
                                                            <input type="hidden" name="att_date" value="{{ date('d-m-y') }}">
                                                            <input type="hidden" name="att_year" value="{{ date('Y') }}">
                                                            
                                                            
                                                            
                                                        </tr>
                                                        @endforeach
                                                        
                                                        
                                                    </tbody>
                                                    
                                                </table>
                                                    <button type="submit" class="btn btn-success">Take Attendence</button>
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
