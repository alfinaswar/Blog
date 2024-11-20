@extends('layouts.app')
@section('content')
    <div class="col-xl-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Buat Postingan / Berita</h4>
            </div>
            <div class="card-body">
                <div class="basic-form">
                    <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="mb-3 col-md-12">
                                <label class="form-label">Judul</label>
                                <input type="text" name="Judul" class="form-control" placeholder="Ketik Judul"
                                    required>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Kategori</label>
                                <select name="Kategori" id="" class="form-control">
                                    <option value="">Pilih Kategori</option>
                                    @foreach ($kategori as $item)
                                        <option value="{{ $item->KategoriID }}">{{ $item->Nama }}</option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Status Postingan / Berita</label>
                                <select name="Status" id="" class="form-control">
                                    <option value="">Pilih Status</option>
                                    <option value="Draft">Draft</option>
                                    <option value="Terbit">Terbitkan Artikel</option>
                                </select>
                            </div>
                            <div class="mb-3 col-md-12">
                                <label class="form-label">Konten</label>
                                <textarea name="Isi" class="form-control" id="myTextarea"></textarea>
                            </div>
                            <div class="mb-3 col-md-12">
                                <label class="form-label">Gambar</label>
                                <input type="file" name="Gambar" id="NamaFile" class="form-control">
                            </div>

                        </div>
                        <button type="submit" class="btn btn-md btn-primary btn-block">Simpan</button>
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
