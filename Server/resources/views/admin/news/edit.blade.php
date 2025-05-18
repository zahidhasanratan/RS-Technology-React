@extends('layouts.app')

@section('title','Edit News')
@section('content')

    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>Edit News</h2>

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

                                    <form role="form" method="post" action="{{ route('news.update',$news->id) }}" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <label>Title</label>
                                            <input class="form-control" name="title" value="{{ $news->title }}" placeholder="Title" />

                                        </div>
                                        <div class="form-group">
                                            <label>Date</label>
                                            <input type="date" class="form-control" name="sub_title" value="{{ $news->sub_title }}" placeholder="Date" />

                                        </div>
                                        <div class="form-group">
                                            <label>Short</label>
                                            <textarea class="form-control" name="short" rows="3">{{ $news->short }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea class="form-control ckeditor" name="description" rows="3">{{ $news->description }}</textarea>
                                        </div>


                                        <div class="form-group">
                                            <label>Image (Height:320px X Width:370px)</label>
                                            <input type="file" name="image"/></br>
                                            <img src="{{ asset('uploads/news/'.$news->image) }}" class="img-thumbnail" width="100" height="100" />
                                        </div>

                                        <div class="form-group">
                                            <label class="checkbox-container">

                                                <input type="checkbox" name="News" value="1"  @if($news->News =='1') checked @endif>

                                                <span class="checkmark"></span>
                                                News
                                            </label>
                                            <label class="checkbox-container">
                                                <input type="checkbox" name="Media" value="1" @if($news->Media =='1') checked @endif>
                                                <span class="checkmark"></span>
                                                Media Coverage
                                            </label>
                                            <label class="checkbox-container">
                                                <input type="checkbox" name="Event" value="1" @if($news->Event =='1') checked @endif>
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