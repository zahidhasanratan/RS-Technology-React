@extends('layouts.app')

@section('title','Edit Menu')
@section('content')

    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>Edit Menu</h2>

                </div>
            </div>
            <!-- /. ROW  -->
            <hr />
            <div class="row">
                <div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Add Menu
                        </div>
                        <div class="panel-body">
                            <div class="row">

                                <div class="col-md-12">
                                    @include('layouts.partial.msg')

                                    <form role="form" method="post" action="{{ route('menu.update',$menu->id) }}" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <label>Title</label>
                                            <input class="form-control" name="menu_name" value="{{ $menu->menu_name }}" placeholder="Title" />

                                        </div>

                                        <div class="form-group">
                                            <label>Parent Menu</label>
                                             <div class="col-sm-11">
                                                <select name="root_id" class="form-control"   onchange="ajaxSearch(this.value,'subcatid','root_id')">
                                                    @if (!(empty($parent_id_for->menu_name)))
                                                    <option value="">{{$parent_id_for->menu_name}}</option>

                                                    @else
                                                        <option value="">Select Menu</option>

                                                    @endif

                                                    @foreach($main as $main_menu)

                                                        <option value="{{$main_menu->id}}">{{$main_menu->menu_name}}</option>

                                                    @endforeach

                                                </select>
                                            </div>
                                            <div class="col-sm-1">
                                        	<div id="LoadingImageE" style="width:100%; height:auto; text-align:left;display:none; ">
                                            <img src="{{ asset('public/admin/assets/img/loader7.gif')}}" style="width:30px; height:auto" /></div>
                                        </div>
                                        </div>

                                            <div class="form-group">
                                                <label>Sub Menu</label>
                                                <div id="subcatid">
                                                <select name="sroot_id" class="form-control" onChange="">

                                                    @if (!(empty($sub_id_for->menu_name)))
                                                        <option value="">{{$sub_id_for->menu_name}}</option>

                                                    @else
                                                        <option value="">Select Sub Menu</option>

                                                    @endif


                                                    @foreach($sub_main as $sub_main)

                                                        <option value="{{$sub_main->id}}">{{$sub_main->menu_name}}</option>

                                                    @endforeach

                                                </select>
												</div>
                                        </div>
                                        <div class="form-group">
                                            <label>Last Menu</label>
                                            <div id="lastcatid">
                                            <select name="troot_id" class="form-control" onChange="">

                                                @if (!(empty($last_id_for->menu_name)))
                                                    <option value="">{{$last_id_for->menu_name}}</option>

                                                @else
                                                    <option value="">Select Last Menu</option>

                                                @endif


                                                @foreach($menu_all as $main_menu)

                                                    <option value="{{$main_menu->id}}">{{$main_menu->menu_name}}</option>

                                                @endforeach

                                            </select>
											</div>
                                        </div>
                                        <div class="form-group">
                                            <label>Page Type</label>
                                            <select name="page_type" class="form-control" onChange="">
                                                @if (!(empty($menu->page_type)))
                                                    <option value="{{$menu->page_type}}">{{$menu->page_type}}</option>
                                                @else

                                                <option value="">Select Page Type</option>

                                                @endif
                                                <option value="page">Page</option>
                                                <option value="Service">Service</option>
                                                <option value="gallery">Picture Gallery</option>
                                                <option value="video">Video Gallery</option>
                                                <option value="contact">Contact Us</option>
                                                <option value="url">Url</option>

                                            </select>

                                        </div>
                                        <div class="form-group">
                                            <label>External Link</label>
                                            <input class="form-control" name="external" placeholder="External Link" value="{{$menu->external_link}}" />

                                        </div>
                                        <div class="form-group">
                                            <label>Sequence</label>
                                            <input class="form-control" name="sequence" value="{{ $menu->sequence }}" placeholder="Sequence" />

                                        </div>
                                        <div class="form-group">
                                            <label>Target Window</label>
                                            <select name="target" class="form-control" onChange="">
                                                <option value="">Target Window</option>

                                                <option value="_self">Same Window</option>
                                                <option value="_blank">New Window</option>

                                            </select>

                                        </div>
                                        <div class="form-group styled-checkboxes">
                                            <label class="group-label">Main Section</label>
                                            <div class="checkbox-container">
                                                <div class="checkbox-item">
                                                    <input type="checkbox" class="form-control" name="display"  value="1" @if($menu->display==1) checked="checked" @endif>
                                                    <label for="main">Main</label>
                                                </div>
                                            </div>

                                            <label class="group-label">Footer Sections</label>
                                            <div class="checkbox-container">
                                                <div class="checkbox-item">
                                                    <input type="checkbox"id="footer1"  class="form-control" name="footer1"  value="1" @if($menu->footer1==1) checked="checked" @endif>
                                                    <label for="footer1">Footer 1</label>
                                                </div>
{{--                                                <div class="checkbox-item">--}}
{{--                                                    <input type="checkbox"id="footer2"  class="form-control" name="footer2"  value="1" @if($menu->footer2==1) checked="checked" @endif>--}}
{{--                                                    <label for="footer2">Footer 2</label>--}}
{{--                                                </div>--}}
{{--                                                <div class="checkbox-item">--}}
{{--                                                    <input type="checkbox"id="footer3"  class="form-control" name="footer3"  value="1" @if($menu->footer3==1) checked="checked" @endif>--}}
{{--                                                    <label for="footer3">Footer 3</label>--}}
{{--                                                </div>--}}
{{--                                                <div class="checkbox-item">--}}
{{--                                                    <input type="checkbox"id="footer4"  class="form-control" name="footer4"  value="1" @if($menu->footer4==1) checked="checked" @endif>--}}
{{--                                                    <label for="footer4">Footer 4</label>--}}
{{--                                                </div>--}}
                                            </div>
                                        </div>


                                        <a href="{{ route('menu.index') }}" class="btn btn-danger">Back</a>
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
        <style>
            .styled-checkboxes {
                font-family: Arial, sans-serif;
                margin: 20px 0;
            }

            .group-label {
                font-weight: bold;
                margin-bottom: 10px;
                display: block;
            }

            .checkbox-container {
                display: flex;
                flex-wrap: wrap;
                gap: 10px;
                margin: 10px 0;
            }

            .checkbox-item {
                display: flex;
                align-items: center;
                gap: 8px;
                padding: 5px 10px;
                background: #f9f9f9;
                border: 1px solid #ddd;
                border-radius: 5px;
                transition: all 0.3s ease;
                cursor: pointer;
            }

            .checkbox-item input[type="checkbox"] {
                cursor: pointer;
                width: 16px;
                height: 16px;
                margin: 0;
            }

            .checkbox-item:hover {
                background: #e6f7ff;
                border-color: #3498db;
            }

            .checkbox-item label {
                margin: 0;
                font-size: 14px;
            }

        </style>

<script>
function ajaxSearch(keywords,id,colid)
{
	//alert(keywords+id+colid);
	if(keywords==0 ){
		return false;
	}
	else{
		  var surl = '{{ route("menu.ajaxsearch") }}';
		  $.ajax({
			type: "GET",
			url: surl,
			data: {'keywords':keywords,'colid':colid},

			cache: false,
			beforeSend: function(){
				$('#LoadingImageE').show();
			},
			complete: function(){
				$('#LoadingImageE').hide();
			},
			success: function(response) {
				  $('#'+id).html(response);
				  //$("#LoadingImageE").hide();
			},
			error: function (xhr, status) {
			  $("#LoadingImageE").hide();
			  alert('Unknown error ' + status);
			}
		  });
	}
}
</script>
