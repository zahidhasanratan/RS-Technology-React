@extends('layouts.app')

@section('title','All Web Process')
@section('content')

    <div id="wrapper">

        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>All Web Process of {{ \App\Service::where('id', $id)->first()?->title }}
                        </h2>
                        <a style="float:right" href="{{ route('webprocess.create', $id) }}
                            " class="btn btn-primary square-btn-adjust">Add {{ \App\Service::where('id', $id)->first()?->title }}</a>
                        <div class="row">

                        </div>
                    </div>


                    <hr />


                    <div class="col-md-12">
                        <!-- Advanced Tables -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                All Web Process of {{ \App\Service::where('id', $id)->first()?->title }}

                            </div>
                            <div class="panel-body">

                                @include('layouts.partial.msg')
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                        <tr>
                                            <th>SL.</th>
                                            <th>Title</th>

                                            <th>Description</th>
                                            <th width="17%;">Action</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($faq as $key=>$item)
                                            <tr class="odd gradeX">
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $item->title }}</td>

                                                <td class="center">
                                                    {{ $item->description }}
                                                </td>
                                                <td><a href="{{route('webprocess.edit',$item->id)}}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                                    <form id="delete-form-{{ $item->id }}" action="{{ route('webprocess.destroy',$item->id) }}" style="display: none;" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                    <button type="submit" onclick="if(confirm('Are you sure? You want to delete this?')){
                                                            event.preventDefault();
                                                            document.getElementById('delete-form-{{ $item->id }}').submit();
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
