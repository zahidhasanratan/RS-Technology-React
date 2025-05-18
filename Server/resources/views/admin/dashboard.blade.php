@extends('layouts.app')

@section('title','Dashboard')

@push('css')
<style>
    .text-muted a{
       color : #4a4007
    }
</style>
@endpush

@section('content')
    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>Admin Dashboard</h2>


                </div>
            </div>
            <!-- /. ROW  -->
            <hr />
            <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-6">
                <div class="panel panel-back noti-box">
                <span class="icon-box bg-color-red set-icon">
                    <i class="fa fa-bars"></i>
                </span>
                    <div class="text-box" >
                        <p class="main-text">Menu</p>
                        <p class="text-muted"><a style="text-decoration:none;" href="{{ route('menu.index') }}">All Menu</a></p>
                    </div>
                </div>
            </div>
                <div class="col-md-3 col-sm-6 col-xs-6">
                    <div class="panel panel-back noti-box">
                <span class="icon-box bg-color-green set-icon">
                    <i class="fa fa-bars"></i>
                </span>
                        <div class="text-box" >
                            <p class="main-text">Page</p>
                            <p class="text-muted"><a style="text-decoration:none;" href="{{ route('page.index') }}">All Page</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-6">
                    <div class="panel panel-back noti-box">
                <span class="icon-box bg-color-blue set-icon">
                    <i class="fa fa-desktop"></i>
                </span>
                        <div class="text-box" >
                            <p class="main-text">Slider</p>
                            <p class="text-muted"><a style="text-decoration:none;" href="{{ route('slider.index') }}">All Slider</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-6">
                    <div class="panel panel-back noti-box">
                <span class="icon-box bg-color-brown set-icon">
                    <i class="fa fa-dot-circle-o"></i>
                </span>
                        <div class="text-box" >
                            <p class="main-text">About</p>
                            <p class="text-muted"><a style="text-decoration:none;" href="{{ asset('admin/objects/1/edit') }}">About</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-6">
                    <div class="panel panel-back noti-box">
                <span class="icon-box bg-color-brown set-icon">
                    <i class="fa fa-newspaper-o"></i>
                </span>
                        <div class="text-box" >
                            <p class="main-text">News</p>
                            <p class="text-muted"><a style="text-decoration:none;" href="{{ route('news.index') }}">News</a></p>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 col-xs-6">
                    <div class="panel panel-back noti-box">
                <span class="icon-box bg-color-red set-icon">
                    <i class="fa fa-tasks"></i>
                </span>
                        <div class="text-box" >
                            <p class="main-text">Events</p>
                            <p class="text-muted"><a style="text-decoration:none;" href="{{ route('service.index') }}">Events</a></p>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 col-xs-6">
                    <div class="panel panel-back noti-box">
                <span class="icon-box bg-color-green set-icon">
                    <i class="fa fa-tasks"></i>
                </span>
                        <div class="text-box" >
                            <p class="main-text">Meeting</p>
                            <p class="text-muted"><a style="text-decoration:none;" href="{{ route('activity.index') }}">Meeting</a></p>
                        </div>
                    </div>
                </div>
            </div>


            <hr />



            <!-- /. ROW  -->
        </div>
        <!-- /. PAGE INNER  -->
    </div>
@endsection

@push('scripts')

@endpush