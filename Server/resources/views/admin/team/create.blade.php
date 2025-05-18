@extends('layouts.app')

@section('title','Add Team')
@section('content')

    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>Add Team</h2>

                </div>
            </div>
            <!-- /. ROW  -->
            <hr />
            <div class="row">
                <div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Add Team
                        </div>
                        <div class="panel-body">
                            <div class="row">

                                <div class="col-md-12">
                                    @include('layouts.partial.msg')

                                    <form role="form" method="post" action="{{ route('team.store') }}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label>Title</label>
                                            <input class="form-control" name="title" placeholder="Title" />

                                        </div>
                                        <div class="form-group">
                                            <label>Designation</label>
                                            <input class="form-control" name="designation" placeholder="Designation" />

                                        </div>
                                        <div class="form-group">
                                            <label>Short</label>
                                            <textarea class="form-control" rows="3" name="short"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Type</label>
                                            <select name="type" class="form-control" onChange="">
                                                <option value="">Select Type</option>

                                                <option value="Main">Main</option>
                                                <option value="Microfinance">Microfinance</option>
                                                <option value="Medical">Medical</option>

                                            </select>

                                        </div>

                                        <div class="form-group">
                                            <label>Image</label>
                                            <input type="file" name="image"/>
                                        </div>


                                        <a href="{{ route('team.index') }}" class="btn btn-danger">Back</a>
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