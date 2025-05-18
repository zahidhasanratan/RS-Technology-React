@extends('layouts.app')

@section('title','Add Menu')
@section('content')

    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>Add Menu</h2>

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

                                    <form role="form" method="post" action="{{ route('menu.store') }}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label>Menu Name</label>
                                            <input class="form-control" name="menu_name" placeholder="Menu Name" />

                                        </div>
                                        <div class="form-group">
                                            <label>Parent Menu</label>
                                           <div>
                                           		<select name="root_id" class="form-control"  onchange="ajaxSearch(this.value,'subcatid','root_id')">
                                                <option value="">Select Parent Menu</option>
                                                @foreach($main as $main_menu)
                                                   <option value="{{$main_menu->id}}">{{$main_menu->menu_name}}</option>
                                                @endforeach

                                            </select>
                                            </div>
                                            <div>
                                        	<div id="LoadingImageE" style="width:100%; height:auto; text-align:left;display:none; ">
                                            <img src="{{ asset('public/admin/assets/img/loader7.gif')}}" style="width:30px; height:auto" /></div>
                                        </div>

                                        </div>
                                        <div class="form-group">
                                            <label>Sub Menu</label>
                                            <div id="subcatid">
                                           	 <select name="sroot_id" class="form-control">
                                                <option value="">Sub Menu</option>

                                                @foreach($sub_main as $sub_menu)

                                                    <option value="{{$sub_menu->id}}">{{$sub_menu->menu_name}}</option>

                                                @endforeach

                                            </select>
                                            </div>

                                        </div>
                                        <div class="form-group">
                                            <label>Last Menu</label>
                                        <div id="lastcatid">
                                            <select name="troot_id" class="form-control">
                                                <option value="">Last Menu</option>

                                                @foreach($sroot_main as $sroot_menu)

                                                    <option value="{{$sroot_menu->id}}">{{$sroot_menu->menu_name}}</option>

                                                @endforeach

                                            </select>
											</div>
                                        </div>
                                        <div class="form-group">
                                            <label>Page Type</label>
                                            <select name="page_type" class="form-control" onChange="">
                                                <option value="">Page Type</option>

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
                                            <input class="form-control" name="external" placeholder="External Link" />

                                        </div>
                                        <div class="form-group">
                                            <label>Sequence</label>
                                            <input class="form-control" name="sequence" placeholder="Sequence" />

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
                                                    <input type="checkbox" id="main" name="display" value="1">
                                                    <label for="main">Main</label>
                                                </div>
                                            </div>

                                            <label class="group-label">Footer Sections</label>
                                            <div class="checkbox-container">
                                                <div class="checkbox-item">
                                                    <input type="checkbox" id="footer1" name="footer1" value="1">
                                                    <label for="footer1">Footer 1</label>
                                                </div>

{{--                                                <div class="checkbox-item">--}}
{{--                                                    <input type="checkbox" id="footer2" name="footer2" value="1">--}}
{{--                                                    <label for="footer2">Footer 2</label>--}}
{{--                                                </div>--}}
{{--                                                <div class="checkbox-item">--}}
{{--                                                    <input type="checkbox" id="footer3" name="footer3" value="1">--}}
{{--                                                    <label for="footer3">Footer 3</label>--}}
{{--                                                </div>--}}
{{--                                                <div class="checkbox-item">--}}
{{--                                                    <input type="checkbox" id="footer4" name="footer4" value="1">--}}
{{--                                                    <label for="footer4">Footer 4</label>--}}
{{--                                                </div>--}}

                                            </div>
                                        </div>





                                        <a href="{{ route('activity.index') }}" class="btn btn-danger">Back</a>
                                        <button type="submit" class="btn btn-primary">Submit</button>

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
