@extends('layouts.app')

@section('title','Add Product')
@section('content')

    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>Add Product</h2>

                </div>
            </div>
            <!-- /. ROW  -->
            <hr />
            <div class="row">
                <div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Add Product
                        </div>
                        <div class="panel-body">
                            <div class="row">

                                <div class="col-md-12">
                                    @include('layouts.partial.msg')

                                    <form role="form" method="post" action="{{ route('item.store') }}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input class="form-control" name="name" placeholder="Title" />
                                        </div>

                                        <div class="form-group">
                                            <label>Sub Title</label>
                                            <input class="form-control" name="sub_title" placeholder="Sub Title" />
                                        </div>

                                        <div class="form-group">
                                            <label>Category</label>
                                            <select name="category" class="form-control" onChange="">
                                                <option value="">Select Category</option>
                                                @foreach(\App\Models\SubCategory::all() as $categories)

                                                    <option value="{{$categories->id}}">{{$categories->title}}</option>

                                                @endforeach

                                            </select>

                                        </div>
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea class="form-control ckeditor" name="description" placeholder="Description"></textarea>

                                        </div>

                                        <div class="form-group">
                                            <label>Title 1</label>
                                            <input class="form-control" name="title1" placeholder="Title 1" />
                                        </div>
                                        <div class="form-group">
                                            <label>Details 1</label>
                                            <textarea class="form-control ckeditor" name="details1" placeholder="Details 1"></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label>Title 2</label>
                                            <input class="form-control" name="title2" placeholder="Title 2" />
                                        </div>
                                        <div class="form-group">
                                            <label>Details 2</label>
                                            <textarea class="form-control ckeditor" name="details2" placeholder="Details 2"></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label>Title 3</label>
                                            <input class="form-control" name="title3" placeholder="Title 3" />
                                        </div>
                                        <div class="form-group">
                                            <label>Details 3</label>
                                            <textarea class="form-control ckeditor" name="details3" placeholder="Details 3"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Title 4</label>
                                            <input class="form-control" name="title4" placeholder="Title 4" />
                                        </div>
                                        <div class="form-group">
                                            <label>Details 4</label>
                                            <textarea class="form-control ckeditor" name="details4" placeholder="Details 4"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Image</label>
                                            <input type="file" name="image"/>
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
