<x-layoutUser>
    <div class="breadcrumb-area mt-100">
        <div class="container">
            <div class="breadcrumb-bg pt-40 pb-40 pl-50 pr-50">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="breadcrumb-content text-center mt-5">
                            <h2 class="page-title">Dashboard Saya</h2>
                            <ul class="list-none d-flex justify-content-center">
                                <li><a href="{{ url('/') }}" class="theme-color">Home</a></li>
                                <li class="px-2">/</li>
                                <li class="active">Dashboard</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="shop-area pt-40 pb-40">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h4 class="mb-4">Riwayat Pesanan Saya</h4>

                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No. Pesanan</th>
                                    <th>Tanggal</th>
                                    <th>Status Pesanan</th>
                                    <th>Total</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($orders as $order)
                                    <tr>
                                        <td>{{ $order->kode_order }}</td>
                                        <td>{{ $order->created_at->format('d M Y, H:i') }}</td>
                                        <td>
                                            @if ($order->status == 'pending')
                                                <span class="badge"
                                                    style="background-color: #ffc107; color: #000;">{{ ucfirst($order->status) }}</span>
                                            @elseif($order->status == 'dikirim')
                                                <span class="badge"
                                                    style="background-color: #17a2b8; color: #fff;">{{ ucfirst($order->status) }}</span>
                                            @elseif($order->status == 'selesai')
                                                <span class="badge"
                                                    style="background-color: #28a745; color: #fff;">{{ ucfirst($order->status) }}</span>
                                            @else
                                                <span class="badge"
                                                    style="background-color: #6c757d; color: #fff;">{{ ucfirst($order->status) }}</span>
                                            @endif
                                        </td>
                                        <td>Rp{{ number_format($order->total, 0, ',', '.') }}</td>
                                        <td>
                                            <a href="{{ route('dashboard.show', $order->id) }}"
                                                class="btn btn-sm btn-info">
                                                Lihat Detail
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">Anda belum memiliki riwayat pesanan.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-4">
                        {{ $orders->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-layoutUser>
