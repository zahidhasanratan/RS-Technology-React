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
                            Add Category
                        </div>
                        <div class="panel-body">
                            <div class="row">

                                <div class="col-md-12">
                                    @include('layouts.partial.msg')

                                    <form role="form" method="post" action="{{ route('category.update',$category->id) }}" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <label>Title</label>
                                            <input class="form-control" name="name" value="{{ $category->name }}" placeholder="Name" />

                                        </div>
                                        {{--<div class="form-group">--}}
                                            {{--<label>Description</label>--}}
                                            {{--<textarea class="form-control ckeditor" name="description" placeholder="Description">{{ $category->description }}</textarea>--}}

                                        {{--</div>--}}

                                        <div class="form-group">
                                            <label>Image</label>
                                            <input type="file" name="image"/></br>
                                            <img src="{{ asset('uploads/category/'.$category->image) }}" class="img-thumbnail" width="100" height="100" />
                                        </div>


                                                <div class="form-group">
                                                    <label>Gallery (Multiple)</label>
                                                    <input type="file" class="form-control" placeholder="Image" name="images2[]" multiple/>
                                                </div>

                                        <div class="form-group">

                                            <div class="form-group mt-3">
                                                <label for="deleted_images">Select Images for Deleting:</label>
                                                <div class="row">
                                                    @foreach(explode(',', $category->images2) as $image2)
                                                        <div class="col-md-3 mb-3">
                                                            <img style="height:200px;width:200px;" src="{{ asset('images/' . $image2) }}" class="img-fluid" alt="Image">
                                                            <div class="form-check mt-2">
                                                                <input class="form-check-input" type="checkbox" name="deleted_images[]" value="{{ $image2 }}">
                                                                <label class="form-check-label" for="deleted_images[]">Delete this image</label>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
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