@extends('layouts.app')

@section('title','Add Solution')
@section('content')

    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>Add Solution</h2>

                </div>
            </div>
            <!-- /. ROW  -->
            <hr />
            <div class="row">
                <div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Add Solution
                        </div>
                        <div class="panel-body">
                            <div class="row">

                                <div class="col-md-12">
                                    @include('layouts.partial.msg')

                                    <form role="form" method="post" action="{{ route('service.store') }}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label>Title</label>
                                            <input class="form-control" name="title" placeholder="Title" />

                                        </div>
{{--                                        <div class="form-group">--}}
{{--                                            <label>SVG Icon</label>--}}
{{--                                            <input class="form-control" name="sub_title" placeholder="SVG Icon" />--}}

{{--                                        </div>--}}
{{--                                        <div class="form-group">--}}
{{--                                            <label>Short</label>--}}
{{--                                            <textarea class="form-control" rows="3" name="short"></textarea>--}}
{{--                                        </div>--}}
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea class="form-control ckeditor" rows="3" name="description"></textarea>
                                        </div>

{{--                                        <div class="form-group">--}}
{{--                                            <label>Client Benifits</label>--}}
{{--                                            <textarea class="form-control ckeditor" rows="3" name="benifits"></textarea>--}}
{{--                                        </div>--}}

                                        <div class="form-group">
                                            <label>Image (Height:400px X Width:800px)</label>
                                            <input type="file" name="image"/>
                                        </div>


                                        <a href="{{ route('news.index') }}" class="btn btn-danger">Back</a>
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
