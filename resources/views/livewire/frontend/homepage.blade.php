<div>
    <section class="normal-breadcrumb set-bg" data-setbg="{{ asset('assets/frontend/img/normal-breadcrumb.jpg') }}"
        style="background-image: url(&quot;{{ asset('assets/frontend/img/normal-breadcrumb.jpg') }}&quot;);">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="normal__breadcrumb__text">
                        <form action="">
                            <div class="p-2 bg-light rounded rounded-pill shadow-sm mb-0">
                                <div class="input-group">
                                    <input type="search" placeholder="What're you searching for?"
                                        aria-describedby="button-addon1" class="form-control border-0 bg-light">
                                    <div class="input-group-append">
                                        <button id="button-addon1" type="submit" class="btn btn-link text-primary"><i
                                                class="fa fa-search"></i></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->


    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="trending__product">
                        <div class="row">
                            <div class="col-lg-8 col-md-8 col-sm-8">
                                <div class="section-title">
                                    <h4>Coming Soon</h4>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4">
                                <div class="btn__all">
                                    <a href="#" class="primary-btn">View All <span class="arrow_right"></span></a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            @foreach ($dataFilm as $data)
                                <a href="{{ route('film.detail', $data->judul) }}">
                                    <div class="col-lg-3 col-md-3 col-sm-3">
                                    <div class="product__item">
                                        <div class="product__item__pic set-bg"
                                            data-setbg="{{ asset('storage/images/' . $data->image) }}">
                                            <div class="ep">
                                                {{ Str::title($data->waktu_penayangan) }}</div>
                                            <div class="comment"><i class="fa fa-comments"></i> 11</div>
                                            <div class="view"><i class="fa fa-eye"></i> 9141</div>
                                        </div>
                                        <div class="product__item__text">
                                            <ul>
                                                <li>{{ $data->tahun }}</li>
                                            </ul>
                                            <h5><a href="{{ route('film.detail', $data->judul) }}">{{ $data->judul }}</a></h5>
                                        </div>
                                    </div>
                                </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="trending__product">
                        <div class="row">
                            <div class="col-lg-8 col-md-8 col-sm-8">
                                <div class="section-title">
                                    <h4>Telah Berakhir</h4>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4">
                                <div class="btn__all">
                                    <a href="#" class="primary-btn">View All <span class="arrow_right"></span></a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            @foreach ($oldDataFilm as $data)
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <div class="product__item">
                                        <div style="opacity: 0.6" class="product__item__pic set-bg"
                                            data-setbg="{{ asset('storage/images/' . $data->image) }}">
                                            <div class="ep">
                                                {{ Str::title($data->waktu_penayangan) }}</div>
                                            <div class="comment"><i class="fa fa-comments"></i> 11</div>
                                            <div class="view"><i class="fa fa-eye"></i> 9141</div>
                                        </div>
                                        <div class="product__item__text">
                                            <ul>
                                                <li>{{ $data->tahun }}</li>
                                            </ul>
                                            <h5><a href="#">{{ $data->judul }}</a></h5>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Section End -->
</div>
