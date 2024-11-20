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

                                        <td> <span
                                                class="badge
        @if (auth()->user()->id == '1') bg-success
        @else
            bg-warning @endif">
                                                {{ $item->getPenulis->name }}
                                            </span></td>
                                        <td>
                                            <form action="{{ route('updateStatus', $item->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <select name="Status" class="default-select wide form-control"
                                                    onchange="this.form.submit()">
                                                    <option value="Terbit"
                                                        {{ $item->Status == 'Terbit' ? 'selected' : '' }}>Terbitkan</option>
                                                    <option value="Draft" {{ $item->Status == 'Draft' ? 'selected' : '' }}>
                                                        Draft</option>
                                                </select>
                                            </form>
                                        </td>
                                        <td><img src="{{ asset('storage/Gambar/' . $item->Gambar) }}"
                                                style="width: 150px; height: 150px; object-fit: cover;"></td>
                                        <td> <a href="{{ route('post.edit', $item->id) }}" class="btn btn-primary btn-sm"
                                                title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <button type="button" class="btn btn-danger btn-sm btn-delete"
                                                data-id="{{ $item->id }}" data-title="{{ $item->Judul }}">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                            <button type="button" class="btn btn-warning btn-sm btn-feature"
                                                data-id="{{ $item->id }}" data-title="{{ $item->Judul }}">
                                                <i class="fas fa-star"></i>
                                            </button>
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
@endsection
@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Event listener untuk tombol "Pilih Artikel Editor"
            document.querySelectorAll('.btn-feature').forEach(button => {
                button.addEventListener('click', function() {
                    const postId = this.dataset.id;
                    const postTitle = this.dataset.title;
                    Swal.fire({
                        title: `Jadikan "${postTitle}" sebagai Artikel Editor?`,
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Ya, pilih!',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            fetch(`/update-tipe/${postId}`, {
                                    method: 'PUT',
                                    headers: {
                                        'X-CSRF-TOKEN': document
                                            .querySelector(
                                                'meta[name="csrf-token"]')
                                            .getAttribute('content'),
                                        'Content-Type': 'application/json'
                                    },
                                    body: JSON.stringify({
                                        tipe: 'PilihanEditor'
                                    })
                                })
                                .then(response => response.json())
                                .then(data => {
                                    if (data.success) {
                                        Swal.fire(
                                            'Berhasil!',
                                            `Artikel "${postTitle}" telah dijadikan Artikel Editor.`,
                                            'success'
                                        );
                                        setTimeout(() => {
                                            location.reload();
                                        }, 1200);
                                    } else {
                                        Swal.fire(
                                            'Gagal!',
                                            'Terjadi kesalahan saat memperbarui data.',
                                            'error'
                                        );
                                    }
                                })
                                .catch(error => {
                                    Swal.fire(
                                        'Gagal!',
                                        'Tidak dapat terhubung ke server.',
                                        'error'
                                    );
                                });
                        }
                    });
                });
            });
        });
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('.btn-delete').on('click', function() {
                let id = $(this).data('id');
                let title = $(this).data('title');
                let deleteButton = $(this);

                Swal.fire({
                    title: 'Apakah anda yakin?',
                    text: `Akan menghapus postingan "${title}"?`,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal',
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Show loading state
                        Swal.fire({
                            title: 'Menghapus...',
                            html: 'Mohon tunggu sebentar',
                            allowOutsideClick: false,
                            didOpen: () => {
                                Swal.showLoading();
                            }
                        });

                        // Send delete request
                        $.ajax({
                            url: `/post/${id}`,
                            type: 'DELETE',
                            success: function(response) {
                                // Remove the table row with animation
                                deleteButton.closest('tr').fadeOut(function() {
                                    $(this).remove();

                                    // Check if table is empty
                                    if ($('table tbody tr').length === 0) {
                                        $('table tbody').append(
                                            '<tr><td colspan="6" class="text-center">Tidak ada data</td></tr>'
                                        );
                                    }
                                });

                                // Show success message
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Berhasil!',
                                    text: 'Postingan berhasil dihapus',
                                    timer: 1500,
                                    showConfirmButton: false
                                });
                            },
                            error: function(xhr) {
                                // Show error message
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: xhr.responseJSON?.message ||
                                        'Terjadi kesalahan saat menghapus postingan'
                                });
                            }
                        });
                    }
                });
            });

        });
    </script>
@endpush
