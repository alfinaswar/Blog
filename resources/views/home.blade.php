@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row separate-row">
                                    <div class="col-sm-6">
                                        <div class="job-icon pb-4 d-flex justify-content-between">
                                            <div>
                                                <div class="d-flex align-items-center mb-1">
                                                    <h2 class="mb-0 lh-1">{{ $TotalPost }} Berita / Postingan</h2>

                                                </div>
                                                <span class="fs-14 d-block mb-2">Total Berita / Postingan</span>
                                            </div>
                                            <div id="NewCustomers"></div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="job-icon pb-4 pt-4 pt-sm-0 d-flex justify-content-between">
                                            <div>
                                                <div class="d-flex align-items-center mb-1">
                                                    <h2 class="mb-0 lh-1">{{ $PostFromUser }} Postingan Tamu</h2>
                                                </div>
                                                <span class="fs-14 d-block mb-2">Artikel atau Berita ditulis Oleh
                                                    Tamu</span>
                                            </div>
                                            <div id="NewCustomers1"></div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="job-icon pt-4 pb-sm-0 pb-4 pe-3 d-flex justify-content-between">
                                            <div>
                                                <div class="d-flex align-items-center mb-1">
                                                    <h2 class="mb-0 lh-1">{{ $TotalKategori }} Kategori</h2>

                                                </div>
                                                <span class="fs-14 d-block mb-2">Jumlah Kategori Berita di Website
                                                    Ini</span>
                                            </div>
                                            <div id="NewCustomers2"></div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="job-icon pt-4  d-flex justify-content-between">
                                            <div>
                                                <div class="d-flex align-items-center mb-1">
                                                    <h2 class="mb-0 lh-1">{{ $TotalUser }} Jumlah Pengguna</h2>
                                                </div>
                                                <span class="fs-14 d-block mb-2">Jumlah Pengguna Website</span>
                                            </div>
                                            <div id="NewCustomers3"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="card " id="user-activity">
                            <div class="card-header border-0 pb-0 flex-wrap">
                                <h4 class="fs-20 mb-0">Pilihan Editor</h4>
                            </div>
                            <div class="card-body">
                                <div class="card-body px-0">
                                    <div id="DZ_W_Todo1" class="widget-media dlab-scroll height370 px-4">
                                        <ul class="timeline">
                                            @foreach ($Editor as $item)
                                                <li>
                                                    <div class="timeline-panel">
                                                        <div class="media me-2 media-info">
                                                            <img src="{{ asset('storage/Gambar/' . $item->Gambar) }}">
                                                        </div>
                                                        <div class="media-body">
                                                            <h5 class="mb-1">{{ $item->Judul }}</h5>
                                                            <small class="d-block">Dipublikasikan Pada
                                                                {{ $item->created_at->format('d F Y') }}</small>
                                                        </div>
                                                        <div class="dropdown">
                                                            <a class="btn btn-info light sharp"
                                                                href="{{ route('post.show', $item->id) }}" target="_blank">
                                                                <i class="fas fa-external-link-alt"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-xl-6">
                        <div class="card " id="user-activity">
                            <div class="card-header border-0 pb-0 flex-wrap">
                                <h4 class="fs-20 mb-0">Berita Populer</h4>
                            </div>
                            <div class="card-body px-0">
                                <div id="DZ_W_Todo1" class="widget-media dlab-scroll height370 px-4">
                                    <ul class="timeline">
                                        @foreach ($Editor as $item)
                                            <li>
                                                <div class="timeline-panel">
                                                    <div class="media me-2 media-info">
                                                        <img src="{{ asset('storage/Gambar/' . $item->Gambar) }}">
                                                    </div>
                                                    <div class="media-body">
                                                        <h5 class="mb-1">{{ $item->Judul }}</h5>
                                                        <small class="d-block">Dipublikasikan Pada
                                                            {{ $item->created_at->format('d F Y') }}</small>
                                                    </div>
                                                    <div class="dropdown">
                                                        <a class="btn btn-info light sharp"
                                                            href="{{ route('post.show', $item->id) }}" target="_blank">
                                                            <i class="fas fa-external-link-alt"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12">
                        <div class="card " id="user-activity">
                            <div class="card-header border-0 pb-0 flex-wrap">
                                <h4 class="fs-20 mb-0">Berita Terkini</h4>
                            </div>
                            <div class="card-body">

                                <div class="card-body px-0">
                                    <div id="DZ_W_Todo1" class="widget-media dlab-scroll height370 px-4">
                                        <ul class="timeline">
                                            @foreach ($Recent as $item)
                                                <li>
                                                    <div class="timeline-panel">
                                                        <div class="media me-2 media-info">
                                                            <img src="{{ asset('storage/Gambar/' . $item->Gambar) }}">
                                                        </div>
                                                        <div class="media-body">
                                                            <h5 class="mb-1">{{ $item->Judul }}</h5>
                                                            <small class="d-block">Dipublikasikan Pada
                                                                {{ $item->created_at->format('d F Y') }}</small>
                                                        </div>
                                                        <div class="dropdown">
                                                            <a class="btn btn-info light sharp"
                                                                href="{{ route('post.show', $item->id) }}" target="_blank">
                                                                <i class="fas fa-external-link-alt"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </li>
                                            @endforeach


                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>
@endsection
