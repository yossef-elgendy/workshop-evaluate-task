@extends('layouts.admin')

@section('content')
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Skills</h1>

            </div><!-- /.row -->
        </div>
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<div class="card">
    <div class="card-header bg-info">
      <h3 class="card-title ">Skills</h3>

      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
          <i class="fas fa-minus"></i>
        </button>

      </div>
    </div>
    <div class="card-body">
        <div class="row">
            @forelse ( $skills as $skill)


                <div class="col-sm-4 col-md-2 mb-2 ">
                    <div class="color-palette-set">
                    <div class="bg-black color-palette p-2 rounded">
                        <span>{{$skill->skill}}</span>
                    </div>


                    <div class="bg-black mt-1 disabled color-palette p-2 rounded">
                        <span>Category: {{$skill->category->name}}</span>
                    </div>


                    </div>
                </div>


            @empty

                Start creating amazing Skills!

            @endforelse
        </div>
    </div>
<!-- /.card-body -->
</div>
@endsection
