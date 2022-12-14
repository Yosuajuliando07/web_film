<div>
    <section class="anime-details spad">
        <div class="container">
            <div class="anime__details__content">
                <div class="row">
                    <div class="col-lg-12 mb-5">
                        <iframe src="{{ $results['data']['link_streaming'] }}" frameborder="0" width="1130"
                            height="500"></iframe>
                    </div>
                    <div class="col-lg-12">
                        <div class="anime__details__text">
                            <div class="anime__details__title">
                                <h3>{{ $results['data']['title'] }}</h3>
                            </div>
                            <p>{{ $results['data']['description'] }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
