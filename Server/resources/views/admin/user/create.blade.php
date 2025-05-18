@extends('layouts.app')

@section('title','User')
@section('content')

    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>Add User</h2>

                </div>
            </div>
            <!-- /. ROW  -->
            <hr />
            <div class="row">
                <!-- Form Elements -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Add User
                    </div>
                    <div class="panel-body">
                        <div class="row">

                            <div class="col-md-12">
                                @include('layouts.partial.msg')

                                <form role="form" method="post" action="{{ route('user.store') }}" enctype="multipart/form-data">
                                    @csrf

                                    <div class="form-group">
                                        <label>Name</label>
                                        <input class="form-control" type ="text" name="name" placeholder="Name" />
                                    </div>
                                    <div class="form-group">
                                        <label>Branch</label>
                                        <input class="form-control" type ="text" name="branch" placeholder="Branch" />
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input class="form-control" type ="email" name="email" placeholder="Email" />
                                    </div>

                                    <div class="form-group">
                                        <label>New Password</label>
                                        <input class="form-control" type ="password" name="password" placeholder="New Password" />

                                    </div>
                                    <div class="form-group">
                                        <label>Confirm Password</label>
                                        <input class="form-control" type ="password" name="password_confirmation"  placeholder="Confirm Password" />

                                    </div>





                                    <a href="" class="btn btn-danger">Back</a>
                                    <button type="submit" class="btn btn-primary">Add</button>

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