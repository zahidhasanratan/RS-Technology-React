@extends('layouts.app')

@section('title','Edit Benifits')
@section('content')

    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>Edit Benifits</h2>

                </div>
            </div>
            <!-- /. ROW  -->
            <hr />
            <div class="row">
                <div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Edit Benifits
                        </div>
                        <div class="panel-body">
                            <div class="row">

                                <div class="col-md-12">
                                    @include('layouts.partial.msg')

                                    <form role="form" method="post" action="{{ route('clilentbenifts.update',$faq->id) }}" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <input style="display: none" name="m_id" placeholder="Title" required value="{{ $faq->m_id }}"/>
                                        <div class="form-group">
                                            <label>Title</label>
                                            <input class="form-control" name="title" placeholder="Title" required value="{{ $faq->title }}"/>

                                        </div>

                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea class="form-control" rows="3" name="description">{{ $faq->description }}</textarea>
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
