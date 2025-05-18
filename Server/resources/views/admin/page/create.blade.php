@extends('layouts.app')

@section('title','Add Page')
@section('content')

    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>Add Page</h2>

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

                                    <form role="form" method="post" action="{{ route('page.store') }}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label>Title</label>
                                            <input class="form-control" name="title" placeholder="Title" />

                                        </div>
                                        <div class="form-group">
                                            <label>Sub Title</label>
                                            <input class="form-control" name="sub_title" placeholder="Sub Title" />

                                        </div>
                                        <div class="form-group">
                                            <select name="title_uri" class="form-control" style="width:60%; margin-bottom:5px">
                                                <option> Select Menu</option>
                                                @foreach($menu_all as $main_menu)

                                                    <option value="{{$main_menu->slug}}">{{$main_menu->menu_name}}</option>

                                                @endforeach
                                            </select>

                                        </div>

                                        {{--<div class="form-group">--}}

                                            {{--<select name="title_uri" class="form-control" style="width:60%; margin-bottom:5px">--}}
                                                {{--<option value="">Select Menu</option>--}}
                                                {{--@foreach($menu_all as $main_menu)--}}

                                                    {{--<option value="{{$main_menu->slug}}">{{$main_menu->menu_name}}</option>--}}

                                                {{--@endforeach--}}

                                            {{--</select>--}}

                                        {{--</div>--}}
                                        {{--<div class="form-group">--}}
                                            {{--<label>Short</label>--}}
                                            {{--<textarea class="form-control" rows="3" name="short"></textarea>--}}
                                        {{--</div>--}}
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea class="form-control ckeditor" rows="3" name="description"></textarea>
                                        </div>


                                        <div class="form-group">
                                            <label>Image</label>
                                            <input type="file" name="image"/>
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