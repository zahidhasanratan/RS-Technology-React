@extends('layouts.app')

@section('title','Edit Medical Feature')
@section('content')

    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>Edit Medical Feature</h2>

                </div>
            </div>
            <!-- /. ROW  -->
            <hr />
            <div class="row">
                <div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Add Medical Feature
                        </div>
                        <div class="panel-body">
                            <div class="row">

                                <div class="col-md-12">
                                    @include('layouts.partial.msg')

                                    <form role="form" method="post" action="{{ route('medicalfeature.update',$medicalfeature->id) }}" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <label>Title</label>
                                            <input class="form-control" name="title" value="{{ $medicalfeature->title }}" placeholder="Title" />

                                        </div>

                                        <div class="form-group">
                                            <label>Short</label>
                                            <textarea class="form-control" name="short" rows="3">{{ $medicalfeature->short }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea class="form-control ckeditor" name="description" rows="3">{{ $medicalfeature->description }}</textarea>
                                        </div>





                                        <a href="{{ route('medicalfeature.index') }}" class="btn btn-danger">Back</a>
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