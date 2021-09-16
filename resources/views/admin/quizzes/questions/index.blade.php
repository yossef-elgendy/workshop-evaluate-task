@extends('layouts.admin')

@section('content')

    <div class="card card-primary card-outline">
        <div class="card-header">
        <h5 class="m-0">Quiz Info</h5>
        </div>
        <div class="card-body">
        <h6 class="card-title"><b>Title:</b> {{$quiz->title}}</h6>

        <div class="card-text">
            <div class="row">
                <div class="col-8">
                    <b>Description:</b> {{$quiz->description}} <br/>
                    <b>Duration:</b>  {{$quiz->duration}} <br/>
                    <b>Level:</b> <span class="badge {{$quiz->level === 'hard'?'badge-danger':''}}
                            {{$quiz->level === 'medium'?'badge-warning':''}} {{$quiz->level === 'easy'?'badge-success':''}}">
                            {{$quiz->level}}
                        </span> <br/>
                    <b>Price:</b> ${{$quiz->price}}
                </div>
                <div class="col-4">
                    <img alt="Avatar" class="brand-image elevation-3 img-thumbnail" src="{{asset($quiz->photo->src)}}"/>
                </div>
            </div>

            </div>
        </div>
    </div>

    <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Questions:</h1>
        </div>
    </div>

    @forelse ( $questions as $question)
    <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">{{$question->question}}</h3>
        </div>
        <!-- /.card-header -->


        <div class="card-body">

            <div class="form-group">
            <label for="exampleInputPassword1">Choices</label>

                <div class="row">
                    @foreach ($question->choices as $choice )
                        <div class="col-3">

                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" id="customCheckbox2" disabled {{$choice->isRight?'checked':''}}>
                                <label for="customCheckbox2" class="custom-control-label">{{$choice->choice}}</label>
                            </div>
                        </div>
                    @endforeach


                </div>


            </div>

        </div>

    </div>
    @empty
    <div class="callout callout-info">
        <h5>No questions yet !</h5>

        <p>Go and add some questions</p>
        <a style="text-decoration: none;" class="btn btn-primary btn-sm text-light" href="/quizzes/{{$quiz->id}}/questions/create">
            <i class="fas fa-plus">
            </i>
            Create Questions
        </a>
    </div>
    @endforelse


@endsection



