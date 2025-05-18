@extends('layouts.app')

@section('title','Edit Category')
@section('content')

    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>Edit Category</h2>

                </div>
            </div>
            <!-- /. ROW  -->
            <hr />
            <div class="row">
                <div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Edit Category
                        </div>
                        <div class="panel-body">
                            <div class="row">

                                <div class="col-md-12">
                                    @include('layouts.partial.msg')

                                    <form role="form" method="post" action="{{ route('video.update',$video->id) }}" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <label>Title</label>
                                            <input class="form-control" name="title" value="{{ $video->title }}" placeholder="Title" />

                                        </div>

                                        <div class="form-group">
                                            <label>Short</label>
                                            <textarea class="form-control" name="description" rows="3">{{ $video->short }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Image (Height:280px X Width:260px)</label>
                                            <input type="file" name="image"/></br>
                                            <img src="{{ asset('uploads/video/'.$video->image) }}" class="img-thumbnail" width="100" height="100" />
                                        </div>




                                        <a href="{{ route('video.index') }}" class="btn btn-danger">Back</a>
                                        <button type="submit" class="btn btn-primary">Save</button>

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