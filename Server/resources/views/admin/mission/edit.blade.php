@extends('layouts.app')

@section('title','Edit')
@section('content')

    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>Edit {{ $mission->title }}</h2>

                </div>
            </div>
            <!-- /. ROW  -->
            <hr />
            <div class="row">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Edit {{ $mission->title }}
                        </div>
                        <div class="panel-body">
                            <div class="row">

                                <div class="col-md-12">
                                    @include('layouts.partial.msg')

                                    <form role="form" method="post" action="{{ route('mission.update',$mission->id) }}" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <label>Title</label>
                                            <input class="form-control" name="title" value="{{ $mission->title }}" placeholder="Title" />

                                        </div>


                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea class="form-control ckeditor" name="description" rows="3">{{ $mission->description }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Image</label>
                                            <input type="file" name="image"/></br>
                                            <img src="{{ asset('uploads/mission/'.$mission->image) }}" class="img-thumbnail" width="100" height="100" />
                                        </div>

                                        <a href="{{ route('mission.index') }}" class="btn btn-danger">Back</a>
                                        <button type="submit" class="btn btn-primary">Save</button>

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