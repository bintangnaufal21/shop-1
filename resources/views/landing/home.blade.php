<x-layoutUser>
    <!-- ======slider-area-start=========================================== -->
    <div class="slider-area over-hidden">
        <div class="slider-active">
            <div class="single-slider slider-height d-flex align-items-center"
                data-background="{{ asset('landing/images/slider/slider-bg.jpg') }}">
                <div class="slider-shape position-absolute">
                    <span class="slider-bg-round d-block"></span>
                </div><!-- /slider-shape -->
                <div class="container">
                    <div class="row pt-65 ">
                        <div class="col-xl-6  col-lg-6  col-md-7  col-sm-12 col-12 d-flex align-items-center">
                            <div class="slider-content mt--15">
                                <span data-animation="fadeInLeft" data-delay=".7s" class="d-block theme-color">Styling
                                    Product</span>
                                <h2 data-animation="fadeInLeft" data-delay="1s"
                                    class="pt-15 mb-1 text-capitalize pb-10">Midgard <br> Shop</h2>
                                <p class="pr-20" data-animation="fadeInLeft" data-delay="1.5s">Welcome </p>
                            </div>
                        </div><!-- /col -->
                        <div class="col-xl-6  col-lg-6  col-md-5  col-sm-12 col-12 d-flex align-items-center">
                            <div class="slider-img mt-35" data-animation="fadeInRight" data-delay="1.5s">
                                <img src="{{ asset('landing/images/slider/home1-slider-img1.jpg') }}" alt="">
                            </div>
                        </div><!-- /col -->
                    </div><!-- /row -->
                </div><!-- /container -->
            </div><!-- /single-slider -->
        </div><!-- /single-slider -->
    </div><!-- /slider-active -->
    </div>
    <!-- slider-area-end=  -->

    <!-- ====== product-area-start================================ -->
    <div class="product-area pb-40 mt-4">
        <div class="container">
            <div class="product-content single-product-tab-content">
                <div class="row">
                    <div class="col-xl-12  col-lg-12  col-md-12  col-sm-12 col-12 pb-15">
                        <div class="section-title text-center">
                            <span class="theme-color d-block pb-2">Featured Product</span>
                            <h3>Popular Products</h3>
                        </div><!-- /section-title -->
                    </div><!-- /col -->
                </div><!-- /row -->
                <div class="popular-product mt-30">
                    <div class="row product-active">
                        <div class="col-xl-4  col-lg-3  col-md-6  col-sm-6 col-12">
                            <div class="s-p-wrapper">
                                <div class="single-product mb-35">
                                    <div class="single-product-img position-relative over-hidden">
                                        <a class="position-relative d-block" href="product-details.html">
                                            <img class="width100 height100"
                                                src="{{ asset('landing/images/product/product1.jpg') }}" alt="product">
                                        </a>
                                        <ul class="product-action d-flex position-absolute transition-3">
                                            <li data-toggle="tooltip" data-placement="top" title="Add to Cart">
                                                <a href="cart.html"
                                                    class="text-center mb-10 white-bg primary-color d-block">
                                                    <span><i class="far fa-shopping-cart"></i></span>
                                                </a>
                                            </li>
                                            <li data-toggle="tooltip" data-placement="top" title="Add to Wishlist">
                                                <a href="wishlist.html"
                                                    class="text-center mb-10 white-bg primary-color d-block">
                                                    <span><i class="far fa-heart"></i></span>
                                                </a>
                                            </li>
                                            <li data-toggle="tooltip" data-placement="top" title="Add to Compare">
                                                <a href="product-details.html"
                                                    class="text-center mb-10 white-bg primary-color d-block">
                                                    <span><i class="far fa-repeat"></i></span>
                                                </a>
                                            </li>
                                            <li data-toggle="tooltip" data-placement="top" title="Quick view">
                                                <a href="#"
                                                    class="text-center mb-10 white-bg primary-color d-block"
                                                    data-toggle="modal" data-target="#product-modal">
                                                    <span><i class="far fa-expand-wide"></i></span>
                                                </a>
                                            </li>
                                        </ul><!-- /view-btn -->
                                    </div><!-- /single-product-img -->
                                    <div class="single-product-info position-relative mt-25">
                                        <h6><a href="product-details.html">Faith Industries "Quis Ut Deus" Tshirt
                                                Industries P5 "INMATE" Tshirt </a></h6>
                                        <ul class="single-product-price d-flex transition-3">
                                            <li>
                                                <span class="gray-color pr-2"><del>IDR 225.000,00</del></span>
                                                <span class="primary-color">IDR 200.000,00</span>
                                            </li>
                                        </ul><!-- /single-product-price -->
                                    </div>
                                </div><!-- /single-product -->
                            </div>
                            <div class="s-p-wrapper">
                                <div class="single-product mb-35">
                                    <div class="single-product-img position-relative over-hidden">
                                        <a class="position-relative d-block" href="product-details.html">
                                            <img class="width100 height100"
                                                src="{{ asset('landing/images/product/product2.jpg') }}" alt="product">
                                        </a>
                                        <ul class="product-action d-flex position-absolute transition-3">
                                            <li data-toggle="tooltip" data-placement="top" title="Add to Cart">
                                                <a href="cart.html"
                                                    class="text-center mb-10 white-bg primary-color d-block">
                                                    <span><i class="far fa-shopping-cart"></i></span>
                                                </a>
                                            </li>
                                            <li data-toggle="tooltip" data-placement="top" title="Add to Wishlist">
                                                <a href="wishlist.html"
                                                    class="text-center mb-10 white-bg primary-color d-block">
                                                    <span><i class="far fa-heart"></i></span>
                                                </a>
                                            </li>
                                            <li data-toggle="tooltip" data-placement="top" title="Add to Compare">
                                                <a href="product-details.html"
                                                    class="text-center mb-10 white-bg primary-color d-block">
                                                    <span><i class="far fa-repeat"></i></span>
                                                </a>
                                            </li>
                                            <li data-toggle="tooltip" data-placement="top" title="Quick view">
                                                <a href="#"
                                                    class="text-center mb-10 white-bg primary-color d-block"
                                                    data-toggle="modal" data-target="#product-modal">
                                                    <span><i class="far fa-expand-wide"></i></span>
                                                </a>
                                            </li>
                                        </ul><!-- /view-btn -->
                                    </div><!-- /single-product-img -->
                                    <div class="single-product-info position-relative mt-25">
                                        <h6><a href="product-details.html">Faith Industries "Quis Ut Deus" Tshirt
                                                Industries "Hopper in The Cloud" Tshirt</a></h6>
                                        <ul class="single-product-price d-flex transition-3">
                                            <li>
                                                <span class="primary-color">IDR 130.000,00</span>
                                            </li>
                                        </ul><!-- /single-product-price -->
                                    </div>
                                </div><!-- /single-product -->
                            </div>
                        </div><!-- /col -->
                        <div class="col-xl-4  col-lg-3  col-md-6  col-sm-6 col-12">
                            <div class="s-p-wrapper">
                                <div class="single-product mb-35">
                                    <div class="single-product-img position-relative over-hidden">
                                        <div
                                            class="single-product-label position-absolute theme-bg text-center px-2 transition-3 z-index1">
                                            <span class="white text-uppercase d-block"><span>15% </span>off</span>
                                        </div><!-- /product-label -->
                                        <a class="position-relative d-block" href="product-details.html">
                                            <img class="width100 height100"
                                                src="{{ asset('landing/images/product/product3.jpg') }}"
                                                alt="product">
                                        </a>
                                        <ul class="product-action d-flex position-absolute transition-3">
                                            <li data-toggle="tooltip" data-placement="top" title="Add to Cart">
                                                <a href="cart.html"
                                                    class="text-center mb-10 white-bg primary-color d-block">
                                                    <span><i class="far fa-shopping-cart"></i></span>
                                                </a>
                                            </li>
                                            <li data-toggle="tooltip" data-placement="top" title="Add to Wishlist">
                                                <a href="wishlist.html"
                                                    class="text-center mb-10 white-bg primary-color d-block">
                                                    <span><i class="far fa-heart"></i></span>
                                                </a>
                                            </li>
                                            <li data-toggle="tooltip" data-placement="top" title="Add to Compare">
                                                <a href="product-details.html"
                                                    class="text-center mb-10 white-bg primary-color d-block">
                                                    <span><i class="far fa-repeat"></i></span>
                                                </a>
                                            </li>
                                            <li data-toggle="tooltip" data-placement="top" title="Quick view">
                                                <a href="#"
                                                    class="text-center mb-10 white-bg primary-color d-block"
                                                    data-toggle="modal" data-target="#product-modal">
                                                    <span><i class="far fa-expand-wide"></i></span>
                                                </a>
                                            </li>
                                        </ul><!-- /view-btn -->
                                    </div><!-- /single-product-img -->
                                    <div class="single-product-info position-relative mt-25">
                                        <h6><a href="product-details.html">Faith Industries "Quis Ut Deus" Tshirt
                                                Industries "Pool of Chroma" Tshirt</a></h6>
                                        <ul class="single-product-price d-flex transition-3">
                                            <li>
                                                <span class="gray-color pr-2"><del>IDR 225.000,00</del></span>
                                                <span class="primary-color">IDR 120.000,00</span>
                                            </li>
                                        </ul><!-- /single-product-price -->
                                    </div>
                                </div><!-- /single-product -->
                            </div>
                            <div class="s-p-wrapper">
                                <div class="single-product mb-35">
                                    <div class="single-product-img position-relative over-hidden">
                                        <div
                                            class="single-product-label position-absolute theme-bg text-center px-2 transition-3 z-index1">
                                            <span class="white text-uppercase d-block"><span>15% </span>off</span>
                                        </div><!-- /product-label -->
                                        <a class="position-relative d-block" href="product-details.html">
                                            <img class="width100 height100"
                                                src="{{ asset('landing/images/product/product4.jpg') }}"
                                                alt="product">
                                        </a>
                                        <ul class="product-action d-flex position-absolute transition-3">
                                            <li data-toggle="tooltip" data-placement="top" title="Add to Cart">
                                                <a href="cart.html"
                                                    class="text-center mb-10 white-bg primary-color d-block">
                                                    <span><i class="far fa-shopping-cart"></i></span>
                                                </a>
                                            </li>
                                            <li data-toggle="tooltip" data-placement="top" title="Add to Wishlist">
                                                <a href="wishlist.html"
                                                    class="text-center mb-10 white-bg primary-color d-block">
                                                    <span><i class="far fa-heart"></i></span>
                                                </a>
                                            </li>
                                            <li data-toggle="tooltip" data-placement="top" title="Add to Compare">
                                                <a href="product-details.html"
                                                    class="text-center mb-10 white-bg primary-color d-block">
                                                    <span><i class="far fa-repeat"></i></span>
                                                </a>
                                            </li>
                                            <li data-toggle="tooltip" data-placement="top" title="Quick view">
                                                <a href="#"
                                                    class="text-center mb-10 white-bg primary-color d-block"
                                                    data-toggle="modal" data-target="#product-modal">
                                                    <span><i class="far fa-expand-wide"></i></span>
                                                </a>
                                            </li>
                                        </ul><!-- /view-btn -->
                                    </div><!-- /single-product-img -->
                                    <div class="single-product-info position-relative mt-25">
                                        <h6><a href="product-details.html">Faith Industries "Quis Ut Deus" Tshirt
                                                Industries "Study Me" Double Sleeve</a></h6>
                                        <ul class="single-product-price d-flex transition-3">
                                            <li>
                                                <span class="gray-color pr-2"><del>IDR 250.000,00</del></span>
                                                <span class="primary-color">IDR 225.000,00</span>
                                            </li>
                                        </ul><!-- /single-product-price -->
                                    </div>
                                </div><!-- /single-product -->
                            </div>
                        </div><!-- /col -->
                        <div class="col-xl-4  col-lg-3  col-md-6  col-sm-6 col-12">
                            <div class="s-p-wrapper">
                                <div class="single-product mb-35">
                                    <div class="single-product-img position-relative over-hidden">
                                        <a class="position-relative d-block" href="product-details.html">
                                            <img class="width100 height100"
                                                src="{{ asset('landing/images/product/product5.jpg') }}"
                                                alt="product">
                                        </a>
                                        <ul class="product-action d-flex position-absolute transition-3">
                                            <li data-toggle="tooltip" data-placement="top" title="Add to Cart">
                                                <a href="cart.html"
                                                    class="text-center mb-10 white-bg primary-color d-block">
                                                    <span><i class="far fa-shopping-cart"></i></span>
                                                </a>
                                            </li>
                                            <li data-toggle="tooltip" data-placement="top" title="Add to Wishlist">
                                                <a href="wishlist.html"
                                                    class="text-center mb-10 white-bg primary-color d-block">
                                                    <span><i class="far fa-heart"></i></span>
                                                </a>
                                            </li>
                                            <li data-toggle="tooltip" data-placement="top" title="Add to Compare">
                                                <a href="product-details.html"
                                                    class="text-center mb-10 white-bg primary-color d-block">
                                                    <span><i class="far fa-repeat"></i></span>
                                                </a>
                                            </li>
                                            <li data-toggle="tooltip" data-placement="top" title="Quick view">
                                                <a href="#"
                                                    class="text-center mb-10 white-bg primary-color d-block"
                                                    data-toggle="modal" data-target="#product-modal">
                                                    <span><i class="far fa-expand-wide"></i></span>
                                                </a>
                                            </li>
                                        </ul><!-- /view-btn -->
                                    </div><!-- /single-product-img -->
                                    <div class="single-product-info position-relative mt-25">
                                        <h6><a href="product-details.html">Faith Industries "Quis Ut Deus" Tshirt
                                                Industries P3R "Yuki" Shirt</a></h6>
                                        <ul class="single-product-price d-flex transition-3">
                                            <li>
                                                <span class="primary-color">IDR 385.000,00</span>
                                            </li>
                                        </ul><!-- /single-product-price -->
                                    </div>
                                </div><!-- /single-product -->
                            </div>
                            <div class="s-p-wrapper">
                                <div class="single-product mb-35">
                                    <div class="single-product-img position-relative over-hidden">
                                        <a class="position-relative d-block" href="product-details.html">
                                            <img class="width100 height100"
                                                src="{{ asset('landing/images/product/product6.jpg') }}"
                                                alt="product">
                                        </a>
                                        <ul class="product-action d-flex position-absolute transition-3">
                                            <li data-toggle="tooltip" data-placement="top" title="Add to Cart">
                                                <a href="cart.html"
                                                    class="text-center mb-10 white-bg primary-color d-block">
                                                    <span><i class="far fa-shopping-cart"></i></span>
                                                </a>
                                            </li>
                                            <li data-toggle="tooltip" data-placement="top" title="Add to Wishlist">
                                                <a href="wishlist.html"
                                                    class="text-center mb-10 white-bg primary-color d-block">
                                                    <span><i class="far fa-heart"></i></span>
                                                </a>
                                            </li>
                                            <li data-toggle="tooltip" data-placement="top" title="Add to Compare">
                                                <a href="product-details.html"
                                                    class="text-center mb-10 white-bg primary-color d-block">
                                                    <span><i class="far fa-repeat"></i></span>
                                                </a>
                                            </li>
                                            <li data-toggle="tooltip" data-placement="top" title="Quick view">
                                                <a href="#"
                                                    class="text-center mb-10 white-bg primary-color d-block"
                                                    data-toggle="modal" data-target="#product-modal">
                                                    <span><i class="far fa-expand-wide"></i></span>
                                                </a>
                                            </li>
                                        </ul><!-- /view-btn -->
                                    </div><!-- /single-product-img -->
                                    <div class="single-product-info position-relative mt-25">
                                        <h6><a href="product-details.html">Faith Industries "Quis Ut Deus" Tshirt
                                                Industries "The Two Side Of The Crow" Tshirt</a></h6>
                                        <ul class="single-product-price d-flex transition-3">
                                            <li>
                                                <span class="gray-color pr-2"><del>IDR 250.000,00</del></span>
                                                <span class="primary-color">IDR 225.000,00</span>
                                            </li>
                                        </ul><!-- /single-product-price -->
                                    </div>
                                </div><!-- /single-product -->
                            </div>
                        </div><!-- /col -->
                        <div class="col-xl-4  col-lg-3  col-md-6  col-sm-6 col-12">
                            <div class="s-p-wrapper">
                                <div class="single-product mb-35">
                                    <div class="single-product-img position-relative over-hidden">
                                        <div
                                            class="single-product-label position-absolute primary-bg text-center px-2 transition-3 z-index1">
                                            <span class="white text-uppercase d-block">new</span>
                                        </div><!-- /product-label -->
                                        <a class="position-relative d-block" href="product-details.html">
                                            <img class="width100 height100"
                                                src="{{ asset('landing/images/product/product7.jpg') }}"
                                                alt="product">
                                        </a>
                                        <ul class="product-action d-flex position-absolute transition-3">
                                            <li data-toggle="tooltip" data-placement="top" title="Add to Cart">
                                                <a href="cart.html"
                                                    class="text-center mb-10 white-bg primary-color d-block">
                                                    <span><i class="far fa-shopping-cart"></i></span>
                                                </a>
                                            </li>
                                            <li data-toggle="tooltip" data-placement="top" title="Add to Wishlist">
                                                <a href="wishlist.html"
                                                    class="text-center mb-10 white-bg primary-color d-block">
                                                    <span><i class="far fa-heart"></i></span>
                                                </a>
                                            </li>
                                            <li data-toggle="tooltip" data-placement="top" title="Add to Compare">
                                                <a href="product-details.html"
                                                    class="text-center mb-10 white-bg primary-color d-block">
                                                    <span><i class="far fa-repeat"></i></span>
                                                </a>
                                            </li>
                                            <li data-toggle="tooltip" data-placement="top" title="Quick view">
                                                <a href="#"
                                                    class="text-center mb-10 white-bg primary-color d-block"
                                                    data-toggle="modal" data-target="#product-modal">
                                                    <span><i class="far fa-expand-wide"></i></span>
                                                </a>
                                            </li>
                                        </ul><!-- /view-btn -->
                                    </div><!-- /single-product-img -->
                                    <div class="single-product-info position-relative mt-25">
                                        <h6><a href="product-details.html">Faith Industries "Quis Ut Deus" Tshirt
                                                Industries "The Wylder" Tshirt</a></h6>
                                        <ul class="single-product-price d-flex transition-3">
                                            <li>
                                                <span class="primary-color">IDR 225.000,00</span>
                                            </li>
                                        </ul><!-- /single-product-price -->
                                    </div>
                                </div><!-- /single-product -->
                            </div>
                            <div class="s-p-wrapper">
                                <div class="single-product mb-35">
                                    <div class="single-product-img position-relative over-hidden">
                                        <div
                                            class="single-product-label position-absolute primary-bg text-center px-2 transition-3 z-index1">
                                            <span class="white text-uppercase d-block">new</span>
                                        </div><!-- /product-label -->
                                        <a class="position-relative d-block" href="product-details.html">
                                            <img class="width100 height100"
                                                src="{{ asset('landing/images/product/product8.jpg') }}"
                                                alt="product">
                                        </a>
                                        <ul class="product-action d-flex position-absolute transition-3">
                                            <li data-toggle="tooltip" data-placement="top" title="Add to Cart">
                                                <a href="cart.html"
                                                    class="text-center mb-10 white-bg primary-color d-block">
                                                    <span><i class="far fa-shopping-cart"></i></span>
                                                </a>
                                            </li>
                                            <li data-toggle="tooltip" data-placement="top" title="Add to Wishlist">
                                                <a href="wishlist.html"
                                                    class="text-center mb-10 white-bg primary-color d-block">
                                                    <span><i class="far fa-heart"></i></span>
                                                </a>
                                            </li>
                                            <li data-toggle="tooltip" data-placement="top" title="Add to Compare">
                                                <a href="product-details.html"
                                                    class="text-center mb-10 white-bg primary-color d-block">
                                                    <span><i class="far fa-repeat"></i></span>
                                                </a>
                                            </li>
                                            <li data-toggle="tooltip" data-placement="top" title="Quick view">
                                                <a href="#"
                                                    class="text-center mb-10 white-bg primary-color d-block"
                                                    data-toggle="modal" data-target="#product-modal">
                                                    <span><i class="far fa-expand-wide"></i></span>
                                                </a>
                                            </li>
                                        </ul><!-- /view-btn -->
                                    </div><!-- /single-product-img -->
                                    <div class="single-product-info position-relative mt-25">
                                        <h6><a href="product-details.html">Faith Industries "Quis Ut Deus" Tshirt</a>
                                        </h6>
                                        <ul class="single-product-price d-flex transition-3">
                                            <li>
                                                <span class="primary-color">IDR 185.000,00</span>
                                            </li>
                                        </ul><!-- /single-product-price -->
                                    </div>
                                </div><!-- /single-product -->
                            </div>
                        </div><!-- /col -->
                    </div><!-- /row -->
                </div>
            </div><!-- /product-content -->
        </div><!-- /container -->
    </div>
    <!-- product-area-end  -->

    <!-- ====== best-seller-product-area-start================================ -->
    <div class="product-area best-seller-product-area pb-40">
        <div class="container">
            <div class="product-content single-product-tab-content">
                <div class="row">
                    <div class="col-xl-12  col-lg-12  col-md-12  col-sm-12 col-12 pb-15">
                        <div class="section-title text-center">
                            <span class="theme-color d-block pb-2">Regular Product</span>
                            <h3>Best Seller Products</h3>
                        </div><!-- /section-title -->
                    </div><!-- /col -->
                </div><!-- /row -->
                <div class="popular-product mt-30">
                    <div class="row product-active2">
                        <div class="col-xl-4  col-lg-3  col-md-6  col-sm-6 col-12">
                            <div class="s-p-wrapper">
                                <div class="single-product mb-35">
                                    <div class="single-product-img position-relative over-hidden">
                                        <a class="position-relative d-block" href="product-details.html">
                                            <img class="width100 height100"
                                                src="{{ asset('landing/images/product/product9.jpg') }}"
                                                alt="product">
                                        </a>
                                        <ul class="product-action d-flex position-absolute transition-3">
                                            <li data-toggle="tooltip" data-placement="top" title="Add to Cart">
                                                <a href="cart.html"
                                                    class="text-center mb-10 white-bg primary-color d-block">
                                                    <span><i class="far fa-shopping-cart"></i></span>
                                                </a>
                                            </li>
                                            <li data-toggle="tooltip" data-placement="top" title="Add to Wishlist">
                                                <a href="wishlist.html"
                                                    class="text-center mb-10 white-bg primary-color d-block">
                                                    <span><i class="far fa-heart"></i></span>
                                                </a>
                                            </li>
                                            <li data-toggle="tooltip" data-placement="top" title="Add to Compare">
                                                <a href="product-details.html"
                                                    class="text-center mb-10 white-bg primary-color d-block">
                                                    <span><i class="far fa-repeat"></i></span>
                                                </a>
                                            </li>
                                            <li data-toggle="tooltip" data-placement="top" title="Quick view">
                                                <a href="#"
                                                    class="text-center mb-10 white-bg primary-color d-block"
                                                    data-toggle="modal" data-target="#product-modal">
                                                    <span><i class="far fa-expand-wide"></i></span>
                                                </a>
                                            </li>
                                        </ul><!-- /view-btn -->
                                    </div><!-- /single-product-img -->
                                    <div class="single-product-info position-relative mt-25">
                                        <h6><a href="product-details.html">Faith Industries "Leave Me Alone" TShirt</a>
                                        </h6>
                                        <ul class="single-product-price d-flex transition-3">
                                            <li>
                                                <span class="primary-color">IDR 225.000,00</span>
                                            </li>
                                        </ul><!-- /single-product-price -->
                                    </div>
                                </div><!-- /single-product -->
                            </div>
                        </div><!-- /col -->
                        <div class="col-xl-4  col-lg-3  col-md-6  col-sm-6 col-12">
                            <div class="s-p-wrapper">
                                <div class="single-product mb-35">
                                    <div class="single-product-img position-relative over-hidden">
                                        <div
                                            class="single-product-label position-absolute theme-bg text-center px-2 transition-3 z-index1">
                                            <span class="white text-uppercase d-block"><span>15% </span>off</span>
                                        </div><!-- /product-label -->
                                        <a class="position-relative d-block" href="product-details.html">
                                            <img class="width100 height100"
                                                src="{{ asset('landing/images/product/product10.jpg') }}"
                                                alt="product">
                                        </a>
                                        <ul class="product-action d-flex position-absolute transition-3">
                                            <li data-toggle="tooltip" data-placement="top" title="Add to Cart">
                                                <a href="cart.html"
                                                    class="text-center mb-10 white-bg primary-color d-block">
                                                    <span><i class="far fa-shopping-cart"></i></span>
                                                </a>
                                            </li>
                                            <li data-toggle="tooltip" data-placement="top" title="Add to Wishlist">
                                                <a href="wishlist.html"
                                                    class="text-center mb-10 white-bg primary-color d-block">
                                                    <span><i class="far fa-heart"></i></span>
                                                </a>
                                            </li>
                                            <li data-toggle="tooltip" data-placement="top" title="Add to Compare">
                                                <a href="product-details.html"
                                                    class="text-center mb-10 white-bg primary-color d-block">
                                                    <span><i class="far fa-repeat"></i></span>
                                                </a>
                                            </li>
                                            <li data-toggle="tooltip" data-placement="top" title="Quick view">
                                                <a href="#"
                                                    class="text-center mb-10 white-bg primary-color d-block"
                                                    data-toggle="modal" data-target="#product-modal">
                                                    <span><i class="far fa-expand-wide"></i></span>
                                                </a>
                                            </li>
                                        </ul><!-- /view-btn -->
                                    </div><!-- /single-product-img -->
                                    <div class="single-product-info position-relative mt-25">
                                        <h6><a href="product-details.html">Faith Industries "Midnight Sky" Tshirt</a>
                                        </h6>
                                        <ul class="single-product-price d-flex transition-3">
                                            <li>
                                                <span class="primary-color">IDR 215.000,00</span>
                                            </li>
                                        </ul><!-- /single-product-price -->
                                    </div>
                                </div><!-- /single-product -->
                            </div>
                        </div><!-- /col -->
                        <div class="col-xl-4  col-lg-3  col-md-6  col-sm-6 col-12">
                            <div class="s-p-wrapper">
                                <div class="single-product mb-35">
                                    <div class="single-product-img position-relative over-hidden">
                                        <a class="position-relative d-block" href="product-details.html">
                                            <img class="width100 height100"
                                                src="{{ asset('landing/images/product/product11.jpg') }}"
                                                alt="product">
                                        </a>
                                        <ul class="product-action d-flex position-absolute transition-3">
                                            <li data-toggle="tooltip" data-placement="top" title="Add to Cart">
                                                <a href="cart.html"
                                                    class="text-center mb-10 white-bg primary-color d-block">
                                                    <span><i class="far fa-shopping-cart"></i></span>
                                                </a>
                                            </li>
                                            <li data-toggle="tooltip" data-placement="top" title="Add to Wishlist">
                                                <a href="wishlist.html"
                                                    class="text-center mb-10 white-bg primary-color d-block">
                                                    <span><i class="far fa-heart"></i></span>
                                                </a>
                                            </li>
                                            <li data-toggle="tooltip" data-placement="top" title="Add to Compare">
                                                <a href="product-details.html"
                                                    class="text-center mb-10 white-bg primary-color d-block">
                                                    <span><i class="far fa-repeat"></i></span>
                                                </a>
                                            </li>
                                            <li data-toggle="tooltip" data-placement="top" title="Quick view">
                                                <a href="#"
                                                    class="text-center mb-10 white-bg primary-color d-block"
                                                    data-toggle="modal" data-target="#product-modal">
                                                    <span><i class="far fa-expand-wide"></i></span>
                                                </a>
                                            </li>
                                        </ul><!-- /view-btn -->
                                    </div><!-- /single-product-img -->
                                    <div class="single-product-info position-relative mt-25">
                                        <h6><a href="product-details.html">Faith Industries "Totoro" TShirt</a></h6>
                                        <ul class="single-product-price d-flex transition-3">
                                            <li>
                                                <span class="gray-color pr-2"><del>IDR 250.000,00</del></span>
                                                <span class="primary-color">IDR 225.000,00</span>
                                            </li>
                                        </ul><!-- /single-product-price -->
                                    </div>
                                </div><!-- /single-product -->
                            </div>
                        </div><!-- /col -->
                        <div class="col-xl-4  col-lg-3  col-md-6  col-sm-6 col-12">
                            <div class="s-p-wrapper">
                                <div class="single-product mb-35">
                                    <div class="single-product-img position-relative over-hidden">
                                        <div
                                            class="single-product-label position-absolute primary-bg text-center px-2 transition-3 z-index1">
                                            <span class="white text-uppercase d-block">new</span>
                                        </div><!-- /product-label -->
                                        <a class="position-relative d-block" href="product-details.html">
                                            <img class="width100 height100"
                                                src="{{ asset('landing/images/product/product12.jpg') }}"
                                                alt="product">
                                        </a>
                                        <ul class="product-action d-flex position-absolute transition-3">
                                            <li data-toggle="tooltip" data-placement="top" title="Add to Cart">
                                                <a href="cart.html"
                                                    class="text-center mb-10 white-bg primary-color d-block">
                                                    <span><i class="far fa-shopping-cart"></i></span>
                                                </a>
                                            </li>
                                            <li data-toggle="tooltip" data-placement="top" title="Add to Wishlist">
                                                <a href="wishlist.html"
                                                    class="text-center mb-10 white-bg primary-color d-block">
                                                    <span><i class="far fa-heart"></i></span>
                                                </a>
                                            </li>
                                            <li data-toggle="tooltip" data-placement="top" title="Add to Compare">
                                                <a href="product-details.html"
                                                    class="text-center mb-10 white-bg primary-color d-block">
                                                    <span><i class="far fa-repeat"></i></span>
                                                </a>
                                            </li>
                                            <li data-toggle="tooltip" data-placement="top" title="Quick view">
                                                <a href="#"
                                                    class="text-center mb-10 white-bg primary-color d-block"
                                                    data-toggle="modal" data-target="#product-modal">
                                                    <span><i class="far fa-expand-wide"></i></span>
                                                </a>
                                            </li>
                                        </ul><!-- /view-btn -->
                                    </div><!-- /single-product-img -->
                                    <div class="single-product-info position-relative mt-25">
                                        <h6><a href="product-details.html">Faith Industries "Sword of Lumiere"
                                                Tshirt</a></h6>
                                        <ul class="single-product-price d-flex transition-3">
                                            <li>
                                                <span class="primary-color">IDR 225.000,00</span>
                                            </li>
                                        </ul><!-- /single-product-price -->
                                    </div>
                                </div><!-- /single-product -->
                            </div>
                        </div><!-- /col -->
                        <div class="col-xl-4  col-lg-3  col-md-6  col-sm-6 col-12">
                            <div class="s-p-wrapper">
                                <div class="single-product mb-35">
                                    <div class="single-product-img position-relative over-hidden">
                                        <a class="position-relative d-block" href="product-details.html">
                                            <img class="width100 height100"
                                                src="{{ asset('landing/images/product/product1.jpg') }}"
                                                alt="product">
                                        </a>
                                        <ul class="product-action d-flex position-absolute transition-3">
                                            <li data-toggle="tooltip" data-placement="top" title="Add to Cart">
                                                <a href="cart.html"
                                                    class="text-center mb-10 white-bg primary-color d-block">
                                                    <span><i class="far fa-shopping-cart"></i></span>
                                                </a>
                                            </li>
                                            <li data-toggle="tooltip" data-placement="top" title="Add to Wishlist">
                                                <a href="wishlist.html"
                                                    class="text-center mb-10 white-bg primary-color d-block">
                                                    <span><i class="far fa-heart"></i></span>
                                                </a>
                                            </li>
                                            <li data-toggle="tooltip" data-placement="top" title="Add to Compare">
                                                <a href="product-details.html"
                                                    class="text-center mb-10 white-bg primary-color d-block">
                                                    <span><i class="far fa-repeat"></i></span>
                                                </a>
                                            </li>
                                            <li data-toggle="tooltip" data-placement="top" title="Quick view">
                                                <a href="#"
                                                    class="text-center mb-10 white-bg primary-color d-block"
                                                    data-toggle="modal" data-target="#product-modal">
                                                    <span><i class="far fa-expand-wide"></i></span>
                                                </a>
                                            </li>
                                        </ul><!-- /view-btn -->
                                    </div><!-- /single-product-img -->
                                    <div class="single-product-info position-relative mt-25">
                                        <h6><a href="product-details.html">Humanscale Graphite Smart</a></h6>
                                        <ul class="single-product-price d-flex transition-3">
                                            <li>
                                                <span class="primary-color">$66.66</span>
                                            </li>
                                        </ul><!-- /single-product-price -->
                                    </div>
                                </div><!-- /single-product -->
                            </div>
                        </div><!-- /col -->
                        <div class="col-xl-4  col-lg-3  col-md-6  col-sm-6 col-12">
                            <div class="s-p-wrapper">
                                <div class="single-product mb-35">
                                    <div class="single-product-img position-relative over-hidden">
                                        <div
                                            class="single-product-label position-absolute primary-bg text-center px-2 transition-3 z-index1">
                                            <span class="white text-uppercase d-block">new</span>
                                        </div><!-- /product-label -->
                                        <a class="position-relative d-block" href="product-details.html">
                                            <img class="width100 height100"
                                                src="{{ asset('landing/images/product/product4.jpg') }}"
                                                alt="product">
                                        </a>
                                        <ul class="product-action d-flex position-absolute transition-3">
                                            <li data-toggle="tooltip" data-placement="top" title="Add to Cart">
                                                <a href="cart.html"
                                                    class="text-center mb-10 white-bg primary-color d-block">
                                                    <span><i class="far fa-shopping-cart"></i></span>
                                                </a>
                                            </li>
                                            <li data-toggle="tooltip" data-placement="top" title="Add to Wishlist">
                                                <a href="wishlist.html"
                                                    class="text-center mb-10 white-bg primary-color d-block">
                                                    <span><i class="far fa-heart"></i></span>
                                                </a>
                                            </li>
                                            <li data-toggle="tooltip" data-placement="top" title="Add to Compare">
                                                <a href="product-details.html"
                                                    class="text-center mb-10 white-bg primary-color d-block">
                                                    <span><i class="far fa-repeat"></i></span>
                                                </a>
                                            </li>
                                            <li data-toggle="tooltip" data-placement="top" title="Quick view">
                                                <a href="#"
                                                    class="text-center mb-10 white-bg primary-color d-block"
                                                    data-toggle="modal" data-target="#product-modal">
                                                    <span><i class="far fa-expand-wide"></i></span>
                                                </a>
                                            </li>
                                        </ul><!-- /view-btn -->
                                    </div><!-- /single-product-img -->
                                    <div class="single-product-info position-relative mt-25">
                                        <h6><a href="product-details.html">Annie Natural Storage Cabinet</a></h6>
                                        <ul class="single-product-price d-flex transition-3">
                                            <li>
                                                <span class="primary-color">$86.88</span>
                                            </li>
                                        </ul><!-- /single-product-price -->
                                    </div>
                                </div><!-- /single-product -->
                            </div>
                        </div><!-- /col -->
                    </div><!-- /row -->
                </div>
            </div><!-- /product-content -->
        </div><!-- /container -->
    </div>
    <!-- best-seller-product-area-end  -->
</x-layoutUser>
