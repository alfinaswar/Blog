@extends('layouts.app')

@section('content')
    @if ($message = Session::get('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: '{{ $message }}',
            });
        </script>
    @endif
    <div class="nk-block nk-block-lg">
        <div class="nk-block-head">
            <div class="nk-block-head-content mb-3">
                <div class="text-end">
                    <a href="{{ route('kategori.create') }}" class="btn btn-primary btn-sm">Tambah Kategori</a>
                </div>
            </div>
        </div>
        <div class="card card-bordered card-preview">
            <div class="card-body">
                <table id="example" data-export-title="Export">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kategori</th>
                            <th width="280px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kategori as $key => $data)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $data->Nama }}</td>
                                <td>
                                    <a class="btn btn-primary btn-sm"
                                        href="{{ route('kategori.edit', $data->id) }}">Edit</a>
                                    <form action="{{ route('kategori.destroy', $data->id) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div><!-- .card-preview -->
    </div> <!-- nk-block -->
@endsection
