@extends('layouts.app')

@section('title','Edit Page')
@section('content')

    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>Edit Page</h2>

                </div>
            </div>
            <!-- /. ROW  -->
            <hr />
            <div class="row">
                <div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Add Page
                        </div>
                        <div class="panel-body">
                            <div class="row">

                                <div class="col-md-12">
                                    @include('layouts.partial.msg')

                                    <form role="form" method="post" action="{{ route('page.update',$page->id) }}" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <label>Title</label>
                                            <input class="form-control" name="title" value="{{ $page->title }}" placeholder="Title" />

                                        </div>
                                        <div class="form-group">
                                            <label>Sub Title</label>
                                            <input class="form-control" name="sub_title" value="{{ $page->sub_title }}" placeholder="Sub Title" />

                                        </div>
                                        <div class="form-group">
                                            <select name="title_uri" class="form-control" style="width:60%; margin-bottom:5px">




                                                @if (!(empty($page->title_uri)))
                                                    <option value="{{$parent_id_for->slug}}">{{$parent_id_for->menu_name}}</option>

                                                @else
                                                    <option value="NULL">Select Menu</option>

                                                @endif



                                                @foreach($menu_all as $main_menu)

                                                    <option value="{{$main_menu->slug}}">{{$main_menu->menu_name}}</option>

                                                @endforeach
                                            </select>

                                        </div>
                                        <div class="form-group">
                                            <label>Short</label>
                                            <textarea class="form-control" name="short" rows="3">{{ $page->short }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea class="form-control ckeditor" name="description" rows="3">{{ $page->description }}</textarea>
                                        </div>


                                        <div class="form-group">
                                            <label>Image</label>
                                            <input type="file" name="image"/></br>
                                            <img src="{{ asset('uploads/page/'.$page->image) }}" class="img-thumbnail" width="100" height="100" />
                                        </div>



                                        <a href="{{ route('page.index') }}" class="btn btn-danger">Back</a>
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