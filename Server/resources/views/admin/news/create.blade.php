@extends('layouts.app')

@section('title','Add News')
@section('content')

    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>Add News</h2>

                </div>
            </div>
            <!-- /. ROW  -->
            <hr />
            <div class="row">
                <div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Add News
                        </div>
                        <div class="panel-body">
                            <div class="row">

                                <div class="col-md-12">
                                    @include('layouts.partial.msg')

                                    <form role="form" method="post" action="{{ route('news.store') }}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label>Title</label>
                                            <input class="form-control" name="title" placeholder="Title" />

                                        </div>
                                        <div class="form-group">
                                            <label>Date</label>
                                            <input type="date" class="form-control" name="sub_title" placeholder="Date" />

                                        </div>
                                        <div class="form-group">
                                            <label>Short</label>
                                            <textarea class="form-control" rows="3" name="short"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea class="form-control ckeditor" rows="3" name="description"></textarea>
                                        </div>




                                        <div class="form-group">
                                            <label>Image (Height:320px X Width:370px)</label>
                                            <input type="file" name="image"/>
                                        </div>

                                        <div class="form-group">
                                            <label class="checkbox-container">
                                                <input type="checkbox" name="News" value="1">
                                                <span class="checkmark"></span>
                                                News
                                            </label>
                                            <label class="checkbox-container">
                                                <input type="checkbox" name="Media" value="1">
                                                <span class="checkmark"></span>
                                                Media Coverage
                                            </label>
                                            <label class="checkbox-container">
                                                <input type="checkbox" name="Event" value="1">
                                                <span class="checkmark"></span>
                                                Upcomming Events
                                            </label>

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