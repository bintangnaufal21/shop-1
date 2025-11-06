<x-layoutAdmin>
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Detail Pesanan</h1>
        <p class="mb-4">No. Pesanan: <strong>{{ $pesanan->kode_order }}</strong></p>

        <!-- Tombol Kembali -->
        <a href="{{ route('admin.pesanan') }}" class="btn btn-secondary btn-sm mb-3">
            <i class="fas fa-arrow-left"></i> Kembali ke Daftar Pesanan
        </a>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="row">
            <!-- Kolom Detail Pelanggan -->
            <div class="col-lg-6">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Detail Pelanggan</h6>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th>Nama Penerima</th>
                                <td>{{ $pesanan->nama_penerima }}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>{{ $pesanan->email_penerima }}</td>
                            </tr>
                            <tr>
                                <th>Telepon</th>
                                <td>{{ $pesanan->telepon_penerima }}</td>
                            </tr>
                            <tr>
                                <th>Alamat Pengiriman</th>
                                <td>{{ $pesanan->alamat_pengiriman }}</td>
                            </tr>
                            <tr>
                                <th>Kota & Kode Pos</th>
                                <td>{{ $pesanan->kota }}, {{ $pesanan->kode_pos }}</td>
                            </tr>
                            <tr>
                                <th>Catatan</th>
                                <td>{{ $pesanan->catatan ?? '-' }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Kolom Detail Pesanan & Status -->
            <div class="col-lg-6">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Detail Pesanan</h6>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th>Subtotal</th>
                                <td>Rp{{ number_format($pesanan->subtotal, 0, ',', '.') }}</td>
                            </tr>
                            <tr>
                                <th>Ongkos Kirim</th>
                                <td>Rp{{ number_format($pesanan->ongkir, 0, ',', '.') }}</td>
                            </tr>
                            <tr>
                                <th>Total Pesanan</th>
                                <td><strong>Rp{{ number_format($pesanan->total, 0, ',', '.') }}</strong></td>
                            </tr>
                            <tr>
                                <th>Status Saat Ini</th>
                                <td>
                                    <span class="badge
                                        @if($pesanan->status == 'pending') badge-warning
                                        @elseif($pesanan->status == 'diproses') badge-info
                                        @elseif($pesanan->status == 'dikirim') badge-primary
                                        @elseif($pesanan->status == 'selesai') badge-success
                                        @elseif($pesanan->status == 'dibatalkan') badge-danger
                                        @endif
                                    ">{{ ucfirst($pesanan->status) }}</span>
                                </td>
                            </tr>
                        </table>

                        <hr>

                        <!-- Form Ubah Status -->
                        <h6 class="font-weight-bold">Ubah Status Pesanan</h6>
                        <form action="{{ route('admin.pesanan.updateStatus', $pesanan->id) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <select name="status" class="form-control">
                                    <option value="pending" {{ $pesanan->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="diproses" {{ $pesanan->status == 'diproses' ? 'selected' : '' }}>Diproses</option>
                                    <option value="dikirim" {{ $pesanan->status == 'dikirim' ? 'selected' : '' }}>Dikirim</option>
                                    <option value="selesai" {{ $pesanan->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                                    <option value="dibatalkan" {{ $pesanan->status == 'dibatalkan' ? 'selected' : '' }}>Dibatalkan</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Update Status</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Kolom Item Pesanan -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Item yang Dipesan</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID Produk</th>
                                <th>Nama Produk</th>
                                <th>Harga Satuan</th>
                                <th>Kuantitas</th>
                                <th>Subtotal Item</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pesanan->items as $item)
                                <tr>
                                    <td>{{ $item->produk_id }}</td>
                                    <td>{{ $item->nama_produk }}</td>
                                    <td>Rp{{ number_format($item->harga, 0, ',', '.') }}</td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>Rp{{ number_format($item->subtotal, 0, ',', '.') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</x-layoutAdmin>
