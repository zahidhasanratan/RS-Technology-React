@extends('layouts.app')

@section('title','Edit User')
@section('content')

    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>Edit User</h2>

                </div>
            </div>
            <!-- /. ROW  -->
            <hr />
            <div class="row">
                <div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Edit User
                        </div>
                        <div class="panel-body">
                            <div class="row">

                                <div class="col-md-12">
                                    @include('layouts.partial.msg')

                                    <form role="form" method="post" action="{{ route('user.update',$team->id) }}" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input class="form-control" name="name" value="{{ $team->name }}" placeholder="Name" />
                                        </div>

                                        <div class="form-group">
                                            <label>Email</label>
                                            <input class="form-control" name="email" value="{{ $team->email }}" placeholder="Email" />
                                        </div>

                                        <div class="form-group">
                                            <label>Branch</label>
                                            <input class="form-control" name="branch" value="{{ $team->branch }}" placeholder="Branch" />
                                        </div>


                                        <div class="form-group">
                                            <label>New Password</label>
                                            <input class="form-control" type ="password" name="password" placeholder="New Password" />

                                        </div>
                                        <div class="form-group">
                                            <label>Confirm Password</label>
                                            <input class="form-control" type ="password" name="password_confirmation"  placeholder="Confirm Password" />

                                        </div>



                                        <a href="{{ route('team.index') }}" class="btn btn-danger">Back</a>
                                        <button type="submit" class="btn btn-primary">Update</button>

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