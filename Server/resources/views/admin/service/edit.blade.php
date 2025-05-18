@extends('layouts.app')

@section('title','Edit Solution')
@section('content')

    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>Edit Solution</h2>

                </div>
            </div>
            <!-- /. ROW  -->
            <hr />
            <div class="row">
                <div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Edit Service
                        </div>
                        <div class="panel-body">
                            <div class="row">

                                <div class="col-md-12">
                                    @include('layouts.partial.msg')

                                    <form role="form" method="post" action="{{ route('service.update',$service->id) }}" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <label>Title</label>
                                            <input class="form-control" name="title" value="{{ $service->title }}" placeholder="Title" />
                                        </div>
{{--                                        <div class="form-group">--}}
{{--                                            <label>SVG Icon</label>--}}
{{--                                            <textarea class="form-control" name="sub_title" placeholder="SVG Icon">{{ $service->sub_title }}</textarea>--}}
{{--                                        </div>--}}
{{--                                        <div class="form-group">--}}
{{--                                            <label>Short</label>--}}
{{--                                            <textarea class="form-control" name="short" rows="3">{{ $service->short }}</textarea>--}}
{{--                                        </div>--}}
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea class="form-control ckeditor" name="description" rows="3">{{ $service->description }}</textarea>
                                        </div>
{{--                                        <div class="form-group">--}}
{{--                                            <label>Clients Benifits</label>--}}
{{--                                            <textarea class="form-control ckeditor" name="benifits" rows="3">{{ $service->benifits }}</textarea>--}}
{{--                                        </div>--}}
                                        <div class="form-group">
                                            <label>Image (Height:400px X Width:800px)</label>
                                            <input type="file" name="image"/></br>
                                            <img src="{{ asset('uploads/service/'.$service->image) }}" class="img-thumbnail" width="100" height="100" />
                                        </div>
                                        <div class="form-group">
                                            <label>Sequence</label>
                                            <input class="form-control" name="sl" value="{{ $service->sl }}" placeholder="Sequence" />
                                        </div>
                                        <a href="{{ route('service.index') }}" class="btn btn-danger">Back</a>
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
