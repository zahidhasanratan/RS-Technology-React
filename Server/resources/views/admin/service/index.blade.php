@extends('layouts.app')

@section('title','All Solution')
@section('content')

    <div id="wrapper">

        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>All Solution</h2>
                        <a style="float:right" href="{{ route('service.create') }}" class="btn btn-primary square-btn-adjust">Add Solution</a>
                        <div class="row">

                        </div>
                    </div>


                    <hr />


                    <div class="col-md-12">
                        <!-- Advanced Tables -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                All Solution
                            </div>
                            <div class="panel-body">

                                @include('layouts.partial.msg')
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                        <tr>
                                            <th>SL.</th>
                                            <th>Title</th>
                                            <th>Icon</th>

                                            <th width="27%;">Action</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($service as $key=>$news)
                                            <tr class="odd gradeX">
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $news->title }}</td>
                                                <td><img src="{{ asset('uploads/service/'.$news->image) }}" class="img-thumbnail" width="100" height="100" /></td>

                                                <td>
                                                    <a href="{{route('service.edit',$news->id)}}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                                    <form id="delete-form-{{ $news->id }}" action="{{ route('service.destroy',$news->id) }}" style="display: none;" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                    <button type="submit" onclick="if(confirm('Are you sure? You want to delete this?')) {
                                                        event.preventDefault();
                                                        document.getElementById('delete-form-{{ $news->id }}').submit();
                                                        } else {
                                                        event.preventDefault();
                                                        }" class="btn btn-danger btn-sm">
                                                        <i class="fa fa-trash"></i> Delete
                                                    </button>

                                                    <!-- Dropdown Button -->
{{--                                                    <div class="btn-group">--}}
{{--                                                        <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">--}}
{{--                                                            <i class="fa fa-plus"></i> Module--}}
{{--                                                        </button>--}}
{{--                                                        <ul class="dropdown-menu">--}}
{{--                                                            <li><a class="dropdown-item" href="{{ route('featured.show',$news->id) }}">Featured Work</a></li>--}}
{{--                                                            <li><a class="dropdown-item" href="{{ route('webprocess.show',$news->id) }}">{{ $news->title }} Process</a></li>--}}
{{--                                                            <li><a class="dropdown-item" href="{{ route('technology.show',$news->id) }}">Technology We Use</a></li>--}}
{{--                                                            <li><a class="dropdown-item" href="{{ route('clilentbenifts.show',$news->id) }}">{{ $news->title }} Benifits</a></li>--}}
{{--                                                            <li><a class="dropdown-item" href="{{ route('qualityservice.show',$news->id) }}">Best Quality Services</a></li>--}}
{{--                                                            <li><a class="dropdown-item" href="{{ route('packagepricing.show',$news->id) }}">Pricing</a></li>--}}
{{--                                                            <li><a class="dropdown-item" href="{{ route('faq.show',$news->id) }}">FAQ</a></li>--}}

{{--                                                        </ul>--}}
{{--                                                    </div>--}}
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

@endsection
