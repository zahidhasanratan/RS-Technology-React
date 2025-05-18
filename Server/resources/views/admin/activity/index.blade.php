@extends('layouts.app')

@section('title','All Client Say')
@section('content')

    <div id="wrapper">

        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>All Client Say</h2>
                        <a style="float:right" href="{{ route('activity.create') }}" class="btn btn-primary square-btn-adjust">Add Client Say</a>
                        <div class="row">

                        </div>
                    </div>


                    <hr />


                    <div class="col-md-12">
                        <!-- Advanced Tables -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                All Client Say
                            </div>
                            <div class="panel-body">

                                @include('layouts.partial.msg')
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                        <tr>
                                            <th>SL.</th>
                                            <th>Title</th>
                                            <th>Image</th>
                                            <th>Created At</th>
                                            <th width="17%;">Action</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($activity as $key=>$activity)
                                            <tr class="odd gradeX">
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $activity->title }}</td>
                                                <td><img src="{{ asset('uploads/activity/'.$activity->image) }}" class="img-thumbnail" width="100" height="100" /></td>
                                                <td class="center">{{ $activity->created_at }}</td>
                                                <td><a href="{{route('activity.edit',$activity->id)}}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                                    <form id="delete-form-{{ $activity->id }}" action="{{ route('activity.destroy',$activity->id) }}" style="display: none;" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                    <button type="submit" onclick="if(confirm('Are you sure? You want to delete this?')){
                                                            event.preventDefault();
                                                            document.getElementById('delete-form-{{ $activity->id }}').submit();
                                                            }else {
                                                            event.preventDefault();
                                                            }" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</button>
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