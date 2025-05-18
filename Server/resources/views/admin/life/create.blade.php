@extends('layouts.app')

@section('title','Add Management')
@section('content')

    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>Add Management</h2>

                </div>
            </div>
            <!-- /. ROW  -->
            <hr />
            <div class="row">
                <div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Add Management
                        </div>
                        <div class="panel-body">
                            <div class="row">

                                <div class="col-md-12">
                                    @include('layouts.partial.msg')

                                    <form role="form" method="post" action="{{ route('life.store') }}" enctype="multipart/form-data">
                                        @csrf


                                        <div class="form-group">
                                            <label>Name</label>
                                            <input class="form-control" name="title" placeholder="Name" required/>
                                        </div>


                                        <div class="form-group">
                                            <label>Short</label>
                                            <textarea class="form-control" rows="3" name="Address"></textarea>
                                        </div>


                                        <div class="form-group">
                                            <label>Designation</label>
                                            <input class="form-control" type="text" name="email" placeholder="Designation"/>
                                        </div>


                                        <div class="form-group">
                                            <label>Photo (Height:320px X Width:370px)</label>
                                            <input type="file" name="image"/>
                                        </div>

                                        <a href="{{ route('life.index') }}" class="btn btn-danger">Back</a>
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
