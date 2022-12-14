<div>
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="trending__product">
                        <div class="row">
                            <div class="col-lg-8 col-md-8 col-sm-8">
                                <div class="section-title">
                                    <h4>Live</h4>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            @foreach ($results as $key => $result)
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <a href="{{ route('scrp.detail', $key) }}">
                                        <div class="product__item">
                                            <div class="product__item__pic set-bg" data-setbg="{{ $result['image'] }}">
                                            </div>
                                            <div class="product__item__text">
                                                <h5><a
                                                        href="{{ route('scrp.detail', $key) }}">{{ $result['title'] }}</a>
                                                </h5>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
