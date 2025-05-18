@extends('layouts.app')

@section('title','Edit')
@section('content')

    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>Edit {{ $objects->title }}</h2>

                </div>
            </div>
            <!-- /. ROW  -->
            <hr />
            <div class="row">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Edit {{ $objects->title }}
                        </div>
                        <div class="panel-body">
                            <div class="row">

                                <div class="col-md-12">
                                    @include('layouts.partial.msg')

                                    <form role="form" method="post" action="{{ route('objects.update',$objects->id) }}" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        @if($objects->id ==2)

                                        <div class="form-group">
                                            <label>Title</label>
                                            <input class="form-control" name="title" value="{{ $objects->title }}" placeholder="Title" />
                                        </div>

                                        <div class="form-group">
                                            <label>Sub Title</label>
                                            <input class="form-control" name="sub_title" value="{{ $objects->sub_title }}" placeholder="Sub Title" />
                                        </div>

                                        <div class="form-group">
                                            <label>Sub Title 2</label>
                                            <input class="form-control" name="sub_title2" value="{{ $objects->sub_title2 }}" placeholder="Sub Title 2" />
                                        </div>

                                        <div class="form-group">
                                            <label>Phone</label>
                                            <input class="form-control" name="phone" value="{{ $objects->phone }}" placeholder="Phone" />
                                        </div>

                                        <div class="form-group">
                                            <label>Short</label>
                                            <textarea class="form-control ckeditor" name="short" rows="3">{{ $objects->short }}</textarea>
                                        </div>

                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea class="form-control ckeditor" name="description" rows="3">{{ $objects->description }}</textarea>
                                        </div>

                                        <div class="form-group">
                                            <label>Image 1</label>
                                            <input type="file" name="image" />
                                            <br>
                                            @if($objects->image)
                                                <img src="{{ asset('uploads/object/'.$objects->image) }}" class="img-thumbnail" width="100" />
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <label>Image 2</label>
                                            <input type="file" name="image2" />
                                            <br>
                                            @if($objects->image2)
                                                <img src="{{ asset('uploads/object/'.$objects->image2) }}" class="img-thumbnail" width="100" />
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <label>Image 3</label>
                                            <input type="file" name="image3" />
                                            <br>
                                            @if($objects->image3)
                                                <img src="{{ asset('uploads/object/'.$objects->image3) }}" class="img-thumbnail" width="100" />
                                            @endif
                                        </div>
                                        @endif
                                        @if($objects->id ==6)

                                            <div class="form-group">
                                                <label>Title</label>
                                                <input class="form-control" name="title" value="{{ $objects->title }}" placeholder="Title" />
                                            </div>



                                            <div class="form-group">
                                                <label>Our Mission</label>
                                                <textarea class="form-control" name="sub_title" rows="3">{{ $objects->sub_title }}</textarea>
                                            </div>



                                            <div class="form-group">
                                                <label>Our Vision</label>
                                                <textarea class="form-control" name="short" rows="3">{{ $objects->short }}</textarea>
                                            </div>

                                            <div class="form-group">
                                                <label>Our Values</label>
                                                <textarea class="form-control" name="description" rows="3">{{ $objects->description }}</textarea>
                                            </div>

                                            <div class="form-group">
                                                <label>Image</label>
                                                <input type="file" name="image" />
                                                <br>
                                                @if($objects->image)
                                                    <img src="{{ asset('uploads/object/'.$objects->image) }}" class="img-thumbnail" width="100" />
                                                @endif
                                            </div>


                                        @endif
                                        <a href="{{ route('objects.index') }}" class="btn btn-danger">Back</a>
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
