<x-layoutAdmin>
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Daftar Pesanan</h1>
        <p class="mb-4">Berikut adalah semua pesanan yang masuk dari pelanggan.</p>

        <!-- Pesan Sukses -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- DataTabel Pesanan -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Pesanan Masuk</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No. Pesanan</th>
                                <th>Nama Pelanggan</th>
                                <th>Email</th>
                                <th>Tanggal</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($pesanans as $pesanan)
                                <tr>
                                    <td>{{ $pesanan->kode_order }}</td>
                                    <td>{{ $pesanan->nama_penerima }}</td>
                                    <td>{{ $pesanan->email_penerima }}</td>
                                    <td>{{ $pesanan->created_at->format('d M Y, H:i') }}</td>
                                    <td>Rp{{ number_format($pesanan->total, 0, ',', '.') }}</td>
                                    <td>
                                        <!-- Beri style beda-beda untuk status -->
                                        @if ($pesanan->status == 'pending')
                                            <span class="badge bg-info">{{ ucfirst($pesanan->status) }}</span>
                                        @elseif($pesanan->status == 'diproses')
                                            <span class="badge bg-warning">{{ ucfirst($pesanan->status) }}</span>
                                        @elseif($pesanan->status == 'dikirim')
                                            <span class="badge bg-success">{{ ucfirst($pesanan->status) }}</span>
                                        @elseif($pesanan->status == 'selesai')
                                            <span class="badge bg-dark">{{ ucfirst($pesanan->status) }}</span>
                                        @elseif($pesanan->status == 'dibatalkan')
                                            <span class="badge bg-danger">{{ ucfirst($pesanan->status) }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.pesanan.show', $pesanan->id) }}"
                                            class="btn btn-info btn-sm">
                                            <i class="fas fa-eye"></i> Detail
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">Belum ada pesanan yang masuk.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <!-- Pagination -->
                <div class="mt-3">
                    {{ $pesanans->links() }}
                </div>
            </div>
        </div>

    </div>
</x-layoutAdmin>
