@extends('layouts.app')

@section('title','Add Pakcage Price')
@section('content')

    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>Add Package Pricing of {{ \App\Service::where('id', $id)->first()?->title }}</h2>

                </div>
            </div>
            <!-- /. ROW  -->
            <hr />
            <div class="row">
                <div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Add Package Pricing of {{ \App\Service::where('id', $id)->first()?->title }}
                        </div>
                        <div class="panel-body">
                            <div class="row">

                                <div class="col-md-12">
                                    @include('layouts.partial.msg')

                                    <form role="form" method="post" action="{{ route('packagepricing.store') }}" enctype="multipart/form-data">
                                        @csrf
                                        <input style="display: none" name="m_id" value="{{ $id  }}"/>
                                        <div class="form-group">
                                            <label>Title</label>
                                            <input class="form-control" name="title" placeholder="Title" required/>

                                        </div>
                                        <div class="form-group">
                                            <label>Price</label>
                                            <input class="form-control" name="price" placeholder="Price" required/>
                                        </div>
                                        <div class="form-group">
                                            <label>Sub Title</label>
                                            <input class="form-control" name="sub_title" placeholder="Sub Title" required/>
                                        </div>
                                        <div class="form-group">
                                            <label>Field 1</label>
                                            <input class="form-control" name="field1" placeholder="Field 1"/>
                                        </div>

<div class="form-group">
                                            <label>Field 2</label>
                                            <input class="form-control" name="field2" placeholder="Field 2"/>
                                        </div>
<div class="form-group">
                                            <label>Field 3</label>
                                            <input class="form-control" name="field3" placeholder="Field 3"/>
                                        </div>
<div class="form-group">
                                            <label>Field 4</label>
                                            <input class="form-control" name="field4" placeholder="Field 4"/>
                                        </div>
<div class="form-group">
                                            <label>Field 5</label>
                                            <input class="form-control" name="field5" placeholder="Field 5"/>
                                        </div>
<div class="form-group">
                                            <label>Field 6</label>
                                            <input class="form-control" name="field6" placeholder="Field 6"/>
                                        </div>
<div class="form-group">
                                            <label>Field 7</label>
                                            <input class="form-control" name="field7" placeholder="Field 7"/>
                                        </div>

                                        <div class="form-group">
                                            <label>Field 8</label>
                                            <input class="form-control" name="field8" placeholder="Field 8"/>
                                        </div>
                                        <div class="form-group">
                                            <label>Field 9</label>
                                            <input class="form-control" name="field9" placeholder="Field 9"/>
                                        </div>

                                        <div class="form-group">
                                            <label>Bottom Text</label>
                                            <input class="form-control" name="bottomText" placeholder="Bottom Text" required/>
                                        </div>





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
