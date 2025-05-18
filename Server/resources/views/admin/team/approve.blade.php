@extends('layouts.app')

@section('title','All Member')
@section('content')

    <div id="wrapper">

        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>All Member</h2>
                        {{--<a style="float:right" href="{{ route('team.create') }}" class="btn btn-primary square-btn-adjust">Add Member</a>--}}
                        <div class="row">

                        </div>
                    </div>


                    <hr />


                    <div class="col-md-12">
                        <!-- Advanced Tables -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                All Member
                            </div>
                            <div class="panel-body">

                                @include('layouts.partial.msg')
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                        <tr>
                                            <th>SL.</th>
                                            <th>Name</th>
                                            <th>Image</th>
                                            <th>Mobile</th>
                                            <th>Email</th>
                                            <th width="17%;">Action</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($team as $key=>$team)
                                            <tr class="odd gradeX">
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $team->Name }}</td>
                                                <td><img src="{{ asset('uploads/team/'.$team->image) }}" class="img-thumbnail" width="100" height="100" /></td>
                                                <td class="center">{{ $team->MobileNo }}</td>
                                                <td class="center">{{ $team->Email }}</td>
                                                <td><a href="{{route('team.edit',$team->id)}}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i> Preview</a>
                                                    {{--<form id="delete-form-{{ $team->id }}" action="{{ route('team.destroy',$team->id) }}" style="display: none;" method="POST">--}}
                                                        {{--@csrf--}}
                                                        {{--@method('DELETE')--}}
                                                    {{--</form>--}}
                                                    {{--<button type="submit" onclick="if(confirm('Are you sure? You want to delete this?')){--}}
                                                            {{--event.preventDefault();--}}
                                                            {{--document.getElementById('delete-form-{{ $team->id }}').submit();--}}
                                                            {{--}else {--}}
                                                            {{--event.preventDefault();--}}
                                                            {{--}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</button>--}}
                                                </td>
                                            </tr>
                                        @endforeach



                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                        <!--End Advanced Tables -->
                    </div>
                </div>

            </div>

        </div>
        <!-- /. PAGE INNER  -->
    </div>

@endsection