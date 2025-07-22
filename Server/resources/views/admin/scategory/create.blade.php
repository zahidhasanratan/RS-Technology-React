@extends('layouts.app')

@section('title', 'Add Sub Category')

@section('content')
    <div id="page-wrapper">
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>Add Sub Category</h2>
                </div>
            </div>
            <hr />

            <div class="row">
                <div class="col-md-12">
                    <!-- Form Panel -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Add Sub Category
                        </div>

                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    @include('layouts.partial.msg')

                                    <form method="POST" action="{{ route('subcategory.store') }}" enctype="multipart/form-data">
                                        @csrf

                                        <div class="form-group">
                                            <label for="name">Name <span class="text-danger">*</span></label>
                                            <input type="text" id="name" name="name" class="form-control" placeholder="Enter Sub Category Name" value="{{ old('name') }}">
                                            @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="parent_category_id">Parent Category <span class="text-danger">*</span></label>
                                            <select id="parent_category_id" name="parent_category_id" class="form-control">
                                                <option value="">-- Select Parent Category --</option>
                                                @foreach(\App\Models\ParentCategory::all() as $pCat)
                                                    <option value="{{ $pCat->id }}" {{ old('parent_category_id') == $pCat->id ? 'selected' : '' }}>
                                                        {{ $pCat->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('parent_category_id')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="image">Sub Category Photo</label>
                                            <input type="file" id="image" name="image" class="form-control-file">
                                            @error('image')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <a href="{{ route('subcategory.index') }}" class="btn btn-danger">Back</a>
                                        <button type="submit" class="btn btn-primary">Submit</button>
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
