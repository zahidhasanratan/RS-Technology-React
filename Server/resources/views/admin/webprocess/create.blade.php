@extends('layouts.app')

@section('title','Add Process')
@section('content')

    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>Add Process of {{ \App\Service::where('id', $id)->first()?->title }}</h2>

                </div>
            </div>
            <!-- /. ROW  -->
            <hr />
            <div class="row">
                <div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Add Process of {{ \App\Service::where('id', $id)->first()?->title }}
                        </div>
                        <div class="panel-body">
                            <div class="row">

                                <div class="col-md-12">
                                    @include('layouts.partial.msg')

                                    <form role="form" method="post" action="{{ route('webprocess.store') }}" enctype="multipart/form-data">
                                        @csrf
                                        <input style="display: none" name="m_id" value="{{ $id  }}"/>
                                        <div class="form-group">
                                            <label>Title</label>
                                            <input class="form-control" name="title" placeholder="Title" required/>

                                        </div>

                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea class="form-control" rows="3" name="description"></textarea>
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
