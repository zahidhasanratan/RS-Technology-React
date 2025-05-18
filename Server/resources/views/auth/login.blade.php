@extends('layouts.app')

@section('title','Login')
@push('css')
<style>
    #wrapper {
        width: 100%;
        background: #fff !important;
    }
</style>

@endpush
@section('content')
    <div class="container">
        <div class="row text-center ">
            <div class="col-md-12">
                <br /><br />
                <h2> Login</h2>

                {{--<h5>( Login yourself to get access )</h5>--}}
                <br />
            </div>
        </div>
        <div class="row ">

            <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <strong>   Enter Details To Login </strong>
                    </div>
                    <div class="panel-body">
                        @if(isset(Auth::user()->email))
                            <script>window.location="/adminlogin/successlogin";</script>
                        @endif

                        @if($message    =   Session::get('error'))
                            <div class="alert alert-danger alert-block">
                                <button type="button" class="close" data-dismiss="alert">x</button>
                                <strong> {{$message}}</strong>
                            </div>
                        @endif
                        @if(count($errors) >0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{$error}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form role="form" method="POST" action="{{ route('login') }}">
                            <br />
                            {{csrf_field()}}
                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-tag"  ></i></span>
                                <input type="text" class="form-control" name="email" placeholder="Your Username " />
                            </div>
                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                                <input type="password" name="password" class="form-control"  placeholder="Your Password" />
                            </div>
                            {{--<div class="form-group">--}}
                                {{--<label class="checkbox-inline">--}}
                                    {{--<input type="checkbox" /> Remember me--}}
                                {{--</label>--}}
                                {{--<span class="pull-right">--}}
                                                   {{--<a href="#" >Forget password ? </a>--}}
                                            {{--</span>--}}
                            {{--</div>--}}

                            <input type="submit" name="login" class="btn btn-primary " value="Login">
                            <hr />

                        </form>
                    </div>

                </div>
            </div>


        </div>
    </div>

@endsection
