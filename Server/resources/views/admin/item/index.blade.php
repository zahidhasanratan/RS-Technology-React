@extends('layouts.app')

@section('title', 'All Product')

@section('content')
    <div id="wrapper">
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>All Products</h2>
                        <a href="{{ route('item.create') }}" class="btn btn-primary float-end square-btn-adjust" style="float:right;">Add Product</a>
                    </div>
                </div>

                <hr/>

                <div class="row">
                    <div class="col-md-12">
                        <!-- Advanced Tables -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Product List
                            </div>

                            <div class="panel-body">
                                @include('layouts.partial.msg')

                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Title</th>
                                            <th>Image</th>
                                            <th>Sub Category</th>
                                            <th width="17%">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($items as $key => $item)
                                            <tr class="odd gradeX">
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td>
                                                    @if($item->image && file_exists(public_path('uploads/item/' . $item->image)))
                                                        <img src="{{ asset('uploads/item/' . $item->image) }}" class="img-thumbnail" width="100" height="100" />
                                                    @else
                                                        <span class="text-muted">No Image</span>
                                                    @endif
                                                </td>
                                                <td>{{ $item->category->title ?? 'N/A' }}</td>

                                                <td>
                                                    <a href="{{ route('item.edit', $item->id) }}" class="btn btn-info btn-sm">
                                                        <i class="fa fa-edit"></i> Edit
                                                    </a>

                                                    <form id="delete-form-{{ $item->id }}" action="{{ route('item.destroy', $item->id) }}" method="POST" style="display: none;">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>

                                                    <button type="button"
                                                            onclick="if(confirm('Are you sure you want to delete this product?')) {
                                                                event.preventDefault();
                                                                document.getElementById('delete-form-{{ $item->id }}').submit();
                                                                } else {
                                                                event.preventDefault();
                                                                }"
                                                            class="btn btn-danger btn-sm">
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
                        <!-- End Advanced Tables -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
