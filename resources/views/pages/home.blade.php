@extends('layouts.app')

@section('content')



    <!-- START SECTION BANNER -->
        @include('components.slider')
    <!-- END SECTION BANNER -->


<!-- END MAIN CONTENT -->
<div class="main_content">

    <!-- START SECTION BANNER -->
        @include('components.banner')
    <!-- END SECTION BANNER -->


    <!-- START SECTION top Categories -->
        @include('components.top-category')
    <!-- END SECTION top Categories -->


    <!-- START SECTION top Brand -->
      @include('components.top-brand')
    <!-- END SECTION top Brand -->


    <!-- START SECTION Exclusive Product -->
        @include('components.exclusive-product')
    <!-- END SECTION Exclusive Product -->


    <!-- START SECTION SINGLE BANNER --> 
        @include('components.single-banner')
    <!-- END SECTION SINGLE BANNER --> 


    <!-- START SECTION Featured Product -->
        @include('components.featured-product')
    <!-- END SECTION Featured Product -->


    <!-- START SECTION TESTIMONIAL -->
        @include('components.testimonial')
    <!-- END SECTION TESTIMONIAL -->


    <!-- START SECTION SHOP INFO -->
        @include('components.shop-info')
    <!-- END SECTION SHOP INFO -->


    <!-- START SECTION SUBSCRIBE NEWSLETTER -->
        @include('components.subscribe')
    <!-- START SECTION SUBSCRIBE NEWSLETTER -->

</div>
<!-- END MAIN CONTENT -->



@endsection