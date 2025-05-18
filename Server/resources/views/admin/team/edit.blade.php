@extends('layouts.app')

@section('title','Edit Pending Team')
@section('content')

    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>Edit Pending Team</h2>

                </div>
            </div>
            <!-- /. ROW  -->
            <hr />
            <div class="row">
                <div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Add Pending Member
                        </div>
                        <div class="panel-body">
                            <div class="row">

                                <div class="col-md-12">
                                    @include('layouts.partial.msg')

                                    <form role="form" method="post" action="{{ route('team.update',$team->id) }}" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input class="form-control" name="Name" value="{{ $team->Name }}" placeholder="Name" />
                                        </div>

                                        <div class="form-group">
                                            <label>Father Name</label>
                                            <input class="form-control" name="FatherMotherHusband" value="{{ $team->FatherMotherHusband }}" placeholder="Father Name" />
                                        </div>

                                        <div class="form-group">
                                            <label>Age</label>
                                            <input class="form-control" name="Age" value="{{ $team->Age }}" placeholder="Age" />
                                        </div>
                                        <div class="form-group">
                                            <label>Occupation</label>
                                            <input class="form-control" name="Occupation" value="{{ $team->Occupation }}" placeholder="Occupation" />
                                        </div>

                                        <div class="form-group">
                                            <label>Education Qualification</label>
                                            <input class="form-control" name="EducationQuali" value="{{ $team->EducationQuali }}" placeholder="Occupation" />
                                        </div>
                                        <div class="form-group">
                                            <label>District</label>
                                            <input class="form-control" name="districtId" value="{{ $team->districtId }}" placeholder="District" />
                                        </div>

                                        <div class="form-group">
                                            <label>NID</label>
                                            <input class="form-control" name="NID" value="{{ $team->NID }}" placeholder="NID" />
                                        </div>

                                        <div class="form-group">
                                            <label>VillageHome</label>
                                            <input class="form-control" name="VillageHome" value="{{ $team->VillageHome }}" placeholder="VillageHome" />
                                        </div>
                                        <div class="form-group">
                                            <label>Union Municipality</label>
                                            <input class="form-control" name="UnionMunicipality" value="{{ $team->UnionMunicipality }}" placeholder="UnionMunicipality" />
                                        </div>
                                        <div class="form-group">
                                            <label>Thana Upazila</label>
                                            <input class="form-control" name="ThanaUpazila" value="{{ $team->ThanaUpazila }}" placeholder="ThanaUpazila" />
                                        </div>

                                        <div class="form-group">
                                            <label>MobileNo</label>
                                            <input class="form-control" name="MobileNo" value="{{ $team->MobileNo }}" placeholder="MobileNo" />
                                        </div>

                                        <div class="form-group">
                                            <label>Email</label>
                                            <input class="form-control" name="Email" value="{{ $team->Email }}" placeholder="Email" />
                                        </div>

                                        <div class="form-group">
                                            <label>Approve</label>
                                            <input type="checkbox" class="form-control" name="Approved" value="1" @php if($team->Approved ==1) echo 'checked' @endphp />
                                        </div>

                                        <div class="form-group">
                                            <label>Image</label>
                                            <input type="file" name="image"/></br>
                                            <img src="{{ asset('uploads/team/'.$team->image) }}" class="img-thumbnail" width="100" height="100" />
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