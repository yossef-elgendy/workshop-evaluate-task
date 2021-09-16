@extends('layouts.admin')

@section('content')
   <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Create Category</h1>

                </div><!-- /.row -->
            </div>
        </div><!-- /.container-fluid -->
    </div>
  <!-- /.content-header -->
  <div class="card">
    <div class="card-header bg-info">
      <h3 class="card-title ">Categories</h3>

      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
          <i class="fas fa-minus"></i>
        </button>
        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
          <i class="fas fa-times"></i>
        </button>
      </div>
    </div>
    <div class="card-body">
        <div class="row mb-2 p-2">
    @forelse ( $categories as $category )

        <div class="col-sm-4 col-md-2">
            <div class=" bg-black disabled color-palette p-2 rounded"><span>{{$category->name}}</span></div>
        </div>

    @empty

          Start creating your amazing Categories!
    @endforelse
        </div>
    </div>
<!-- /.card-body -->
</div>

     <!-- Horizontal Form -->
     <div class="card card-info">
        <div class="card-header">
          <h3 class="card-title">Create Categories</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="POST" class="form-horizontal" action="{{route('categoreis.store')}}">
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
              <label for="inputCategory" class="col-sm-2 col-form-label">Category</label>
              <div class="col-sm-10">
                <input name="name" type="text" class="form-control" id="inputCategory" placeholder="Category">
              </div>
            </div>

            <div class="form-group row">
                <label for="exampleSelectBorder" class="col-sm-2 col-form-label">Parent Category</label>
                <div class="col-sm-10">
                    <select name="parent_id" class="custom-select form-control-border" id="exampleSelectBorder">
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
