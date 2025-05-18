@extends('layouts.app')

@section('title','Add Rating')
@section('content')

    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>Add Rating</h2>

                </div>
            </div>
            <!-- /. ROW  -->
            <hr />
            <div class="row">
                <div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Add Rating
                        </div>
                        <div class="panel-body">
                            <div class="row">

                                <div class="col-md-12">
                                    @include('layouts.partial.msg')

                                    <form role="form" method="post" action="{{ route('rating.store') }}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label>Company Name</label>
                                            <input class="form-control" name="title" placeholder="Company Name" />

                                        </div>
                                        <div class="form-group">
                                            <label>Sector</label>
                                            <select name="sector" class="form-control" onChange="">

                                                    <option value="NULL">Select Menu</option>



                                                @foreach($sector as $sector)

                                                    <option value="{{$sector->title}}">{{$sector->title}}</option>

                                                @endforeach

                                            </select>
                                        </div>


                                        <div class="form-group">
                                            <label>Industry</label>
                                            <select name="industry" class="form-control" onChange="">

                                                <option value="NULL">Select Menu</option>



                                                @foreach($industry as $industry)

                                                    <option value="{{$industry->title}}">{{$industry->title}}</option>

                                                @endforeach

                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Rating Type</label>
                                            <select name="type" class="form-control" onChange="">

                                                <option value="NULL">Select Menu</option>



                                                @foreach($ratingtype as $ratingtype)

                                                    <option value="{{$ratingtype->title}}">{{$ratingtype->title}}</option>

                                                @endforeach

                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Rating</label>
                                            <select name="rating" class="form-control" onChange="">

                                                <option value="NULL">Select Menu</option>



                                                @foreach($ratinglist as $ratinglist)

                                                    <option value="{{$ratinglist->title}}">{{$ratinglist->title}}</option>

                                                @endforeach

                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Rating Date</label>
                                            <input class="form-control" name="radingdate" placeholder="Rating" />

                                        </div>
                                        <div class="form-group">
                                            <label>Outlook / Alert</label>
                                            <select name="outlook" class="form-control" onChange="">

                                                <option value="NULL">Select Menu</option>



                                                @foreach($outlook as $outlook)

                                                    <option value="{{$outlook->title}}">{{$outlook->title}}</option>

                                                @endforeach

                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>History</label>

                                            <textarea class="form-control ckeditor" rows="3" name="history"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Action</label>

                                            <textarea class="form-control ckeditor" rows="3" name="action"></textarea>

                                        </div>
                                        <div class="form-group">
                                            <label>Issue</label>
                                            <textarea class="form-control ckeditor" rows="3" name="issue"></textarea>
                                        </div>





                                        <a href="{{ route('rating.index') }}" class="btn btn-danger">Back</a>
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