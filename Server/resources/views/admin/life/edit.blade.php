@extends('layouts.app')

@section('title','Edit Management')
@section('content')

    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>Edit Management</h2>

                </div>
            </div>
            <!-- /. ROW  -->
            <hr />
            <div class="row">
                <div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Life Management
                        </div>
                        <div class="panel-body">
                            <div class="row">

                                <div class="col-md-12">
                                    @include('layouts.partial.msg')

                                    <form role="form" method="post" action="{{ route('life.update',$news->id) }}" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')



                                        <div class="form-group">
                                            <label>Name</label>
                                            <input class="form-control" name="title" placeholder="Name" value="{{ $news->Name }}" required/>
                                        </div>


                                        <div class="form-group">
                                            <label>Short</label>
                                            <textarea class="form-control" rows="3" name="Address">{{ $news->Address }}</textarea>
                                        </div>



                                        <div class="form-group">
                                            <label>Designation </label>
                                            <input class="form-control" type="text" name="email" placeholder="Designation" value="{{ $news->email }}"/>
                                        </div>



                                        <div class="form-group">
                                            <label>Image (Height:320px X Width:370px)</label>
                                            <input type="file" name="image"/></br>
                                            @if($news->image !='')
                                            <img src="{{ asset('uploads/life/'.$news->image) }}" class="img-thumbnail" width="100" height="100" />
                                            @else
                                                <img src="{{ asset('uploads/life/dummy.jpeg') }}" class="img-thumbnail" width="100" height="100" />
                                            @endif
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
