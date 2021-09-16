@extends('layouts.admin')

@section('content')

<div class="row justify-content-center">
    <div class="register-box">
        <div class="card card-outline card-primary">
            <div class="card-header h3 text-center">
                <b>Register</b> a new Student
            </div>
            <div class="card-body">
                <p class="login-box-msg">Fill out the info</p>

                <form action="{{route('students.store')}}" method="post">
                    @method('POST')
                    @csrf
                    <div class="input-group mb-3">
                        <input name="name" type="text" class="form-control" placeholder="Full name">
                        <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <input name="email" type="email" class="form-control" placeholder="Email">
                        <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                        </div>
                    </div>



                        <div class="input-group mb-3">
                            <label>Skills</label>
                            <select name="skills[]" class="select2 p-2 form-contorl" multiple="true" data-placeholder="Select a skil" style="width: 100%;" >
                                @foreach ($skills as $skill )
                                    <option value="{{$skill->id}}">{{$skill->skill}}</option>
                                @endforeach
                            </select>
                        </div>





                    <div class="input-group mb-3">


                        <input name="password" type="password" class="form-control " id="validationServerUsername" placeholder="Password" aria-describedby="inputGroupPrepend3" required>

                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <span class="fas fa-lock" id="inputGroupPrepend3"></span>
                            </div>
                        </div>

                        <div class="invalid-feedback">
                            @error('password')
                            {{$message }}
                            @enderror
                        </div>

                    </div>


                    <div class="input-group mb-3">


                        <input name="confirm" type="password" class="form-control " id="validationServerUsername" placeholder="Password" aria-describedby="inputGroupPrepend2" required>

                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <span class="fas fa-lock" id="inputGroupPrepend2"></span>
                            </div>
                        </div>

                        <div class="invalid-feedback">
                            @error('confirm')
                                {{$message }}
                            @enderror
                        </div>

                    </div>



                    <div class="row justify-content-center">

                        <div class="col-8">
                            <button type="submit" class="btn btn-primary btn-block">
                                Add A Student
                            </button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

            </div>
        <!-- /.form-box -->
        </div><!-- /.card -->
    </div>
    <!-- /.register-box -->
</div>


@endsection



