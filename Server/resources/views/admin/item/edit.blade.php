@extends('layouts.app')

@section('title','Edit Item')
@section('content')

    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>Edit Item</h2>

                </div>
            </div>
            <!-- /. ROW  -->
            <hr />
            <div class="row">
                <div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Edit Product
                        </div>
                        <div class="panel-body">
                            <div class="row">

                                <div class="col-md-12">
                                    @include('layouts.partial.msg')

                                    <form role="form" method="post" action="{{ route('item.update',$item->id) }}" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <label>Title</label>
                                            <input class="form-control" name="name" value="{{ $item->name }}" placeholder="Name" />

                                        </div>
                                        <div class="form-group">
                                            <label>Category</label>
                                            <select name="category" class="form-control" onChange="">

                                                <option value="{{ $item->category_id }}"><?php
                                                    $video = \App\Video::where('id', $item->category_id)->first();
                                                    if ($video) {
                                                        echo $video->title;
                                                    }
                                                    ?></option>

                                                @foreach(\App\video::all() as $category)
                                                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                                                @endforeach

                                            </select>

                                        </div>

                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea class="form-control ckeditor" name="description" placeholder="Description">{{ $item->description }}</textarea>

                                        </div>


                                        <div class="form-group">
                                            <label>Image</label>
                                            <input type="file" name="image"/></br>
                                            <img src="{{ asset('uploads/item/'.$item->image) }}" class="img-thumbnail" width="100" height="100" />
                                        </div>



                                        <a href="{{ route('item.index') }}" class="btn btn-danger">Back</a>
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