<x-layoutUser>
    <div class="cart-area mt-100">
        <div class="container border-b-light-gray pb-100">

            @if (count($cart) > 0)

                <div class="cart-table text-center table-responsive-sm">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">Gambar</th>
                                <th scope="col">Nama Produk</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Kuantitas</th>
                                <th scope="col">Total</th>
                                <th scope="col">Hapus</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($cart as $id => $item)
                                <tr>
                                    <td>
                                        <a href="#" class="cart-img d-block">
                                            <img src="{{ asset('storage/' . $item['gambar']) }}"
                                                alt="{{ $item['nama_produk'] }}"
                                                style="width: 80px; height: 80px; object-fit: cover;">
                                        </a>
                                    </td>
                                    <td>
                                        <a href="#" class="p-name primary-color">
                                            {{ $item['nama_produk'] }}
                                        </a>
                                    </td>
                                    <td>
                                        <div class="cart-price">Rp{{ number_format($item['harga'], 0, ',', '.') }}</div>
                                    </td>
                                    <td>
                                        <div class="quantity-field position-relative d-inline-block"
                                            style="width: 150px;">
                                            <form action="{{ route('cart.update', $id) }}" method="POST"
                                                class="d-flex justify-content-center align-items-center">
                                                @csrf
                                                <input type="number" name="qty" value="{{ $item['qty'] }}" ...>
                                                <button type="submit" ...>Update</button>
                                            </form>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="cart-price">
                                            Rp{{ number_format($item['harga'] * $item['qty'], 0, ',', '.') }}</div>
                                    </td>
                                    <td>
                                        <a href="{{ route('cart.remove', $id) }}" ...>
                                            <span class="icon-clear"></span>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 offset-xl-6 offset-lg-6">
                        <div class="total-price-area mt-80">
                            <h2 class="font600">Total Keranjang</h2>
                            <ul class="pt-15 pb-25">
                                <li
                                    class="d-flex justify-content-between align-items-center border-gray mb-1 pl-25 pr-25 pt-15 pb-15">
                                    <span>Subtotal</span><span>Rp{{ number_format($subtotal, 0, ',', '.') }}</span>
                                </li>
                                <li
                                    class="d-flex justify-content-between align-items-center border-gray pl-25 pr-25 pt-15 pb-15">
                                    <span>Total </span><span>Rp{{ number_format($subtotal, 0, ',', '.') }}</span>
                                </li>
                            </ul>
                            <a href="{{ route('checkout.index') }}"
                                class="web-btn d-inline-block theme-bg border-theme02 white text-uppercase over-hidden position-relative pt-20 pb-20 pl-45 pr-45 mt-15">
                                Lanjut ke checkout
                            </a>
                        </div>
                    </div>
                </div>
            @else
                <div class="row">
                    <div class="col-12 text-center">
                        <div class="alert alert-info" style="margin: 50px 0; padding: 20px;">
                            <h4>Keranjang belanja Anda masih kosong.</h4>
                            <a href="{{ url('/shop') }}"
                                class="web-btn d-inline-block theme-bg border-theme02 white text-uppercase over-hidden position-relative pt-15 pb-15 pl-30 pr-30 mt-20">
                                Mulai Belanja
                            </a>
                        </div>
                    </div>
                </div>

            @endif

        </div>
    </div>
</x-layoutUser>
