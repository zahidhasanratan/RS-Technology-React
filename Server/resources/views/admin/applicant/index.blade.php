@extends('layouts.app')

@section('title','All Applicant')
@section('content')

    <div id="wrapper">

        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2> All Applicant of  {{ $title->title }}</h2>

                        <div class="row">

                        </div>
                    </div>


                    <hr />


                    <div class="col-md-12">
                        <!-- Advanced Tables -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                All Applicant of {{ $title->title }}
                            </div>
                            <div class="panel-body">

                                @include('layouts.partial.msg')
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                        <tr>
                                            <th>SL.</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Post Name</th>
                                            <th>Subject</th>
                                            <th width="17%;">Action</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($news as $key=>$news)
                                            <tr class="odd gradeX">
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $news->name }}</td>
                                                <td>{{ $news->email }}</td>
                                                <td>{{ $news->phone }}</td>
                                                <td>{{ $news->postname }}</td>
                                                <td>{{ $news->subject }}</td>

                                                <td><a href="{{ asset('') }}uploads/application/{{ $news->image }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> Download CV</a>
                                                    <form id="delete-form-{{ $news->id }}" action="{{ route('applicant.destroy',$news->id) }}" style="display: none;" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                    <button type="submit" onclick="if(confirm('Are you sure? You want to delete this?')){
                                                            event.preventDefault();
                                                            document.getElementById('delete-form-{{ $news->id }}').submit();
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
