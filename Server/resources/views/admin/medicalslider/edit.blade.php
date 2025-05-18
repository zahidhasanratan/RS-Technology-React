@extends('layouts.app')

@section('title','Edit Slider')
@section('content')

    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>Edit Slider</h2>

                </div>
            </div>
            <!-- /. ROW  -->
            <hr />
            <div class="row">
                <div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Add Slider
                        </div>
                        <div class="panel-body">
                            <div class="row">

                                <div class="col-md-12">
                                    @include('layouts.partial.msg')

                                    <form role="form" method="post" action="{{ route('medicalslider.update',$slider->id) }}" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <label>Caption</label>
                                            <input class="form-control" name="title" value="{{ $slider->title }}" placeholder="Caption" />

                                        </div>
                                        {{--<div class="form-group">--}}
                                            {{--<label>Sub Title</label>--}}
                                            {{--<input class="form-control" name="sub_title" value="{{ $slider->sub_title }}" placeholder="Sub Title" />--}}

                                        {{--</div>--}}
                                        {{--<div class="form-group">--}}
                                        {{--<label>Text area</label>--}}
                                        {{--<textarea class="form-control" rows="3"></textarea>--}}
                                        {{--</div>--}}


                                        <div class="form-group">
                                            <label>Image</label>
                                            <input type="file" name="image"/></br>
                                            <img src="{{ asset('uploads/medicalslider/'.$slider->image) }}" class="img-thumbnail" width="100" height="100" />
                                        </div>



                                        <a href="{{ route('medicalslider.index') }}" class="btn btn-danger">Back</a>
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