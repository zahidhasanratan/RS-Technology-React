@extends('layouts.app')

@section('title','Add Our Clients')
@section('content')

    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>Add Our Clients</h2>

                </div>
            </div>
            <!-- /. ROW  -->
            <hr />
            <div class="row">
                <div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Add Our Clients
                        </div>
                        <div class="panel-body">
                            <div class="row">

                                <div class="col-md-12">
                                    @include('layouts.partial.msg')

                                    <form role="form" method="post" action="{{ route('client.store') }}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input class="form-control" name="title" placeholder="Name" />
                                        </div>

                                        <div class="form-group">
                                            <label>Url</label>
                                            <input class="form-control" name="designation" placeholder="Url" />
                                        </div>

                                        <div class="form-group">
                                            <label>Image (Height:235px X width:80px)</label>
                                            <input type="file" name="image"/>
                                        </div>



                                        <a href="{{ route('client.index') }}" class="btn btn-danger">Back</a>
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
