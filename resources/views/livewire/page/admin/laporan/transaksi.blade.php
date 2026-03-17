<div>
    @include('components.partials.admin.navbar')     
    @include('components.partials.admin.sidebar')
    <main role="main" class="main-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12 text-center mb-4">
                    <h3 class="page-title">Laporan Transaksi</h3>
                    <p class="text-muted">Periode: {{ $dateStart ? \Carbon\Carbon::parse($dateStart)->format('d M Y') : 'Awal' }} - {{ $dateEnd ? \Carbon\Carbon::parse($dateEnd)->format('d M Y') : 'Akhir' }}</p>
                </div>
                
                <div class="col-12 mb-4 d-print-none">
                    <div class="card shadow">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-md-3 mb-2">
                                    <label>Mulai Tanggal</label>
                                    <input type="date" class="form-control" wire:model.live="dateStart">
                                </div>
                                <div class="col-md-3 mb-2">
                                    <label>Sampai Tanggal</label>
                                    <input type="date" class="form-control" wire:model.live="dateEnd">
                                </div>
                                <div class="col-md-3 mb-2">
                                    <label>Status</label>
                                    <select class="form-control" wire:model.live="statusFilter">
                                        <option value="">Semua Status</option>
                                        @foreach (\App\Enums\OrderStatus::cases() as $status)
                                            <option value="{{ $status->value }}">{{ $status->label() }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3 mb-2 d-flex align-items-end">
                                    <button class="btn btn-primary w-100" onclick="window.print()">
                                        <i class="fe fe-printer mr-2"></i> Cetak Laporan
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="card shadow mb-4">
                        <div class="card-header border-0 d-flex justify-content-between align-items-center">
                            <h5 class="card-title mb-0">Total Pendapatan (Lunas): Rp {{ number_format($totalAmount, 0, ',', '.') }}</h5>
                            <span class="text-muted">Total Transaksi: {{ $totalTransactions }}</span>
                        </div>
                        <div class="card-body p-0">
                            <table class="table table-hover table-bordered bg-white mb-0">
                                <thead class="thead-dark">
                                <tr role="row">
                                    <th>No</th>
                                    <th>Tanggal Pembuatan</th>
                                    <th>Invoice</th>
                                    <th>Pemesan</th>
                                    <th>Tanggal Main</th>
                                    <th>Waktu Main</th>
                                    <th>Total (Rp)</th>
                                    <th>Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($transactions as $index => $booking)
                                <tr>
                                    <td>{{ $transactions->firstItem() + $index }}</td>
                                    <td>{{ $booking->created_at->format('d M Y H:i') }}</td>
                                    <td><strong>{{ $booking->invoice_code }}</strong></td>
                                    <td>{{ $booking->user->name ?? '-' }}</td>
                                    <td>{{ $booking->tanggal->format('d M Y') }}</td>
                                    <td>{{ substr($booking->jam_mulai, 0, 5) }} - {{ substr($booking->jam_selesai, 0, 5) }}</td>
                                    <td>{{ number_format($booking->jumlah_bayar, 0, ',', '.') }}</td>
                                    <td><span class="badge badge-pill badge-{{ $booking->status->color() }}">{{ $booking->status->label() }}</span></td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="8" class="text-center py-4">Tidak ada data transaksi.</td>
                                </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                    <div class="d-print-none my-3">
                        {{ $transactions->links('pagination::bootstrap-4') }}
                    </div>
                </div>

            </div>          
        </div> 
    </main>

    <style>
        @media print {
            .navbar, .sidebar-left, .d-print-none, .vertnav {
                display: none !important;
            }
            .main-content {
                margin-left: 0 !important;
                padding-top: 0 !important;
            }
            .card {
                border: none !important;
                box-shadow: none !important;
            }
            .table-bordered th, .table-bordered td {
                border: 1px solid #dee2e6 !important;
            }
        }
    </style>
</div>
