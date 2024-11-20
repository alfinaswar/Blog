@extends('layouts.app')
@section('content')
    <div class="col-xl-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">{{ isset($post) ? 'Edit' : 'Buat' }} Postingan / Berita</h4>
            </div>
            <div class="card-body">
                <div class="basic-form">
                    <form action="{{ isset($post) ? route('post.update', $post->id) : route('post.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @if (isset($post))
                            @method('PUT')
                        @endif

                        <div class="row">
                            <div class="mb-3 col-md-12">
                                <label class="form-label">Judul</label>
                                <input type="text" name="Judul"
                                    class="form-control @error('Judul') is-invalid @enderror" placeholder="Ketik Judul"
                                    value="{{ old('Judul', $post->Judul ?? '') }}" required>
                                @error('Judul')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-6">
                                <label class="form-label">Kategori</label>
                                <select name="Kategori" class="form-control @error('Kategori') is-invalid @enderror">
                                    <option value="">Pilih Kategori</option>
                                    @foreach ($kategori as $item)
                                        <option value="{{ $item->KategoriID }}"
                                            {{ old('Kategori', $post->Kategori ?? '') == $item->KategoriID ? 'selected' : '' }}>
                                            {{ $item->Nama }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('Kategori')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-6">
                                <label class="form-label">Status Postingan / Berita</label>
                                <select name="Status" class="form-control @error('Status') is-invalid @enderror">
                                    <option value="">Pilih Status</option>
                                    <option value="Draft"
                                        {{ old('Status', $post->Status ?? '') == 'Draft' ? 'selected' : '' }}>
                                        Draft
                                    </option>
                                    <option value="Terbit"
                                        {{ old('Status', $post->Status ?? '') == 'Terbit' ? 'selected' : '' }}>
                                        Terbitkan Artikel
                                    </option>
                                </select>
                                @error('Status')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-12">
                                <label class="form-label">Konten</label>
                                <textarea name="Isi" class="form-control @error('Isi') is-invalid @enderror" id="myTextarea">{{ old('Isi', $post->Isi ?? '') }}</textarea>
                                @error('Isi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-12">
                                <label class="form-label">Gambar</label>
                                <input type="file" name="Gambar" id="NamaFile"
                                    class="form-control @error('Gambar') is-invalid @enderror">
                                @error('Gambar')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror

                                @if (isset($post) && $post->Gambar)
                                    <div class="mt-2">
                                        <img src="{{ asset('storage/Gambar/' . $post->Gambar) }}" alt="Current Image"
                                            class="img-thumbnail" style="max-width: 200px">
                                        <p class="text-muted mt-1">Current image. Upload new one to replace.</p>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">
                            {{ isset($post) ? 'Update' : 'Simpan' }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        tinymce.init({
            selector: '#myTextarea',
            plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak code emoticons',
            toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | emoticons | code | preview',
            menubar: false,
            toolbar_location: 'top',
            toolbar_align: 'left',
            height: 300,
            content_css: 'https://www.tiny.cloud/css/codepen.min.css',
            image_advtab: true,
            file_picker_callback: function(callback, value, meta) {
                if (meta.filetype === 'image') {
                    var input = document.createElement('input');
                    input.setAttribute('type', 'file');
                    input.setAttribute('accept', 'image/*');
                    input.onchange = function() {
                        var file = this.files[0];
                        var reader = new FileReader();
                        reader.onload = function() {
                            callback(reader.result, {
                                alt: file.name
                            });
                        };
                        reader.readAsDataURL(file);
                    };
                    input.click();
                }
            },
            setup: function(editor) {
                editor.on('change', function() {
                    editor.save();
                });
            }
        });
    </script>
@endpush
