    <section class="service-section bg-color-1" id="product">
        <div class="auto-container">
            <div class="sec-title">
                <h2>Our Products</h2>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 big-column">
                    <div class="service-inner">
                        <div class="three-item-carousel owl-carousel owl-theme owl-nav-none owl-dots-style-one centred">
                            @foreach ($products as $product)
                            <div class="service-block-one">
                                <div class="inner-box">
                                    <figure class="image-box"><a href="{{ route('detail', $product->id)}}"><img src="{{$product->image}}" alt=""></a></figure>
                                    <div class="lower-content">
                                        <h4><a href="{{ route('detail', $product->id) }}">{{$product->title}}</a></h4>
                                        <p>{{$product->description}}</p>
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
