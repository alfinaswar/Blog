@extends('layouts.app-beranda')
@section('content')
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="assets/img/logo/logo.png" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Preloader Start -->


    <main>
        <!-- About US Start -->
        <div class="about-area">
            <div class="container">
                <!-- Hot Aimated News Tittle-->

                <div class="row">
                    <div class="col-lg-8">
                        <!-- Trending Tittle -->
                        <div class="about-right mb-90">
                            <div class="about-img">
                                <img src="{{ asset('storage/Gambar/' . $data->Gambar) }}" alt="">
                            </div>
                            <div class="section-tittle mb-30 pt-30">
                                <h3>{{ $data->Judul }}</h3>
                            </div>
                            <div class="about-prea">
                                {!! $data->Isi !!}
                            </div>

                        </div>
                        <div class="comments-area mb-50">
                            <h4 class="mb-30">Komentar</h4>
                            @forelse($data->getKomen as $comment)
                                <div class="comment-list">
                                    <div class="single-comment justify-content-between d-flex mb-20">
                                        <div class="user justify-content-between d-flex">
                                            <div class="desc">
                                                <div class="d-flex justify-content-between">
                                                    <div class="d-flex align-items-center">
                                                        <h5 class="comment-author">{{ $comment->Nama }}</h5>
                                                        <p class="date">{{ $comment->created_at->format('d M, Y') }}</p>
                                                    </div>
                                                </div>
                                                <p class="comment-text">
                                                    {{ $comment->Komentar }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <p>No comments yet. Be the first to comment!</p>
                            @endforelse
                        </div>

                        <style>
                            .comments-area {
                                background-color: #f9f9f9;
                                padding: 20px;
                                border-radius: 10px;
                                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                            }

                            .comment-list {
                                margin-bottom: 1px;
                                /* Mengurangi jarak antar komentar */
                            }

                            .single-comment {
                                background-color: #fff;
                                padding: 15px;
                                border-radius: 8px;
                                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                                transition: transform 0.3s ease;
                            }

                            .single-comment:hover {
                                transform: translateY(-5px);
                            }

                            .comment-author {
                                font-size: 16px;
                                font-weight: bold;
                                margin-right: 10px;
                            }

                            .date {
                                font-size: 14px;
                                color: #777;
                            }

                            .comment-text {
                                font-size: 14px;
                                color: #333;
                                margin-top: 10px;
                                line-height: 1.6;
                            }

                            .comment-author,
                            .date {
                                margin-bottom: 5px;
                            }
                        </style>

                        <div class="row">
                            <div class="col-lg-12">
                                <form class="form-contact contact_form mb-80" action="{{ route('komentar.store') }}"
                                    method="POST" enctype="multipart/form-data">

                                    @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <textarea class="form-control w-100 error" name="Komentar" id="Komentar" cols="30" rows="9"
                                                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Komentar'" placeholder="Enter Komentar"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <input class="form-control error" value="{{ auth()->user()->name ?? '' }}"
                                                    name="Nama" id="name" type="text"
                                                    onfocus="this.placeholder = ''"
                                                    onblur="this.placeholder = 'Masukan Nama Anda'"
                                                    placeholder="Masukan Nama Anda">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <input class="form-control error" name="Email" id="email"
                                                    type="email" onfocus="this.placeholder = ''"
                                                    onblur="this.placeholder = 'Masukan Alamat Email Anda'"
                                                    placeholder="Email">
                                                <input type="hidden" value="{{ $data->id }}" name="IDBerita">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="form-group mt-3">
                                        <button type="submit" class="button button-contactForm boxed-btn">Send</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <!-- Section Tittle -->
                        <div class="section-tittle mb-40">
                            <h3>Berita Terkini</h3>
                        </div>
                        <!-- Flow Socail -->
                        <div class="col-lg-4">
                            @foreach ($recent as $postterbaru)
                                <div class="trand-right-single d-flex">
                                    <div class="trand-right-img">
                                        <img src="{{ asset('storage/Gambar/' . $postterbaru->Gambar) }}" alt=""
                                            width="120px" height="100px">
                                    </div>
                                    <div class="trand-right-cap">
                                        <span class="color1">{{ $postterbaru->getKategori->Nama }}</span>
                                        <h4><a
                                                href="{{ route('home.BeritaShow', $postterbaru->id) }}">{{ $postterbaru->Judul }}</a>
                                        </h4>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                        <!-- New Poster -->
                        <div class="news-poster d-none d-lg-block">
                            <img src="assets/img/news/news_card.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- About US End -->
    </main>
@endsection
