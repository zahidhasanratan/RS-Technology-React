@extends('layouts.app')

@section('title','All Sub Category')
@section('content')

    <div id="wrapper">

        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>All Sub Category</h2>
                        <a style="float:right" href="{{ route('subcategory.create') }}" class="btn btn-primary square-btn-adjust">Add Sub Category</a>
                    </div>
                </div>

                <hr />

                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            All Sub Category
                        </div>
                        <div class="panel-body">

                            @include('layouts.partial.msg')
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                    <tr>
                                        <th>SL.</th>
                                        <th>Title</th>
                                        <th>Image</th>
                                        <th>URL</th>
                                        <th>Parent Category Name</th>
                                        <th width="17%;">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($categories as $key => $category)
                                        <tr class="odd gradeX">
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $category->title }}</td>
                                            <td>
                                                <img src="{{ asset('uploads/scategory/'.$category->image) }}" class="img-thumbnail" width="100" height="100" />
                                            </td>
                                            <td class="center">{{ $category->slug ?? 'N/A' }}</td>
                                            <td class="center">{{ $category->parentCategory->name ?? 'N/A' }}</td>
                                            <td>
                                                <a href="{{ route('subcategory.edit', $category->id) }}" class="btn btn-info btn-sm">
                                                    <i class="fa fa-edit"></i> Edit
                                                </a>
                                                <form id="delete-form-{{ $category->id }}" action="{{ route('subcategory.destroy', $category->id) }}" style="display: none;" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                                <button type="submit" onclick="if(confirm('Are you sure? You want to delete this?')) {
                                                    event.preventDefault();
                                                    document.getElementById('delete-form-{{ $category->id }}').submit();
                                                    } else {
                                                    event.preventDefault();
                                                    }" class="btn btn-danger btn-sm">
                                                    <i class="fa fa-trash"></i> Delete
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>
        </div>
        <!-- /. PAGE INNER  -->
    </div>

@endsection
