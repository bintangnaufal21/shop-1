<x-layoutUser>
    <div class="checkout-area mb-60 mt-100">
        <div class="container">

            @if(session('error'))
                <div class="row">
                    <div class="col-12">
                        <div class="alert alert-danger" style="background-color: #f8d7da; border-color: #f5c6cb; color: #721c24; padding: 15px; border-radius: 5px; margin-bottom: 20px;">
                            <strong>Terjadi Kesalahan:</strong> {{ session('error') }}
                        </div>
                    </div>
                </div>
            @endif
            @if ($errors->any())
                <div class="row">
                    <div class="col-12">
                        <div class="alert alert-danger" style="background-color: #f8d7da; border-color: #f5c6cb; color: #721c24; padding: 15px; border-radius: 5px; margin-bottom: 20px;">
                            <strong>Data tidak valid. Harap perbaiki kesalahan berikut:</strong>
                            <ul style="margin-top: 10px; margin-bottom: 0; padding-left: 20px;">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            @endif
            <form action="{{ route('checkout.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                        <div class="checkbox-form">
                            <h4 class="pb-10 mb-20 border-b-light-gray3">Detail Penagihan</h4>
                            <div class="row">

                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="checkout-form-list mb-20">
                                        <label>Nama Pengguna <span class="theme-color">*</span></label>
                                        <input type="text" name="nama_pengguna" placeholder="Nama Lengkap Anda" class="form-control primary-bg2 border-gray" value="{{ old('nama_pengguna', Auth::user()?->name) }}" required>
                                        @error('nama_pengguna')
                                            <span class="text-danger" style="font-size: 0.9em;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="checkout-form-list mb-20">
                                        <label>Alamat <span class="theme-color">*</span></label>
                                        <input type="text" name="alamat_1" placeholder="Nama jalan, nomor rumah" class="form-control primary-bg2 border-gray" value="{{ old('alamat_1') }}" required>
                                    </div>
                                </div>

                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="checkout-form-list mb-20">
                                        <input type="text" name="alamat_2" placeholder="Apartemen, suite, unit etc. (opsional)" class="form-control primary-bg2 border-gray" value="{{ old('alamat_2') }}">
                                    </div>
                                </div>

                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="checkout-form-list mb-20">
                                        <label>Provinsi <span class="theme-color">*</span></label>
                                        <input type="text" name="provinsi" placeholder="Provinsi" class="form-control primary-bg2 border-gray" value="{{ old('provinsi') }}" required>
                                    </div>
                                </div>

                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="checkout-form-list mb-20">
                                        <label>Kota / Kabupaten <span class="theme-color">*</span></label>
                                        <input type="text" name="kota" placeholder="Kota / Kabupaten" class="form-control primary-bg2 border-gray" value="{{ old('kota') }}" required>
                                    </div>
                                </div>

                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="checkout-form-list mb-20">
                                        <label>Kode Pos <span class="theme-color">*</span></label>
                                        <input type="text" name="kode_pos" placeholder="Kode Pos" class="form-control primary-bg2 border-gray" value="{{ old('kode_pos') }}" required>
                                    </div>
                                </div>

                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="checkout-form-list mb-20">
                                        <label>Telepon <span class="theme-color">*</span></label>
                                        <input type="text" name="telepon" placeholder="Nomor Telepon" class="form-control primary-bg2 border-gray" value="{{ old('telepon') }}" required>
                                    </div>
                                </div>

                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="checkout-form-list mb-20">
                                        <label>Email Address <span class="theme-color">*</span></label>
                                        <input type="email" name="email" placeholder="Email" class="form-control primary-bg2 border-gray" value="{{ old('email', Auth::user()?->email) }}" required>
                                    </div>
                                </div>
                            </div>

                            <div class="order-notes">
                                <div class="checkout-form-list mb-40">
                                    <label>Catatan Pesanan (Opsional)</label>
                                    <textarea id="checkout-mess" name="catatan_pesanan" placeholder="Catatan tentang pesanan Anda, misal: catatan khusus untuk pengiriman." class="form-control pt-20 pl-20 primary-bg2 border-gray">{{ old('catatan_pesanan') }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div><div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                        <div class="your-order mb-30 pt-30 pr-40 pb-45 pl-40 mt-15">
                            <h4 class="pb-10 mb-20 border-b-light-gray3">Pesanan Anda</h4>
                            <div class="your-order-table table-responsive">
                                <table class="width100">
                                    <thead>
                                        <tr>
                                            <th class="product-name">Produk</th>
                                            <th class="product-total">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if($cart)
                                            @foreach($cart as $id => $item)
                                            <tr class="cart_item">
                                                <td class="product-name">
                                                    {{ $item['nama_produk'] }} <strong class="product-quantity"> × {{ $item['qty'] }}</strong>
                                                </td>
                                                <td class="product-total">
                                                    <span class="amount">Rp{{ number_format($item['harga'] * $item['qty'], 0, ',', '.') }}</span>
                                                </td>
                                            </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                    <tfoot>
                                        <tr class="cart-subtotal">
                                            <th>Subtotal Keranjang</th>
                                            <td><span class="amount">Rp{{ number_format($subtotal, 0, ',', '.') }}</span></td>
                                        </tr>
                                        <tr class="shipping">
                                            <th>Ongkos Kirim</th>
                                            <td><span class="amount">Rp{{ number_format($ongkir, 0, ',', '.') }}</span></td>
                                        </tr>
                                        <tr class="order-total">
                                            <th>Total Pesanan</th>
                                            <td>
                                                <span class="amount text-danger">Rp{{ number_format($total, 0, ',', '.') }}</span>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>

                            <div class="payment-method mt-40">
                                <h5 class="mb-3">Metode Pembayaran</h5>
                                <div class="accordion" id="accordionExample">
                                    <div class="card border-gray rounded-0 mb-10 white-bg">
                                        <div class="card-header bg-white border-b-light-gray" id="headingOne">
                                            <h6 class="mb-0">
                                                <input class="btn-link border-0 text-uppercase" type="radio" name="metode_pembayaran" value="bank_transfer" id="bank_transfer" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" checked>
                                                <label for="bank_transfer" style="cursor: pointer; margin-left: 5px;">
                                                    Direct Bank Transfer
                                                </label>
                                            </h6>
                                        </div>
                                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                            <div class="card-body">
                                                <span class="mb-0">Lakukan pembayaran langsung ke rekening bank kami. Harap gunakan ID Pesanan Anda sebagai referensi pembayaran.</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card border-gray rounded-0 mb-10 white-bg">
                                        <div class="card-header bg-white border-b-light-gray" id="headingTwo">
                                            <h6 class="mb-0">
                                                <input class="btn-link collapsed border-0 text-uppercase" type="radio" name="metode_pembayaran" value="cod" id="cod" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                <label for="cod" style="cursor: pointer; margin-left: 5px;">
                                                    Cash on Delivery (COD)
                                                </label>
                                            </h6>
                                        </div>
                                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                            <div class="card-body">
                                                <p class="mb-0">Bayar dengan uang tunai saat pengiriman.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="order-button-payment mt-20">
                                    <button type="submit" class="web-btn d-block theme-bg border-theme02 white text-center text-uppercase over-hidden position-relative pt-18 pb-18 mt-2 mb-10">
                                        Buat Pesanan
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div></div></form>
            </div></div>
    </x-layoutUser>
