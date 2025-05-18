@extends('layouts.app')

@section('title','Edit')
@section('content')

    <div id="page-wrapper">
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>Edit Info</h2>

                </div>
            </div>
            <!-- /. ROW  -->
            <hr/>
            <div class="row">
                <!-- Form Elements -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Edit Info
                    </div>
                    <div class="panel-body">
                        <div class="row">

                            <div class="col-md-12">
                                @include('layouts.partial.msg')

                                <form role="form" method="post" action="{{ route('others.update',$others->id) }}"
                                      enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    @if($others->id ==2)
                                        <div class="form-group">
                                            <label>Address</label>
                                            <input class="form-control" name="title" value="{{ $others->title }}"
                                                   placeholder="Shipment Delivered"/>
                                        </div>

                                        <div class="form-group">
                                            <label>Mobile</label>
                                            <input class="form-control" name="slug" value="{{ $others->slug }}"
                                                   placeholder="Qualified Executives"/>
                                        </div>
                                        <div class="form-group">
                                            <label>Phone 2</label>
                                            <input class="form-control" name="title2" value="{{ $others->title2 }}"
                                                   placeholder="Phone 2"/>
                                        </div>

                                        <div class="form-group">
                                            <label>Email
                                            </label>
                                            <input class="form-control" name="description"
                                                   value="{{ $others->description }}" placeholder="Expert Workers
"/>
                                        </div>
                                        <div class="form-group">
                                            <label>Email 2</label>
                                            <input class="form-control" name="slug2" value="{{ $others->slug2 }}"
                                                   placeholder="Email 2"/>
                                        </div>
                                        <div class="form-group">
                                            <label>Working Hours
                                            </label>
                                            <input class="form-control" name="working" value="{{ $others->working }}"
                                                   placeholder="Working Hours"/>
                                        </div>
                                        {{--                                        <div class="form-group">--}}
                                        {{--                                            <label>Award Won</label>--}}
                                        {{--                                            <input class="form-control" name="phone" value="{{ $others->phone }}" placeholder="Happy Buyers" />--}}
                                        {{--                                        </div>--}}
                                    @endif

                                    @if($others->id ==5)
                                        <div class="form-group">
                                            <label>Phone</label>
                                            <input class="form-control" name="title" value="{{ $others->title }}"
                                                   placeholder="Phone"/>
                                        </div>


                                        <div class="form-group">
                                            <label>Email</label>
                                            <input class="form-control" name="slug" value="{{ $others->slug }}"
                                                   placeholder="Email"/>
                                        </div>


                                        <div class="form-group">
                                            <label>Address
                                            </label>
                                            <input class="form-control" name="description"
                                                   value="{{ $others->description }}" placeholder="Address"/>
                                        </div>


                                    @endif

                                    @if($others->id ==6)

                                        <div class="form-group">
                                            <label>Title</label>
                                            <input class="form-control" name="title" value="{{ $others->title }}"
                                                   placeholder="Title"/>
                                        </div>
                                        <div class="form-group">

                                            <label>Description
                                            </label>
                                            <textarea class="form-control" name="description"
                                                      placeholder="Address">{{ $others->description }}</textarea>
                                        </div>
                                    @endif

                                    <a href="{{ route('others.index') }}" class="btn btn-danger">Back</a>
                                    <button type="submit" class="btn btn-primary">Save</button>

                                </form>
                                <br/>


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
