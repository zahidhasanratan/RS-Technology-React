@extends('layouts.app')

@section('title','Edit Package Pricing')
@section('content')

    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>Edit Package Pricing</h2>

                </div>
            </div>
            <!-- /. ROW  -->
            <hr />
            <div class="row">
                <div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Package Pricing
                        </div>
                        <div class="panel-body">
                            <div class="row">

                                <div class="col-md-12">
                                    @include('layouts.partial.msg')

                                    <form role="form" method="post" action="{{ route('packagepricing.update',$faq->id) }}" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <input style="display: none" name="m_id" placeholder="Title" required value="{{ $faq->m_id }}"/>
                                        <div class="form-group">
                                            <label>Title</label>
                                            <input class="form-control" name="title" placeholder="Title" required value="{{ $faq->title }}"/>

                                        </div>

                                        <div class="form-group">
                                            <label>Price</label>
                                            <input class="form-control" name="price" placeholder="Price" value="{{ $faq->price }}"/>
                                        </div>
                                        <div class="form-group">
                                            <label>Sub Title</label>
                                            <input class="form-control" name="sub_title" placeholder="Sub Title"  value="{{ $faq->sub_title }}"/>
                                        </div>
                                        <div class="form-group">
                                            <label>Field 1</label>
                                            <input class="form-control" name="field1" placeholder="Field 1" value="{{ $faq->field1 }}"/>
                                        </div>

                                        <div class="form-group">
                                            <label>Field 2</label>
                                            <input class="form-control" name="field2" placeholder="Field 2"  value="{{ $faq->field2 }}"/>
                                        </div>
                                        <div class="form-group">
                                            <label>Field 3</label>
                                            <input class="form-control" name="field3" placeholder="Field 3"  value="{{ $faq->field3 }}"/>
                                        </div>
                                        <div class="form-group">
                                            <label>Field 4</label>
                                            <input class="form-control" name="field4" placeholder="Field 4"  value="{{ $faq->field4 }}"/>
                                        </div>
                                        <div class="form-group">
                                            <label>Field 5</label>
                                            <input class="form-control" name="field5" placeholder="Field 5"  value="{{ $faq->field5 }}"/>
                                        </div>
                                        <div class="form-group">
                                            <label>Field 6</label>
                                            <input class="form-control" name="field6" placeholder="Field 6"  value="{{ $faq->field6 }}"/>
                                        </div>
                                        <div class="form-group">
                                            <label>Field 7</label>
                                            <input class="form-control" name="field7" placeholder="Field 7"  value="{{ $faq->field7 }}"/>
                                        </div>

                                        <div class="form-group">
                                            <label>Field 8</label>
                                            <input class="form-control" name="field8" placeholder="Field 8"  value="{{ $faq->field8 }}"/>
                                        </div>
                                        <div class="form-group">
                                            <label>Field 9</label>
                                            <input class="form-control" name="field9" placeholder="Field 9"  value="{{ $faq->field9 }}"/>
                                        </div>

                                        <div class="form-group">
                                            <label>Bottom Text</label>
                                            <input class="form-control" name="bottomText" placeholder="Bottom Text"  value="{{ $faq->bottomText }}"/>
                                        </div>


                                        <div class="form-group">
                                            <label>Sequence</label>
                                            <input class="form-control" type="number" name="sl" placeholder="Sequence" value="{{ $faq->sl }}"/>
                                        </div>




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
