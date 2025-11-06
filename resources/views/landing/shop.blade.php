<x-layoutUser>
    <!-- ====== breadcrumb-area-start ============================================ -->
    <div class="breadcrumb-area mt-30">
        <div class="container">
            <div class="breadcrumb-bg pt-40 pb-40 pl-50 pr-50">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="breadcrumb-content text-center mt-5">
                            <h2 class="page-title">Shop</h2>
                            <ul class="list-none d-flex justify-content-center">
                                <li><a href="{{ url('/') }}" class="theme-color">Home</a></li>
                                <li class="px-2">/</li>
                                <li class="active">Shop</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb-area-end -->

    <!-- ====== shop-area-start ============================================ -->
    <div class="shop-area pt-40 pb-40">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-4 col-md-12 col-sm-12 col-12">
                    <!-- Sidebar Filter -->
                    <div class="shop-sidebar mb-30">
                        <div class="sidebar-widget mb-30">
                            <h4 class="sidebar-widget-title border-b-light-gray pb-15 mb-20">Kategori</h4>
                            {{--                             <div class="sidebar-category">
                               <ul>
                                    <li><a href="#" class="d-block pb-10">Furniture <span>(25)</span></a></li>
                                    <li><a href="#" class="d-block pb-10">Dekorasi <span>(18)</span></a></li>
                                    <li><a href="#" class="d-block pb-10">Elektronik <span>(32)</span></a></li>
                                    <li><a href="#" class="d-block pb-10">Fashion <span>(47)</span></a></li>
                                    <li><a href="#" class="d-block">Otomotif <span>(15)</span></a></li>
                                </ul>
                            </div> --}}
                        </div>

                        <div class="sidebar-widget mb-30">
                            <h4 class="sidebar-widget-title border-b-light-gray pb-15 mb-20">Filter Harga</h4>
                            <div class="price-filter">
                                <div id="slider-range" class="mb-20"></div>
                                <div class="price-slider-amount">
                                    <input type="text" id="amount" name="price" placeholder="Add Your Price" />
                                    <button class="web-btn btn-sm theme-bg">Filter</button>
                                </div>
                            </div>
                        </div>

                        <div class="sidebar-widget">
                            <h4 class="sidebar-widget-title border-b-light-gray pb-15 mb-20">Produk Terbaru</h4>
                            <div class="recent-product-wrapper">
                                {{--  <div class="recent-product-item d-flex mb-15">
                                    <div class="recent-product-img">
                                        <a href="#"><img src="{{ asset('landing/images/product/product-sm1.jpg') }}" alt=""></a>
                                    </div>
                                    <div class="recent-product-content">
                                        <h6><a href="#">Kursi Minimalis</a></h6>
                                        <span class="primary-color">Rp 450.000</span>
                                    </div>
                                </div>
                                <div class="recent-product-item d-flex mb-15">
                                    <div class="recent-product-img">
                                        <a href="#"><img src="{{ asset('landing/images/product/product-sm2.jpg') }}" alt=""></a>
                                    </div>
                                    <div class="recent-product-content">
                                        <h6><a href="#">Lampu Meja LED</a></h6>
                                        <span class="primary-color">Rp 120.000</span>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-9 col-lg-8 col-md-12 col-sm-12 col-12">
                    <!-- Shop Top Bar -->
                    <div class="shop-top-bar mb-30">
                        <div class="row align-items-center">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="show-result">
                                    <p>Menampilkan 1–12 dari 25 hasil</p>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="product-sort d-flex justify-content-sm-end">
                                    <select class="border-0 px-3">
                                        <option value="">Default sorting</option>
                                        <option value="">Sort by popularity</option>
                                        <option value="">Sort by average rating</option>
                                        <option value="">Sort by latest</option>
                                        <option value="">Sort by price: low to high</option>
                                        <option value="">Sort by price: high to low</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        @foreach ($produks as $product)
                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                                <div class="s-p-wrapper">
                                    <div class="single-product mb-35">
                                        <div class="single-product-img position-relative over-hidden">

                                            <a class="position-relative d-block"
                                                href="{{ url('/product-detail/' . $product->id) }}">
                                                <img class="width75 height75"
                                                    src="{{ asset('storage/' . $product->gambar) }}"
                                                    alt="{{ $product->nama_produk }}">
                                            </a>

                                            <ul class="product-action d-flex position-absolute transition-3">
                                                <li data-placement="top" title="Add to Cart"
                                                    class="white-bg primary-color d-block">
                                                    <form action="{{ route('cart.add') }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="product_id"
                                                            value="{{ $product->id }}">
                                                        <input type="hidden" name="qty" value="1">
                                                        <button type="submit"
                                                            class="text-center mb-10 white-bg primary-color d-block"
                                                            style="border:none; background:none; cursor:pointer;">
                                                            <span><i class="far fa-shopping-cart"></i></span>
                                                        </button>
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="single-product-info position-relative mt-25">

                                            <h6><a
                                                    href="{{ url('/product-detail/' . $product->id) }}">{{ $product->nama }}</a>
                                            </h6>

                                            <div class="product-rating mb-10">
                                            </div>

                                            <ul class="single-product-price d-flex transition-3">
                                                <li>
                                                    @if ($product->harga_diskon)
                                                        <span class="gray-color pr-2"><del>Rp
                                                                {{ number_format($product->harga, 0, ',', '.') }}</del></span>
                                                        <span class="primary-color">Rp
                                                            {{ number_format($product->harga_diskon, 0, ',', '.') }}</span>
                                                    @else
                                                        <span class="primary-color">Rp
                                                            {{ number_format($product->harga, 0, ',', '.') }}</span>
                                                    @endif
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        @if ($produks->isEmpty())
                            <div class="col-12">
                                <p class="text-center">Belum ada produk yang tersedia.</p>
                            </div>
                        @endif

                    </div>

                    <!-- Pagination -->
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="pagination-area mt-10">
                                <nav>
                                    <ul class="pagination justify-content-center">
                                        <li class="page-item disabled"><a class="page-link" href="#"><i
                                                    class="far fa-angle-double-left"></i></a></li>
                                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item"><a class="page-link" href="#"><i
                                                    class="far fa-angle-double-right"></i></a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- shop-area-end -->
</x-layoutUser>
