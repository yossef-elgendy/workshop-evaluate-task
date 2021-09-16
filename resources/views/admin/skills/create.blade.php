@extends('layouts.admin')

@section('content')
   <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Create Skills</h1>

                </div><!-- /.row -->
            </div>
        </div><!-- /.container-fluid -->
    </div>
  <!-- /.content-header -->


     <!-- Horizontal Form -->
     <div class="card card-info">
        <div class="card-header">
          <h3 class="card-title">Create Skills</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="POST" class="form-horizontal" action="{{route('skills.store')}}">
            @method('POST')
            @csrf
            @if ($errors->any())
                <div class="alert alert-danger m-2">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
          <div class="card-body">

            <div class="form-group row">
              <label for="inputSkill" class="col-sm-2 col-form-label">Skill</label>
              <div class="col-sm-10">
                <input name="skill" type="text" class="form-control" id="inputSkill" placeholder="Skill">
              </div>
            </div>

            <div class="form-group row">
                <label for="exampleSelectBorder" class="col-sm-2 col-form-label">Category</label>
                <div class="col-sm-10">
                    <select name="category_id" class="custom-select form-control-border" id="exampleSelectBorder">
                        <option selected hidden disabled>Choose...</option>
                        @forelse ( $categories as $category )
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @empty
                            <option disabled>There is no options yet !!</option>
                        @endforelse
                    </select>
                </div>
            </div>

          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <button type="submit" class="btn btn-info">Create</button>
          </div>
          <!-- /.card-footer -->
        </form>
      </div>
      <!-- /.card -->

@endsection
