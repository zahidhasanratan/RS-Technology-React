@extends('layouts.app')

@section('title','Edit Post')
@section('content')

    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>Edit Post</h2>

                </div>
            </div>
            <!-- /. ROW  -->
            <hr />
            <div class="row">
                <div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Edit Post
                        </div>
                        <div class="panel-body">
                            <div class="row">

                                <div class="col-md-12">
                                    @include('layouts.partial.msg')

                                    <form role="form" method="post" action="{{ route('post.update',$news->id) }}" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <label>Title</label>
                                            <input class="form-control" name="title" value="{{ $news->title }}" placeholder="Title" />
                                        </div>

                                        <div class="form-group">
                                            <label>Location</label>
                                            <input class="form-control" name="location" value="{{ $news->location }}" placeholder="Location" />
                                        </div>
                                        <div class="form-group">
                                            <label>Url (If Any)</label>
                                            <input class="form-control" name="link" value="{{ $news->link }}" placeholder="Url" />
                                        </div>
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea class="form-control ckeditor" rows="3" name="description">{{ $news->description }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Sequence</label>
                                            <input class="form-control" name="sequence" value="{{ $news->sequence }}" placeholder="Sequence" />
                                        </div>

                                        <div class="form-group">
                                            <label>Image</label>
                                            <input type="file" name="image"/></br>
                                            <img src="{{ asset('uploads/post/'.$news->image) }}" class="img-thumbnail" width="80" height="150" />
                                        </div>
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
