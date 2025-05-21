@extends('layouts.app')

@section('title','Edit Projects')
@section('content')

    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>Edit Projects</h2>

                </div>
            </div>
            <!-- /. ROW  -->
            <hr />
            <div class="row">
                <div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Add Projects
                        </div>
                        <div class="panel-body">
                            <div class="row">

                                <div class="col-md-12">
                                    @include('layouts.partial.msg')

                                    <form role="form" method="post" action="{{ route('activity.update',$activity->id) }}" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input class="form-control" name="title" value="{{ $activity->title }}" placeholder="Name" />

                                        </div>

                                        <div class="form-group">
                                            <label>Category</label>
                                            <select class="form-control" name="sub_title">
                                                <option value="">Select</option>
                                                <option value="Completed" {{ $activity->sub_title == 'Completed' ? 'selected' : '' }}>Completed</option>
                                                <option value="Upcomming" {{ $activity->sub_title == 'Upcomming' ? 'selected' : '' }}>Upcoming</option>
                                                <option value="Running" {{ $activity->sub_title == 'Upcomming' ? 'selected' : '' }}>Upcoming</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Short</label>
                                            <textarea class="form-control" name="short" rows="3">{{ $activity->short }}</textarea>
                                        </div>

                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea class="form-control ckeditor" name="description" rows="3">{{ $activity->description }}</textarea>
                                        </div>
                                        <!-- Key Features -->
                                        <div class="form-group">
                                            <label>Key Features</label>
                                            <div id="keyFeaturesWrapper">
                                                @php
                                                    $features = json_decode($activity->features, true) ?? [];
                                                @endphp
                                                @foreach($features as $feature)
                                                    <div class="input-group mb-2">
                                                        <input type="text" name="features[]" class="form-control" value="{{ $feature }}" placeholder="Enter feature">
                                                        <button type="button" class="btn btn-danger btn-sm remove-feature">−</button>
                                                    </div>
                                                @endforeach
                                                <div class="input-group mb-2">
                                                    <input type="text" name="features[]" class="form-control" placeholder="Enter feature">
                                                    <button type="button" class="btn btn-success btn-sm add-feature">+</button>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Technologies Used -->
                                        <div class="form-group">
                                            <label>Technologies Used</label>
                                            <div id="techWrapper">
                                                @php
                                                    $technologies = json_decode($activity->technologies, true) ?? [];
                                                @endphp
                                                @foreach($technologies as $tech)
                                                    <div class="input-group mb-2">
                                                        <input type="text" name="technologies[]" class="form-control" value="{{ $tech }}" placeholder="Enter technology">
                                                        <button type="button" class="btn btn-danger btn-sm remove-tech">−</button>
                                                    </div>
                                                @endforeach
                                                <div class="input-group mb-2">
                                                    <input type="text" name="technologies[]" class="form-control" placeholder="Enter technology">
                                                    <button type="button" class="btn btn-success btn-sm add-tech">+</button>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>Image (Height:400px X Width:800px)</label>
                                            <input type="file" name="image"/></br>
                                            <img src="{{ asset('uploads/activity/'.$activity->image) }}" class="img-thumbnail" width="100" height="100" />
                                        </div>



                                        <a href="{{ route('activity.index') }}" class="btn btn-danger">Back</a>
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
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                // Add new feature field
                document.querySelector('.add-feature').addEventListener('click', function () {
                    const newField = document.createElement('div');
                    newField.classList.add('input-group', 'mb-2');
                    newField.innerHTML = `
                <input type="text" name="features[]" class="form-control" placeholder="Enter feature">
                <button type="button" class="btn btn-danger btn-sm remove-feature">−</button>
            `;
                    document.getElementById('keyFeaturesWrapper').appendChild(newField);
                });

                // Add new technology field
                document.querySelector('.add-tech').addEventListener('click', function () {
                    const newField = document.createElement('div');
                    newField.classList.add('input-group', 'mb-2');
                    newField.innerHTML = `
                <input type="text" name="technologies[]" class="form-control" placeholder="Enter technology">
                <button type="button" class="btn btn-danger btn-sm remove-tech">−</button>
            `;
                    document.getElementById('techWrapper').appendChild(newField);
                });

                // Remove dynamically added fields
                document.addEventListener('click', function (e) {
                    if (e.target.classList.contains('remove-feature')) {
                        e.target.parentElement.remove();
                    }
                    if (e.target.classList.contains('remove-tech')) {
                        e.target.parentElement.remove();
                    }
                });
            });
        </script>

@endsection
