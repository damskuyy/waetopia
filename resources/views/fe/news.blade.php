<div class="all-page-title page-breadcrumb">
    <div class="container text-center">
        <div class="row">
            <div class="col-lg-12">
                <h1>News</h1>
            </div>
        </div>
    </div>
</div>

<div class="blog-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="heading-title text-center">
                    <h2>Hot News</h2>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting</p>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($beritas as $berita)
            <div class="col-lg-4 col-md-6 col-15">
                <div class="blog-box-inner">
                    <div class="blog-img-box" style="background:#f8f9fa;display:flex;align-items:center;justify-content:center;min-height:180px;max-height:240px;">
                        <img src="{{ asset('storage/' . $berita['foto']) }}"
                            alt="{{ $berita->judul }}"
                            style="max-height:220px;max-width:100%;width:auto;height:auto;object-fit:contain;display:block;">
                    </div>
                    <div class="blog-detail">
                        <h2>{{ $berita->judul }}</h2>
                        <ul>
                            <li><span>Category: {{ $berita->kategoriBerita->kategori_berita }}</span></li>
                            {{-- <li>|</li> --}}
                            <li><span>{{ \Carbon\Carbon::parse($berita->tgl_post)->format('d F Y') }}</span></li>
                        </ul>
                        <p>{{ Str::limit($berita->berita, 20) }}</p>
                        <button class="btn btn-lg btn-circle btn-outline-new-white"
                            data-bs-toggle="modal"
                            data-bs-target="#modalBerita{{ $berita->id }}">
                            Read More
                        </button>
                    </div>
                </div>
            </div>

            <!-- Modal untuk berita -->
            <div class="modal fade" id="modalBerita{{ $berita->id }}" tabindex="-1" aria-labelledby="modalBeritaLabel{{ $berita->id }}" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalBeritaLabel{{ $berita->id }}">{{ $berita->judul }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                        </div>
                        <div class="modal-body">
                            <img src="{{ asset('storage/' . $berita['foto']) }}" alt="{{ $berita->judul }}" class="img-fluid mb-3" style="max-height:400px;object-fit:contain;display:block;margin:auto;">
                            <ul>
                                <li><span>Category: {{ $berita->kategoriBerita->kategori_berita }}</span></li>
                                {{-- <li>|</li> --}}
                                <li><span>{{ \Carbon\Carbon::parse($berita->tgl_post)->format('d F Y') }}</span></li>
                            </ul>
                            <p>{{ $berita->berita }}</p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>


{{-- <!-- Start All Pages -->
<div class="all-page-title page-breadcrumb">
    <div class="container text-center">
        <div class="row">
            <div class="col-lg-12">
                <h1>News</h1>
            </div>
        </div>
    </div>
</div>
<!-- End All Pages -->

<!-- Start blog -->
<div class="blog-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="heading-title text-center">
                    <h2>Hot News</h2>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6 col-12">
                <div class="blog-box-inner">
                    <div class="blog-img-box">
                        <img class="img-fluid" src="fe/images/blog-img-01.jpg" alt="">
                    </div>
                    <div class="blog-detail">
                        <h4>Duis feugiat neque sed dolor cursus.</h4>
                        <ul>
                            <li><span>Post by Admin</span></li>
                            <li>|</li>
                            <li><span>27 February 2018</span></li>
                        </ul>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque auctor suscipit feugiat. Ut at pellentesque ante, sed convallis arcu. Nullam facilisis, eros in eleifend luctus, odio ante sodales augue, eget lacinia lectus erat et sem. </p>
                        <p>Sed semper orci sit amet porta placerat. Etiam quis finibus eros. </p>
                        <a class="btn btn-lg btn-circle btn-outline-new-white" href="/news-detail">Read More</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-12">
                <div class="blog-box-inner">
                    <div class="blog-img-box">
                        <img class="img-fluid" src="fe/images/blog-img-02.jpg" alt="">
                    </div>
                    <div class="blog-detail">
                        <h4>Duis feugiat neque sed dolor cursus.</h4>
                        <ul>
                            <li><span>Post by Admin</span></li>
                            <li>|</li>
                            <li><span>27 February 2018</span></li>
                        </ul>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque auctor suscipit feugiat. Ut at pellentesque ante, sed convallis arcu. Nullam facilisis, eros in eleifend luctus, odio ante sodales augue, eget lacinia lectus erat et sem. </p>
                        <p>Sed semper orci sit amet porta placerat. Etiam quis finibus eros. </p>
                        <a class="btn btn-lg btn-circle btn-outline-new-white" href="#">Read More</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-12">
                <div class="blog-box-inner">
                    <div class="blog-img-box">
                        <img class="img-fluid" src="fe/images/blog-img-03.jpg" alt="">
                    </div>
                    <div class="blog-detail">
                        <h4>Duis feugiat neque sed dolor cursus.</h4>
                        <ul>
                            <li><span>Post by Admin</span></li>
                            <li>|</li>
                            <li><span>27 February 2018</span></li>
                        </ul>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque auctor suscipit feugiat. Ut at pellentesque ante, sed convallis arcu. Nullam facilisis, eros in eleifend luctus, odio ante sodales augue, eget lacinia lectus erat et sem. </p>
                        <p>Sed semper orci sit amet porta placerat. Etiam quis finibus eros. </p>
                        <a class="btn btn-lg btn-circle btn-outline-new-white" href="#">Read More</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-12">
                <div class="blog-box-inner">
                    <div class="blog-img-box">
                        <img class="img-fluid" src="fe/images/blog-img-04.jpg" alt="">
                    </div>
                    <div class="blog-detail">
                        <h4>Duis feugiat neque sed dolor cursus.</h4>
                        <ul>
                            <li><span>Post by Admin</span></li>
                            <li>|</li>
                            <li><span>27 February 2018</span></li>
                        </ul>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque auctor suscipit feugiat. Ut at pellentesque ante, sed convallis arcu. Nullam facilisis, eros in eleifend luctus, odio ante sodales augue, eget lacinia lectus erat et sem. </p>
                        <p>Sed semper orci sit amet porta placerat. Etiam quis finibus eros. </p>
                        <a class="btn btn-lg btn-circle btn-outline-new-white" href="#">Read More</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-12">
                <div class="blog-box-inner">
                    <div class="blog-img-box">
                        <img class="img-fluid" src="fe/images/blog-img-05.jpg" alt="">
                    </div>
                    <div class="blog-detail">
                        <h4>Duis feugiat neque sed dolor cursus.</h4>
                        <ul>
                            <li><span>Post by Admin</span></li>
                            <li>|</li>
                            <li><span>27 February 2018</span></li>
                        </ul>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque auctor suscipit feugiat. Ut at pellentesque ante, sed convallis arcu. Nullam facilisis, eros in eleifend luctus, odio ante sodales augue, eget lacinia lectus erat et sem. </p>
                        <p>Sed semper orci sit amet porta placerat. Etiam quis finibus eros. </p>
                        <a class="btn btn-lg btn-circle btn-outline-new-white" href="#">Read More</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-12">
                <div class="blog-box-inner">
                    <div class="blog-img-box">
                        <img class="img-fluid" src="fe/images/blog-img-06.jpg" alt="">
                    </div>
                    <div class="blog-detail">
                        <h4>Duis feugiat neque sed dolor cursus.</h4>
                        <ul>
                            <li><span>Post by Admin</span></li>
                            <li>|</li>
                            <li><span>27 February 2018</span></li>
                        </ul>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque auctor suscipit feugiat. Ut at pellentesque ante, sed convallis arcu. Nullam facilisis, eros in eleifend luctus, odio ante sodales augue, eget lacinia lectus erat et sem. </p>
                        <p>Sed semper orci sit amet porta placerat. Etiam quis finibus eros. </p>
                        <a class="btn btn-lg btn-circle btn-outline-new-white" href="#">Read More</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-12">
                <div class="blog-box-inner">
                    <div class="blog-img-box">
                        <img class="img-fluid" src="fe/images/blog-img-07.jpg" alt="">
                    </div>
                    <div class="blog-detail">
                        <h4>Duis feugiat neque sed dolor cursus.</h4>
                        <ul>
                            <li><span>Post by Admin</span></li>
                            <li>|</li>
                            <li><span>27 February 2018</span></li>
                        </ul>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque auctor suscipit feugiat. Ut at pellentesque ante, sed convallis arcu. Nullam facilisis, eros in eleifend luctus, odio ante sodales augue, eget lacinia lectus erat et sem. </p>
                        <p>Sed semper orci sit amet porta placerat. Etiam quis finibus eros. </p>
                        <a class="btn btn-lg btn-circle btn-outline-new-white" href="#">Read More</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-12">
                <div class="blog-box-inner">
                    <div class="blog-img-box">
                        <img class="img-fluid" src="fe/images/blog-img-08.jpg" alt="">
                    </div>
                    <div class="blog-detail">
                        <h4>Duis feugiat neque sed dolor cursus.</h4>
                        <ul>
                            <li><span>Post by Admin</span></li>
                            <li>|</li>
                            <li><span>27 February 2018</span></li>
                        </ul>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque auctor suscipit feugiat. Ut at pellentesque ante, sed convallis arcu. Nullam facilisis, eros in eleifend luctus, odio ante sodales augue, eget lacinia lectus erat et sem. </p>
                        <p>Sed semper orci sit amet porta placerat. Etiam quis finibus eros. </p>
                        <a class="btn btn-lg btn-circle btn-outline-new-white" href="#">Read More</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-12">
                <div class="blog-box-inner">
                    <div class="blog-img-box">
                        <img class="img-fluid" src="fe/images/blog-img-09.jpg" alt="">
                    </div>
                    <div class="blog-detail">
                        <h4>Duis feugiat neque sed dolor cursus.</h4>
                        <ul>
                            <li><span>Post by Admin</span></li>
                            <li>|</li>
                            <li><span>27 February 2018</span></li>
                        </ul>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque auctor suscipit feugiat. Ut at pellentesque ante, sed convallis arcu. Nullam facilisis, eros in eleifend luctus, odio ante sodales augue, eget lacinia lectus erat et sem. </p>
                        <p>Sed semper orci sit amet porta placerat. Etiam quis finibus eros. </p>
                        <a class="btn btn-lg btn-circle btn-outline-new-white" href="#">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
</div>
<!-- End blog -->