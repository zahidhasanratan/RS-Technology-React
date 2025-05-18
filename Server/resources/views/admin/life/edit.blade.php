@extends('layouts.app')

@section('title','Edit Life Member')
@section('content')

    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>Edit Life Member</h2>

                </div>
            </div>
            <!-- /. ROW  -->
            <hr />
            <div class="row">
                <div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Life Member
                        </div>
                        <div class="panel-body">
                            <div class="row">

                                <div class="col-md-12">
                                    @include('layouts.partial.msg')

                                    <form role="form" method="post" action="{{ route('life.update',$news->id) }}" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')

                                        <div class="form-group">
                                            <label>Life Member No.</label>
                                            <input class="form-control" name="LM_No" placeholder="Life Member No." required value="{{ $news->LM_No }}"/>

                                        </div>

                                        <div class="form-group">
                                            <label>Name</label>
                                            <input class="form-control" name="title" placeholder="Name" value="{{ $news->Name }}" required/>
                                        </div>
                                        <div class="form-group">
                                            <label>Batch</label>
                                            <input class="form-control" name="Batch" placeholder="Batch" value="{{ $news->Batch }}" required/>
                                        </div>


                                        <div class="form-group">
                                            <label>Address</label>
                                            <textarea class="form-control" rows="3" name="Address">{{ $news->Address }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Address3</label>
                                            <textarea class="form-control" rows="3" name="Address3">{{ $news->Address3 }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Address1</label>
                                            <textarea class="form-control" rows="3" name="Address1">{{ $news->Address1 }}</textarea>
                                        </div>

                                        <div class="form-group">
                                            <label>Email</label>
                                            <input class="form-control" type="email" name="email" placeholder="Email" value="{{ $news->email }}"/>
                                        </div>

                                        <div class="form-group">
                                            <label>Phone</label>
                                            <input class="form-control" type="text" name="phone" placeholder="Phone"  value="{{ $news->phone }}"/>
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