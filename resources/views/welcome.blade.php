@extends('layouts.app-beranda')
@section('content')
    <div class="row">
        <div class="col-lg-8">
            <!-- Trending Top -->
            <div class="trending-top mb-30">
                <div class="trend-top-img">
                    <img src="{{ asset('storage/Gambar/' . $latestartikel->Gambar) }}" alt="">
                    <div class="trend-top-cap">
                        <span>{{ $latestartikel->getKategori->Nama }}</span>
                        <h2><a href="{{ route('home.BeritaShow', $latestartikel->id) }}">{{ $latestartikel->Judul }}</a></h2>
                    </div>
                </div>
            </div>
            <!-- Trending Bottom -->
            <div class="trending-bottom">
                <div class="row">
                    @foreach ($random as $acak)
                        <div class="col-lg-4">
                            <div class="single-bottom mb-35">
                                <div class="trend-bottom-img mb-30">
                                    <img src="{{ asset('storage/Gambar/' . $acak->Gambar) }}" alt="">
                                </div>
                                <div class="trend-bottom-cap">
                                    <span class="color1">{{ $acak->getKategori->Gambar }}</span>
                                    <h4><a href="{{ route('home.BeritaShow', $acak->id) }}">{{ $acak->Judul }}</a></h4>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
        <!-- Riht content -->
        <div class="col-lg-4">
            @foreach ($recent as $postterbaru)
                <div class="trand-right-single d-flex">
                    <div class="trand-right-img">
                        <img src="{{ asset('storage/Gambar/' . $postterbaru->Gambar) }}" alt="" width="120px"
                            height="100px">
                    </div>
                    <div class="trand-right-cap">
                        <span class="color1">{{ $postterbaru->getKategori->Nama }}</span>
                        <h4><a href="{{ route('home.BeritaShow', $postterbaru->id) }}">{{ $postterbaru->Judul }}</a></h4>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
    <div class="recent-articles">
        <div class="container">
            <div class="recent-wrapper">
                <!-- section Tittle -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-tittle mb-30">
                            <h3>Pilihan Editor</h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="recent-active dot-style d-flex dot-style">
                            @foreach ($editor as $item)
                                <div class="single-recent mb-100">
                                    <div class="what-img">
                                        <img src="{{ asset('storage/Gambar/' . $item->Gambar) }}" alt="">
                                    </div>
                                    <div class="what-cap">
                                        <span class="color1">{{ $item->getKategori->Nama }}</span>
                                        <h4><a href="{{ route('home.BeritaShow', $item->id) }}">{{ $item->Judul }}</a>
                                        </h4>
                                    </div>
                                </div>
                            @endforeach


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="recent-articles">
        <div class="container">
            <div class="recent-wrapper">
                <!-- section Tittle -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-tittle mb-30">
                            <h3>Pilihan Editor</h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="recent-active dot-style d-flex dot-style">
                            @foreach ($editor as $item)
                                <div class="single-recent mb-100">
                                    <div class="what-img">
                                        <img src="{{ asset('storage/Gambar/' . $item->Gambar) }}" alt="">
                                    </div>
                                    <div class="what-cap">
                                        <span class="color1">{{ $item->getKategori->Nama }}</span>
                                        <h4><a href="{{ route('home.BeritaShow', $item->id) }}">{{ $item->Judul }}</a>
                                        </h4>
                                    </div>
                                </div>
                            @endforeach


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
