@extends('layouts.app')

@section('title','Add Item')
@section('content')

    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>Add Item</h2>

                </div>
            </div>
            <!-- /. ROW  -->
            <hr />
            <div class="row">
                <div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Add Item
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
                                            <label>Category</label>
                                            <select name="category" class="form-control" onChange="">
                                                <option value="">Select Category</option>
                                                @foreach(\App\video::all() as $categories)

                                                    <option value="{{$categories->id}}">{{$categories->title}}</option>

                                                @endforeach

                                            </select>

                                        </div>
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea class="form-control ckeditor" name="description" placeholder="Description"></textarea>

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