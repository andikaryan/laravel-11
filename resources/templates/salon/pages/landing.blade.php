@extends('salon.layouts.main')
@section('content')
<!-- jumbotron-section -->
@include('salon.layouts.jumbotron')
<!-- jumbotron-section end -->

<!-- overview -->
@include('salon.layouts.overview')
<!-- overview end -->

<!-- product-section -->
@include('salon.layouts.products')
<!-- product-section -->

<!-- testimonial-section -->
@include('salon.layouts.testimonials')
<!-- testimonial-section end -->

<!-- contactus -->
@include('salon.layouts.contactus')
<!-- contactus end -->

@endsection
