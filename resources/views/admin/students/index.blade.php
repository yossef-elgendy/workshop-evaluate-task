@extends('layouts.admin')

@section('content')

<div class="row mb-2">
    <div class="col-sm-6">
    <h1>Students</h1>
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
                <tr>
                    <th style="width: 1%">
                        #
                    </th>
                    <th style="width: 20%">
                        Student Name
                    </th>
                    <th style="width: 30%">
                        Skills
                    </th>
                    <th>
                        Email
                    </th>
                    <th style="width: 8%" class="text-center">
                        Status
                    </th>
                    <th style="width: 20%">
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($students  as $student )
                <tr>
                    <td>
                        #
                    </td>
                    <td>
                        <a>
                            {{$student->name}}
                        </a>
                        <br/>
                        <small>
                            {{$student->created_at}}
                        </small>
                    </td>
                    <td>
                        <ul class="list-group">
                            @forelse ($student->skills as $skill )
                                <li class="list-inline-item">
                                    {{$skill->skill}}
                                </li>
                            @empty
                                <li class="list-inline-item">
                                    No Skills
                                </li>
                            @endforelse

                        </ul>
                    </td>
                    <td class="project_progress">
                        {{$student->email}}
                    </td>
                    <td class="project-state">
                        <span class="badge {{$student->isAdmin === 1?'badge-warning':'badge-success'}}">
                            {{$student->isAdmin === 1? 'Admin':'Student'}}
                        </span>
                    </td>
                    <td class="project-actions text-right">
                        <a class="btn btn-primary btn-sm" href="#">
                            <i class="fas fa-folder">
                            </i>
                            View
                        </a>
                        <a class="btn btn-info btn-sm" href="#">
                            <i class="fas fa-pencil-alt">
                            </i>
                            Edit
                        </a>
                        <a class="btn btn-danger btn-sm" href="#">
                            <i class="fas fa-trash">
                            </i>
                            Delete
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
