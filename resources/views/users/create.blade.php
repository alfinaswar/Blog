@extends('layouts.app')

@section('content')
    @if ($message = Session::get('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'success',
                text: '{{ $message }}',
            });
        </script>
    @endif

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    {!! Form::open(['route' => 'users.store', 'method' => 'POST', 'class' => 'profile-form']) !!}
    <div class="row">
        <div class="col-xl-10 col-lg-8">
            <div class="card card-bx m-b30">
                <div class="card-header">
                    <h6 class="title">Menajemen Pengguna</h6>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6 m-b30">
                            <label class="form-label">Name</label>
                            {!! Form::text('name', null, ['placeholder' => 'Nama', 'class' => 'form-control']) !!}
                        </div>
                        <div class="col-sm-6 m-b30">
                            <label class="form-label">Email</label>
                            {!! Form::text('email', null, ['placeholder' => 'Email', 'class' => 'form-control']) !!}
                        </div>
                        <div class="col-sm-6 m-b30">
                            <label class="form-label">Role</label>
                            {!! Form::select('roles[]', $roles, [], ['class' => 'form-control', 'multiple']) !!}
                        </div>
                        <div class="col-sm-6 m-b30">
                            <label class="form-label">Password</label>
                            {!! Form::password('password', ['placeholder' => 'Password', 'class' => 'form-control']) !!}
                        </div>
                        <div class="col-sm-6 m-b30">
                            <label class="form-label">Confirm Password</label>
                            {!! Form::password('confirm-password', ['placeholder' => 'Confirm Password', 'class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>

    </div>
@endsection
