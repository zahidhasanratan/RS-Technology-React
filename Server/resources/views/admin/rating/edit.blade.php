@extends('layouts.app')

@section('title','Edit Rating')
@section('content')

    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>Edit Rating</h2>

                </div>
            </div>
            <!-- /. ROW  -->
            <hr />
            <div class="row">
                <div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Add News
                        </div>
                        <div class="panel-body">
                            <div class="row">

                                <div class="col-md-12">
                                    @include('layouts.partial.msg')

                                    <form role="form" method="post" action="{{ route('rating.update',$rating->id) }}" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <label>Company Name</label>
                                            <input class="form-control" name="title" value="{{ $rating->title }}" placeholder="Company Name" />

                                        </div>

                                        <div class="form-group">
                                            <label>Sector</label>
                                            <select name="sector" class="form-control" onChange="">
                                                @if (!(empty($rating->sector)))
                                                    <option value="">{{$rating->sector}}</option>

                                                @else
                                                    <option value="NULL">Select Menu</option>

                                                @endif

                                                @foreach($sector as $sector)

                                                    <option value="{{$sector->title}}">{{$sector->title}}</option>

                                                @endforeach

                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Industry</label>
                                            <select name="industry" class="form-control" onChange="">
                                                @if (!(empty($rating->industry)))
                                                    <option value="">{{$rating->industry}}</option>

                                                @else
                                                    <option value="NULL">Select Menu</option>

                                                @endif

                                                @foreach($industry as $industry)

                                                    <option value="{{$industry->title}}">{{$industry->title}}</option>

                                                @endforeach

                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Rating Type</label>
                                            <select name="type" class="form-control" onChange="">
                                                @if (!(empty($rating->type)))
                                                    <option value="">{{$rating->type}}</option>

                                                @else
                                                    <option value="NULL">Select Menu</option>

                                                @endif

                                                @foreach($ratingtype as $ratingtype)

                                                    <option value="{{$ratingtype->title}}">{{$ratingtype->title}}</option>

                                                @endforeach

                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Rating</label>
                                            <select name="type" class="form-control" onChange="">
                                                @if (!(empty($rating->rating)))
                                                    <option value="">{{$rating->rating}}</option>

                                                @else
                                                    <option value="NULL">Select Menu</option>

                                                @endif

                                                @foreach($ratinglist as $ratinglist)

                                                    <option value="{{$ratinglist->title}}">{{$ratinglist->title}}</option>

                                                @endforeach

                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Rating Date</label>
                                            <input class="form-control" name="radingdate" value="{{ $rating->radingdate }}" placeholder="Rating" />

                                        </div>
                                        <div class="form-group">
                                            <label>Outlook / Alert</label>
                                            <select name="type" class="form-control" onChange="">
                                                @if (!(empty($rating->outlook)))
                                                    <option value="">{{$rating->outlook}}</option>

                                                @else
                                                    <option value="NULL">Select Menu</option>

                                                @endif

                                                @foreach($outlook as $outlook)

                                                    <option value="{{$outlook->title}}">{{$outlook->title}}</option>

                                                @endforeach

                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>History</label>

                                            <textarea class="form-control ckeditor" rows="3" name="history"> {{ $rating->history }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Action</label>

                                            <textarea class="form-control ckeditor" rows="3" name="action">{{ $rating->action }}</textarea>

                                        </div>
                                        <div class="form-group">
                                            <label>Issue</label>
                                            <textarea class="form-control ckeditor" rows="3" name="issue">{{ $rating->issue }}</textarea>
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