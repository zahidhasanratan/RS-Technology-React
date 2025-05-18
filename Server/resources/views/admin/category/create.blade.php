@extends('layouts.app')

@section('title','Add Category')
@section('content')

    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>Add Category</h2>

                </div>
            </div>
            <!-- /. ROW  -->
            <hr />
            <div class="row">
                <div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Add Category
                        </div>
                        <div class="panel-body">
                            <div class="row">

                                <div class="col-md-12">
                                    @include('layouts.partial.msg')

                                    <form role="form" method="post" action="{{ route('category.store') }}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input class="form-control" name="name" placeholder="Title" />

                                        </div>

                                        {{--<div class="form-group">--}}
                                            {{--<label>Description</label>--}}
                                            {{--<textarea class="form-control ckeditor" rows="3" name="description"></textarea>--}}
                                        {{--</div>--}}


                                        <div class="form-group">
                                            <label>Album Photo</label>
                                            <input type="file" name="image"/>
                                        </div>


                                                <div class="form-group">
                                                    <label>Gallery (Multiple)</label>
                                                    <input type="file" class="form-control" placeholder="Image" name="images2[]" multiple/>
                                                </div>


                                        <a href="{{ route('category.index') }}" class="btn btn-danger">Back</a>
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