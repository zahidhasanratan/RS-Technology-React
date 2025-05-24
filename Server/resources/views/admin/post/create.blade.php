@extends('layouts.app')

@section('title','Add Post')
@section('content')

    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>Add Post</h2>

                </div>
            </div>
            <!-- /. ROW  -->
            <hr />
            <div class="row">
                <div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Add Post
                        </div>
                        <div class="panel-body">
                            <div class="row">

                                <div class="col-md-12">
                                    @include('layouts.partial.msg')

                                    <form role="form" method="post" action="{{ route('post.store') }}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label>Title</label>
                                            <input class="form-control" name="title" placeholder="Title" />
                                        </div>
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea class="form-control ckeditor" rows="3" name="description"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Job Summary</label>
                                            <textarea class="form-control ckeditor" rows="3" name="job_summery"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Location</label>
                                            <input class="form-control" name="location" placeholder="Location" />
                                        </div>
                                        <div class="form-group">
                                            <label>Job Function</label>
                                            <input class="form-control" name="jobFunction" placeholder="Job Function" />
                                        </div>
                                        <div class="form-group">
                                            <label>Job Type</label>
                                            <input class="form-control" name="jobType" placeholder="Job Type" />
                                        </div>

                                        <div class="form-group">
                                            <label>Url (If Any)</label>
                                            <input class="form-control" name="link" placeholder="Url" />
                                        </div>
{{--                                        <div class="form-group">--}}
{{--                                            <label>Image</label>--}}
{{--                                            <input type="file" name="image"/>--}}
{{--                                        </div>--}}
                                        <a href="{{ route('post.index') }}" class="btn btn-danger">Back</a>
                                        <button type="submit" class="btn btn-primary">Submit Button</button>

                                    </form>
                                    <br />




                            </div>
                        </div>
                    </div>
                    <!-- End Form Elements -->
                </div>
            </div>
            <!-- /. ROW  -->

            <!-- /. ROW  -->
        </div>
        <!-- /. PAGE INNER  -->
    </div>
    <!-- /. PAGE WRAPPER  -->

@endsection
