@extends('layouts.admin')

@section('content')

<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Add Quiz</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form enctype="multipart/form-data" method="POST" action="{{route('quizzes.store')}}">
        @csrf
        @method('POST')
        <div class="card-body">
            <div class="form-group">
                <label for="Title">Title</label>
                <input name="title" type="text" class="form-control" id="Title" placeholder="Enter Title">
                <small class="invalid-feedback d-block">
                    @error('title')
                        {{$message}}

                    @enderror
                </small>
            </div>
            <div class="form-group">
                <label for="Duration">Duration</label>
                <input name="duration" type="number" class="form-control" id="Duration" placeholder="Duration">
                <small class="invalid-feedback d-block">
                    @error('duration')
                    {{$message}}

                    @enderror
                </small>
            </div>

            <div class="form-group">
                <label>Category</label>
                <select name="category_id" class="form-control">
                    <option selected hidden disabled>Select Category..</option>
                    @foreach ($categories as $category )
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach

                </select>
                <small class="invalid-feedback d-block">
                    @error('category_id')
                    {{$message}}

                    @enderror
                </small>
            </div>

            <div class="form-group">
                <label>Description</label>
                <textarea name="description" class="form-control" rows="3" placeholder="Enter ..."></textarea>
            </div>


            <div class="form-group">
                <label>Level</label>
                <select name="level" class="form-control">
                    <option selected hidden disabled>Select Level..</option>
                    <option value="hard">Hard</option>
                    <option value="medium">Medium</option>
                    <option value="easy">Easy</option>
                </select>
                <small class="invalid-feedback d-block">
                    @error('level')
                        {{$message}}

                    @enderror
                </small>
            </div>

            <div class="form-group">
                <label for="Price">Price</label>
                <input name="price" type="text" class="form-control" id="Price" placeholder="Enter Price">
                <small class="invalid-feedback d-block">
                    @error('price')
                        {{$message}}

                    @enderror
                </small>
            </div>


            <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input name="photo" type="file" class="custom-file-input" id="File">
                            <label class="custom-file-label" id="FilePath" for="File">Choose file</label>
                        </div>
                        <div class="input-group-append">
                            <span class="input-group-text">Upload</span>
                        </div>
                    </div>
                    <small class="invalid-feedback d-block">
                        @error('photo')
                            {{$message}}

                        @enderror
                    </small>
            </div>

            </div>
            <div class="form-group ">
                <div class="row justify-content-center">

                    <button type="submit" class="col-6 btn btn-primary">Submit</button>
                </div>

            </div>

        </div>
        <!-- /.card-body -->

    </form>
  </div>
  <!-- /.card -->

@endsection

