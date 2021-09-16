@extends('layouts.admin')

@section('content')

<div class="row mb-2">
    <div class="col-sm-6">
      <h1>Projects</h1>
    </div>
</div>

<section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-header bg-primary">
        <h3 class="card-title">Students</h3>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
          </button>
        </div>
      </div>
      <div class="card-body p-0">
        <table class="table table-striped projects">
            <thead>
                <tr >
                    <th style="width: 1%">
                        #
                    </th>
                    <th style="width: 20%">
                        Quiz Title
                    </th>
                    <th style="width: 30%">
                        Photo
                    </th>
                    <th>
                        Duration
                    </th>
                    <th style="width: 8%" class="text-center">
                        Level
                    </th>
                    <th style="width: 20%">
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($quizzes  as $quiz )
                <tr>
                    <td>
                        #
                    </td>
                    <td>
                        <a>
                            {{$quiz->title}}
                        </a>
                        <br/>
                        <small>
                            {{$quiz->created_at}}
                        </small>
                    </td>
                    <td>
                        <ul class="list-group">
                            <li class="list-inline-item">
                                <img alt="Avatar" class="brand-image elevation-3 img-thumbnail" src="{{asset($quiz->photo->src)}}"/>
                            </li>
                        </ul>
                    </td>
                    <td class="project_progress">
                        {{$quiz->duration}} | mins
                    </td>
                    <td class="project-state">
                        <span class="badge {{$quiz->level === 'hard'?'badge-danger':''}}
                            {{$quiz->level === 'medium'?'badge-warning':''}} {{$quiz->level === 'easy'?'badge-success':''}}">
                            {{$quiz->level}}
                        </span>
                    </td>
                    <td class="project-actions text-center">
                        <a class="btn btn-success btn-sm" href="/quizzes/{{$quiz->id}}/questions/create">
                            <i class="fas fa-plus">
                            </i>
                            Add Questions
                        </a>
                        <a class="btn btn-primary btn-sm mt-2" href="/quizzes/{{$quiz->id}}">
                            <i class="fas fa-eye">
                            </i>
                            View Quiz
                        </a>


                    </td>
                </tr>
                @empty

                @endforelse


            </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->

  </section>
@endsection



