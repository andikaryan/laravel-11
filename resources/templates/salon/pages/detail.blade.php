@extends('salon.layouts.main')
@section('content')
<section class="service-details">
    <div class="auto-container">
        <div class="row clearfix mt-5">
            <div class="col-lg-12 col-md-12 col-sm-12 content-side">
                <div class="service-details-content">
                    <div class="inner-box">
                        <div class="two-column">
                            <div class="row align-items-center clearfix">
                                <div class="col-lg-6 col-md-6 col-sm-12 image-column">
                                    <figure class="image"><img src="{{url($product->image)}}" alt=""></figure>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 text-column">
                                    <div class="text">
                                        <h2>{{$product->title}}</h2>
                                        <h4 class="price">{{$product->price}}</h4>
                                        <p>{{$product->description}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
