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

    <form action="{{ route('kategori.update', $Kategori->id) }}" method="POST" class="profile-form">
        @csrf
        @method('PATCH')
        <div class="row">
            <div class="col-xl-10 col-lg-8">
                <div class="card card-bx m-b30">
                    <div class="card-header">
                        <h6 class="title">Edit Kategori</h6>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6 m-b30">
                                <label class="form-label">Nama</label>
                                <input type="text" name="Nama" placeholder="Nama" class="form-control"
                                    value="{{ old('Nama', $Kategori->Nama) }}">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
