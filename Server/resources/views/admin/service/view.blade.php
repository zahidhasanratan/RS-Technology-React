@extends('layouts.app')

@section('title','All District')
@section('content')

    <div id="wrapper">

        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>All Committee of {{ $service->title }}</h2>
                        <a style="float:right" href="{{ route('committee.add',$service->title) }}" class="btn btn-primary square-btn-adjust">Add Committee</a>
                        <div class="row">

                        </div>
                    </div>


                    <hr />


                    <div class="col-md-12">
                        <!-- Advanced Tables -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                All District
                            </div>
                            <div class="panel-body">

                                @include('layouts.partial.msg')
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                        <tr>

                                            <th>Title</th>
                                            <th>Approved Date</th>
                                            <th>End Date</th>
                                            <th>Duration</th>


                                            <th width="30%;">Action</th>

                                        </tr>
                                        </thead>
                                        <tbody>

                                        @foreach(\App\PreviousProgram::where('sub_title',$service->title)->get() as $key=>$committee)
                                            <tr class="odd gradeX">

                                                <td>{{ $committee->title }}</td>
                                                <td>{{ $committee->short }}</td>
                                                <td>{{ $committee->description }}</td>
                                                <td>{{ $committee->duration }}</td>

                                                <td>
                                                    <a href="{{route('previous.edit',$committee->id)}}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> Edit</a>

                                                    <form id="delete-form-{{ $committee->id }}" action="{{ route('previous.destroy',$committee->id) }}" style="display: none;" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                    <button type="submit" onclick="if(confirm('Are you sure? You want to delete this?')){
                                                            event.preventDefault();
                                                            document.getElementById('delete-form-{{ $committee->id }}').submit();
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