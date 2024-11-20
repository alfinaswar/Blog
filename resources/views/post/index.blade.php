@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-end align-items-center mb-4 flex-wrap">
        <a href="{{ route('post.create') }}" class="btn btn-primary me-3 btn-sm"><i class="fas fa-plus me-2"></i>Buat
            Postingan</a>

    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Postingan Terbaru</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="display" width="100%">
                            <thead>
                                <tr>
                                    <th width="3%">#</th>
                                    <th width="40%">Judul</th>
                                    <th width="15%">Kategori</th>
                                    <th>Penulis</th>
                                    <th>Status</th>
                                    <th>Gambar</th>
                                    <th width="12%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $key => $item)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $item->Judul }}</td>
                                        <td>{{ $item->getkategori->Nama }}</td>

                                        <td>{{ $item->getPenulis->name }}</td>
                                        <td>
                                            @if ($item->Status == 'Terbit')
                                                <span class="badge light badge-success text-dark">
                                                    <i class="fa fa-circle text-success me-1"></i>
                                                    Telah Terbit
                                                </span>
                                            @elseif ($item->Status == 'Draft')
                                                <span class="badge light badge-warning text-dark">
                                                    <i class="fa fa-circle text-warning me-1"></i>
                                                    Draft
                                                </span>
                                            @else
                                                <span class="badge light badge-danger text-dark">
                                                    <i class="fa fa-circle text-danger me-1"></i>
                                                    Ditolak
                                                </span>
                                            @endif
                                        </td>
                                        <td><img src="{{ asset('storage/Gambar/' . $item->Gambar) }}"
                                                style="width: 150px; height: 150px; object-fit: cover;"></td>
                                        <td> <a href="{{ route('post.edit', $item->id) }}" class="btn btn-primary btn-sm"
                                                title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('post.destroy', $item->id) }}" method="POST"
                                                class="d-inline"
                                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus artikel ini?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    </div>
    </div>
    @if (session()->has('success'))
        <script>
            setTimeout(function() {
                swal.fire({
                    title: "{{ __('Success!') }}",
                    text: "{!! \Session::get('success') !!}",
                    icon: "success",
                    type: "success"
                });
            }, 1000);
        </script>
    @endif
    <script>
        @push('scripts')
            $(document).ready(function() {
                        $('body').on('click', '.btn-delete', function() {
                            var id = $(this).data('id');

                            Swal.fire({
                                title: 'Hapus Data',
                                text: "Anda Ingin Menghapus Data?",
                                icon: 'Peringatan',
                                showCancelButton: true,
                                confirmButtonText: 'Ya, Hapus'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    $.ajax({
                                        url: '{{ route('post.destroy', ':id') }}'.replace(
                                            ':id',
                                            id),
                                        type: 'DELETE',
                                        data: {
                                            _token: '{{ csrf_token() }}'
                                        },
                                        success: function(response) {
                                            Swal.fire(
                                                'Dihapus',
                                                'Data Berhasil Dihapus',
                                                'success'
                                            );

                                            $('#example').DataTable().ajax.reload();
                                        },
                                        error: function(xhr) {
                                            Swal.fire(
                                                'Failed!',
                                                'Error',
                                                'error'
                                            );
                                            console.log(xhr.responseText);
                                        }
                                    });
                                }
                            });
                        });
                    @endpush
    </script>
@endsection
