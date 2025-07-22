@extends('layouts.app')

@section('title', 'Edit Sub Category')

@section('content')
    <div id="page-wrapper">
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>Edit Sub Category</h2>
                </div>
            </div>
            <hr/>

            <div class="row">
                <div class="col-md-12">
                    <!-- Form Panel -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Edit Sub Category
                        </div>

                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    @include('layouts.partial.msg')

                                    <form method="POST" action="{{ route('subcategory.update', $scategory->id) }}" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')

                                        <div class="form-group">
                                            <label for="name">Title <span class="text-danger">*</span></label>
                                            <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $scategory->title) }}" placeholder="Enter Sub Category Name">
                                            @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="parent_category_id">Parent Category <span class="text-danger">*</span></label>
                                            <select id="parent_category_id" name="parent_category_id" class="form-control">
                                                <option value="">-- Select Parent Category --</option>
                                                @foreach(\App\Models\ParentCategory::all() as $pCat)
                                                    <option value="{{ $pCat->id }}" {{ $scategory->parent_category_id == $pCat->id ? 'selected' : '' }}>
                                                        {{ $pCat->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('parent_category_id')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="image">Image</label>
                                            <input type="file" id="image" name="image" class="form-control-file">
                                            @if ($scategory->image)
                                                <br>
                                                <img src="{{ asset('uploads/scategory/' . $scategory->image) }}" class="img-thumbnail" width="100" height="100" alt="Sub Category Image">
                                            @endif
                                        </div>

                                        <a href="{{ route('subcategory.index') }}" class="btn btn-danger">Back</a>
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </form>

                                    <br>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Form Panel -->
                </div>
            </div>
        </div>
    </div>
@endsection
