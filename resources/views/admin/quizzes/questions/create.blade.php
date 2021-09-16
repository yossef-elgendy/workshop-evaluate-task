@extends('layouts.admin')

@section('content')


<div class="row mb-2">
    <div class="col-sm-6">
      <h4>Quiz Title: {{$quiz->title}}</h1>
    </div>
</div>
@if ($errors->any())
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fas fa-ban"></i> Take Care Please!</h5>
        <ul class="list-group">
            @foreach ($errors->all() as $error )
                <li class="list-group-item">{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif

@if(session()->has('success'))
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fas fa-check"></i> Nice!</h5>
        A {{session()->get('success')}}
    </div>
@endif

<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Add a question</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->


    <form method="POST" action="/quizzes/{{$quiz->id}}/questions">
        @csrf
        @method('POST')
      <div class="card-body">
        <div class="form-group">
          <label for="exampleInputQuestion">Question</label>
          <input name="question" type="text" class="form-control" id="exampleInputQuestion" placeholder="Enter question">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Choices</label>

            <div class="row">
              <div class="col-3">

                    <div class="input-group">
                        <div class="input-group-prepend">
                        <span class="input-group-text">
                            <input name="isRight[0]" type="checkbox" value="1">
                        </span>
                        </div>
                        <input name="choice[0]" placeholder="Choice 1" type="text" class="form-control">
                    </div>

              </div>

                <div class="col-3">

                    <div class="input-group">
                        <div class="input-group-prepend">
                        <span class="input-group-text">
                            <input name="isRight[1]" type="checkbox" value="1">
                        </span>
                        </div>
                        <input name="choice[1]"  placeholder="Choice 2"  type="text" class="form-control">
                    </div>

                </div>

                <div class="col-3">

                    <div class="input-group">
                        <div class="input-group-prepend">
                        <span class="input-group-text">
                            <input name="isRight[2]" type="checkbox" value="1">
                        </span>
                        </div>
                        <input name="choice[2]"  placeholder="Choice 3"  type="text" class="form-control">
                    </div>

                </div>

                <div class="col-3">

                    <div class="input-group">
                        <div class="input-group-prepend">
                        <span class="input-group-text">
                            <input name="isRight[3]" type="checkbox" value="1">
                        </span>
                        </div>
                        <input name="choice[3]"  placeholder="Choice 4" type="text" class="form-control">
                    </div>

                </div>

            </div>


        </div>

      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Add Question</button>
      </div>
    </form>
  </div>

@endsection
