@extends('layouts.app')

@section('title', 'Edit Product')

@section('content')
    <div id="page-wrapper">
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>Edit Product</h2>
                </div>
            </div>
            <hr/>

            <div class="row">
                <div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Edit Product
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    @include('layouts.partial.msg')

                                    <form method="POST" action="{{ route('item.update', $item->id) }}" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')

                                        <div class="form-group">
                                            <label>Name</label>
                                            <input class="form-control" name="name" value="{{ old('name', $item->name) }}" placeholder="Product Name" />
                                        </div>

                                        <div class="form-group">
                                            <label>Sub Title</label>
                                            <input class="form-control" name="sub_title" value="{{ old('sub_title', $item->sub_title) }}" placeholder="Sub Title" />
                                        </div>

                                        <div class="form-group">
                                            <label>Category</label>
                                            <select name="category" class="form-control">
                                                <option value="">Select Category</option>
                                                @foreach(\App\Models\SubCategory::all() as $category)
                                                    <option value="{{ $category->id }}" {{ $item->category_id == $category->id ? 'selected' : '' }}>
                                                        {{ $category->title }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea class="form-control ckeditor" name="description" placeholder="Description">{{ old('description', $item->description) }}</textarea>
                                        </div>

                                        <div class="form-group">
                                            <label>Title 1</label>
                                            <input class="form-control" name="title1" value="{{ old('title1', $item->title1) }}" placeholder="Title 1" />
                                        </div>
                                        <div class="form-group">
                                            <label>Details 1</label>
                                            <textarea class="form-control ckeditor" name="details1">{{ old('details1', $item->details1) }}</textarea>
                                        </div>

                                        <div class="form-group">
                                            <label>Title 2</label>
                                            <input class="form-control" name="title2" value="{{ old('title2', $item->title2) }}" placeholder="Title 2" />
                                        </div>
                                        <div class="form-group">
                                            <label>Details 2</label>
                                            <textarea class="form-control ckeditor" name="details2">{{ old('details2', $item->details2) }}</textarea>
                                        </div>

                                        <div class="form-group">
                                            <label>Title 3</label>
                                            <input class="form-control" name="title3" value="{{ old('title3', $item->title3) }}" placeholder="Title 3" />
                                        </div>
                                        <div class="form-group">
                                            <label>Details 3</label>
                                            <textarea class="form-control ckeditor" name="details3">{{ old('details3', $item->details3) }}</textarea>
                                        </div>

                                        <div class="form-group">
                                            <label>Title 4</label>
                                            <input class="form-control" name="title4" value="{{ old('title4', $item->title4) }}" placeholder="Title 4" />
                                        </div>
                                        <div class="form-group">
                                            <label>Details 4</label>
                                            <textarea class="form-control ckeditor" name="details4">{{ old('details4', $item->details4) }}</textarea>
                                        </div>

                                        <div class="form-group">
                                            <label>Image</label>
                                            <input type="file" name="image" />
                                            <br>
                                            @if($item->image)
                                                <img src="{{ asset('uploads/item/' . $item->image) }}" class="img-thumbnail" width="100" height="100" />
                                            @else
                                                <p>No image uploaded.</p>
                                            @endif
                                        </div>

                                        <a href="{{ route('item.index') }}" class="btn btn-danger">Back</a>
                                        <button type="submit" class="btn btn-primary">Update Product</button>
                                    </form>

                                    <br>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Form Elements -->
                </div>
            </div>
        </div>
    </div>
@endsection
