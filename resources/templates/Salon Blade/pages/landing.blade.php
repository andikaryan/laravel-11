@extends('layouts.main')
@section('content')
<!-- jumbotron-section -->
@include('layouts.jumbotron')
<!-- jumbotron-section end -->

<!-- overview -->
@include('layouts.overview')
<!-- overview end -->

<!-- product-section -->
@include('layouts.products')
<!-- product-section -->

<!-- testimonial-section -->
@include('layouts.testimonials')
<!-- testimonial-section end -->

<!-- contactus -->
@include('layouts.contactus')
<!-- contactus end -->

@endsection