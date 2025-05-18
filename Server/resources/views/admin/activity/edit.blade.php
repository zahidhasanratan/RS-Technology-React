@extends('layouts.app')

@section('title','Edit Client Say')
@section('content')

    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>Edit Client Say</h2>

                </div>
            </div>
            <!-- /. ROW  -->
            <hr />
            <div class="row">
                <div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Add Client Say
                        </div>
                        <div class="panel-body">
                            <div class="row">

                                <div class="col-md-12">
                                    @include('layouts.partial.msg')

                                    <form role="form" method="post" action="{{ route('activity.update',$activity->id) }}" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input class="form-control" name="title" value="{{ $activity->title }}" placeholder="Name" />

                                        </div>

                                        <div class="form-group">
                                            <label>Designation</label>
                                            <input class="form-control" name="sub_title" value="{{ $activity->sub_title }}" placeholder="Designation" />

                                        </div>
                                        <div class="form-group">
                                            <label>Short</label>
                                            <textarea class="form-control" name="short" rows="3">{{ $activity->short }}</textarea>
                                        </div>


                                        <div class="form-group">
                                            <label>Image (Height:200px X Width:200px)</label>
                                            <input type="file" name="image"/></br>
                                            <img src="{{ asset('uploads/activity/'.$activity->image) }}" class="img-thumbnail" width="100" height="100" />
                                        </div>



                                        <a href="{{ route('activity.index') }}" class="btn btn-danger">Back</a>
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